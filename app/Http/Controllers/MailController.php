<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Stat;
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

        $stats = new Stat();
        $stats->ip = request()->ip();
        $stats->type = 0;
        $stats->query = $domain;
        $stats->results = count($mails);
        $stats->save();

        return view("search", ['mails' => $mails, 'domain' => $domain]);
    }

    public function find(Request $request)
    {
        $domain = $request->domain;

        if (!isset($request->name)) {
            return \redirect('/email-finder')->withErrors("Please insert full name")->withInput();
        }

        if (!filter_var(gethostbyname($domain), FILTER_VALIDATE_IP)) {
            return \redirect('/email-finder')->withErrors("Please insert valid domain name")->withInput();
        }

        $query = "";
        foreach (explode(" ", $request->name) as $name) {
            $query .= '%' . $name . '%';
        }

        $mails = Mail::select('mail')->where('mail', 'like', $query . '@' . $domain)->whereRaw("'mail' NOT REGEXP '^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$'")->limit(25)->get();

        if ($mails->isEmpty()) {
            return \redirect('/email-finder')->withErrors("No email addresses found.")->withInput();
        }

        $stats = new Stat();
        $stats->ip = request()->ip();
        $stats->type = 1;
        $stats->query = $request->name . "@" . $domain;
        $stats->results = count($mails);
        $stats->save();

        return view("finder", ['mails' => $mails, 'domain' => $domain, 'name' => $request->name]);
    }

    public function verify(Request $request, $mail = null)
    {
        $email = $mail;
        if ($request->isMethod('post')) {
            $email = $request->email;
        }

        $verifierObj = VerifierController::lookup($email);

        if (!$verifierObj->{'server-status'} || !$verifierObj->{'valid-format'}) {
            $status = "INVALID";
        } elseif ($verifierObj->disposable) {
            $status = "DISPOSABLE";
        } else {
            $status = "VALID";
        }

        $verify = ["status"=>$status, "valid_format"=>$verifierObj->{'valid-format'}, "disposable"=>$verifierObj->disposable, "role"=>$verifierObj->{'role-base'}, "server_status"=>$verifierObj->{'server-status'}, "free"=>$verifierObj->{'free-mail'}];

        $stats = new Stat();
        $stats->ip = request()->ip();
        $stats->type = 2;
        $stats->save();

        return view("verifier", ['verify' => $verify, 'email' => $email]);
    }
}
