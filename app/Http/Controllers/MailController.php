<?php

namespace App\Http\Controllers;

use App\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function search(Request $request) {
        $domain = $request->domain;
        $mails = Mail::select('mail')->where('mail', 'like', '%' . $domain)->get();

        return view("home", ['mails' => $mails]);
    }
}
