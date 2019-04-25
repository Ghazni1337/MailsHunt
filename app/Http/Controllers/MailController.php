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
        $mails = Mail::select('mail')->where('mail', 'like', '%' . $domain)->get();

        return view("home", ['mails' => $mails]);
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

        $mails = Mail::select('mail')->where('mail', 'like', '%' . $name[0] . '%' . '%' . $name[1] . '%' . '%' . $domain)->get();

        return view("finder", ['mails' => $mails]);
    }
}
