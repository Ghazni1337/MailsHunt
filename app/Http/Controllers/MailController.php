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

        $mails = Mail::select('mail')->where('mail', 'like', '%@' . $domain)->whereRaw("'mail' NOT REGEXP '^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$'")->limit(10)->get();
        $mailCount = Mail::where('mail', 'like', '%@' . $domain)->whereRaw("'mail' NOT REGEXP '^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$'")->count();

        $stats = new Stat();
        $stats->ip = request()->ip();
        $stats->type = 0;
        $stats->query = $domain;
        $stats->results = $mails->isEmpty() ? 0 : count($mails);
        $stats->save();

        if ($mails->isEmpty()) {
            return \redirect('/domain-search')->withErrors("No email addresses found.")->withInput();
        }

        return view("search", ['mails' => $mails, 'domain' => $domain, 'mailCount' => $mailCount]);
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

        $mails = Mail::select('mail')->where('mail', 'like', $query . '@' . $domain)->whereRaw("'mail' NOT REGEXP '^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$'")->limit(10)->get();
        $mailCount = Mail::select('mail')->where('mail', 'like', $query . '@' . $domain)->whereRaw("'mail' NOT REGEXP '^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$'")->count();

        $stats = new Stat();
        $stats->ip = request()->ip();
        $stats->type = 1;
        $stats->query = $request->name . "@" . $domain;
        $stats->results = $mails->isEmpty() ? 0 : count($mails);
        $stats->save();

        if ($mails->isEmpty()) {
            return \redirect('/email-finder')->withErrors("No email addresses found.")->withInput();
        }

        return view("finder", ['mails' => $mails, 'domain' => $domain, 'name' => $request->name, 'mailCount' => $mailCount]);
    }

    public function verify(Request $request, $mail = null)
    {
        $email = $mail;
        if ($request->isMethod('post')) {
            $email = $request->email;
        }

        $verifierArr = VerifierController::lookup($email, 2);

        if ($verifierArr["email_status"] === 3 || $verifierArr["valid_format"] === false || $verifierArr["server_status"] === false) {
            $status = "INVALID";
        } elseif ($verifierArr["email_status"] === 1) {
            $status = "CATCH-ALL";
        } elseif ($verifierArr["email_status"] === 2) {
            $status = "BLOCKED";
        } elseif ($verifierArr["disposable"]) {
            $status = "DISPOSABLE";
        } else {
            $status = "VALID";
        }

        $verify = ["status"=> $status, "valid_format" => $verifierArr["valid_format"], "email_type" => $verifierArr["email_type"], "email_status" => $verifierArr["email_status"], "server_status" => $verifierArr["server_status"], "webmail" => $verifierArr["webmail"], "disposable" => $verifierArr["disposable"]];

        $stats = new Stat();
        $stats->ip = request()->ip();
        $stats->type = 2;
        $stats->query = $email;
        $stats->save();

        return view("verifier", ['verify' => $verify, 'email' => $email]);
    }
}
