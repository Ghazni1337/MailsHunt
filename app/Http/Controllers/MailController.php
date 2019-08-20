<?php

namespace App\Http\Controllers;

use App\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function search(Request $request)
    {
        $domain = $request->domain;
        if (!filter_var(gethostbyname($domain), FILTER_VALIDATE_IP)) {
            return \redirect('/domain-search')->withErrors("Please insert valid domain name")->withInput();
        }

        $mails = Mail::select('mail')->where('mail', 'like', '%@' . $domain)->whereRaw("'mail' NOT REGEXP '^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$'")->limit(25)->get();

        if ($mails->isEmpty()) {
            return \redirect('/domain-search')->withErrors("No email addresses found.")->withInput();
        }

        return view("home", ['mails' => $mails, 'domain' => $domain]);
    }

    public function find(Request $request)
    {
        $domain = $request->domain;
        $name = explode(" ", $request->name);
        if (!filter_var(gethostbyname($domain), FILTER_VALIDATE_IP)) {
            return \redirect('/email-finder')->withErrors("Please insert valid domain name")->withInput();
        }
        if (!isset($name[1])) {
            return \redirect('/email-finder')->withErrors("Please insert full name")->withInput();
        }

        $mails = Mail::select('mail')->where('mail', 'like', '%' . $name[0] . '%' . '%' . $name[1] . '%' . '%@' . $domain)->whereRaw("'mail' NOT REGEXP '^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$'")->limit(25)->get();

        if ($mails->isEmpty()) {
            return \redirect('/email-finder')->withErrors("No email addresses found.")->withInput();
        }

        return view("finder", ['mails' => $mails, 'domain' => $domain, 'name' => $request->name]);
    }

    public function verify(Request $request, $mail = null)
    {
        $email = $mail;
        if ($request->isMethod('post')) {
            $email = $request->email;
        }

        $sanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($sanitized, FILTER_VALIDATE_EMAIL)) {
            $valid_format = false;
        } else {
            $valid_format = true;
        }

        //get email user
        $email_user = explode("@",$email)[0];
        //get email domain to work in nexts checks
        $email_domain = preg_replace('/^[^@]++@/', '', $email);
        // 2 - check if its from banned domains.
        if (in_array($email_domain,self::get_banned_domains())) {
            $disposable = true;
        } else {
            $disposable = false;
        }

        // 3 - check if its role email.
        if (in_array($email_user,self::get_role_emails())) {
            $role = true;
        } else {
            $role = false;
        }

        // 4 - check if its free email.
        if (in_array($email_domain,self::get_free_emails())) {
            $free = true;
        } else {
            $free = false;
        }

        // 5 - check DNS for MX records
        if ((bool) checkdnsrr($email_domain, 'MX')==FALSE) {
            $server_status = false;
        } else {
            $server_status = true;
        }

        if (!$server_status || !$valid_format) {
            $status = "INVALID";
        } elseif ($disposable) {
            $status = "DISPOSABLE";
        } else {
            $status = "VALID";
        }

        $verify = ["status"=>$status, "valid_format"=>$valid_format, "disposable"=>$disposable, "role"=>$role, "server_status"=>$server_status, "free"=>$free];

        return view("verifier", ['verify' => $verify, 'email' => $email]);
    }

    public static function get_banned_domains()
    {
        //where we store the banned domains
        $file = storage_path('app/banned_domains.json');
        //if the json file is not in local or the file exists but is older than 1 week, regenerate the json
        if (!file_exists($file) OR (file_exists($file) AND filemtime($file) < strtotime('-1 week')) )
        {
            $banned_domains = file_get_contents("https://rawgit.com/ivolo/disposable-email-domains/master/index.json");
            if ($banned_domains !== FALSE)
                file_put_contents($file,$banned_domains,LOCK_EX);
        }
        else//get the domains from the file
            $banned_domains = file_get_contents($file);
        return json_decode($banned_domains);
    }

    public static function get_role_emails()
    {
        $file = storage_path('app/role_emails.json');
        if (file_exists($file))
        {
            $role_emails = file_get_contents($file);
        } else {
            $role_emails = [];
        }
        return json_decode($role_emails);
    }

    public static function get_free_emails()
    {
        $file = storage_path('app/free_emails.txt');
        if (file_exists($file))
        {
            $free_emails = file_get_contents($file);
        } else {
            $free_emails = '';
        }
        return explode("\n", $free_emails);
    }
}
