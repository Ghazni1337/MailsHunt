<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Stat;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function search(Request $request)
    {
        // $validator = Validator::make(Input::all(), [
        //     'g-recaptcha-response' => 'required'
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(array('success'=>false, "robot verifier" => "Please verify that you are not a robot."));
        // }

        $domain = $request->domain;
        if (strlen($domain) > 255) {
            return response()->json(array('success'=>false, 'invalid domain'=>'Please insert valid domain name'));
        }

        if (!filter_var(gethostbyname($domain), FILTER_VALIDATE_IP)) {
            $parse = parse_url($domain);
            if (!isset($parse['host'])) {
                return response()->json(array('success'=>false, 'invalid domain' => 'Please insert valid domain name'));
            }

            $domain = preg_replace('/^www\./', '', $parse['host']);
            if (!filter_var(gethostbyname($domain), FILTER_VALIDATE_IP)) {
                return response()->json(array('success'=>false, 'invalid domain' => 'Please insert valid domain name'));
            }
        }

        $mails = Mail::select('mail')->where('mail', 'like', '%@' . $domain)->whereRaw("'mail' NOT REGEXP '^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$'")->limit(10)->get();

        $stats = new Stat();
        $stats->ip = request()->ip();
        $stats->type = 0;
        $stats->query = $domain;
        $stats->results = $mails->isEmpty() ? 0 : count($mails);
        $stats->save();

        if ($mails->isEmpty()) {
            return response()->json(array('success'=>false,'No email' => 'No email addresses found.'));
        }

        // return view("search", ['mails' => $mails, 'domain' => $domain]);
        return response()->json(array('success'=>true, 'mails'=> $mails, 'domain'=>$domain));
    }

    public function find(Request $request)
    {
        // $validator = Validator::make(Input::all(), [
        //     'g-recaptcha-response' => 'required'
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(array('success' => false, 'robot verifier' => 'Please verify that you are not a robot.'));
        // }

        $domain = $request->domain;

        if (!isset($request->name)) {
            return response()->json(array('success'=> false, 'finder error' => 'Please insert full name'));
        }

        if (!filter_var(gethostbyname($domain), FILTER_VALIDATE_IP)) {
            $parse = parse_url($domain);
            $domain = preg_replace('/^www\./', '', $parse['host']);
            if (!isset($parse['host']) || !filter_var(gethostbyname($domain), FILTER_VALIDATE_IP)) {
                return response()->json(array('success' => false, 'invalid domain' => 'Please insert valid domain name'));
            }
        }

        $query = "";
        foreach (explode(" ", $request->name) as $name) {
            $query .= '%' . $name . '%';
        }

        $mails = Mail::select('mail')->where('mail', 'like', $query . '@' . $domain)->whereRaw("'mail' NOT REGEXP '^[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$'")->limit(10)->get();

        $stats = new Stat();
        $stats->ip = request()->ip();
        $stats->type = 1;
        $stats->query = $request->name . "@" . $domain;
        $stats->results = $mails->isEmpty() ? 0 : count($mails);
        $stats->save();

        if ($mails->isEmpty()) {
            return response()->json(array('success' => false, 'No email' => 'No email addresses found.'));
        }

        return response()->json(array('mails' => $mails, 'domain' => $domain, 'name' => $request->name));
        // return view("finder", ['mails' => $mails, 'domain' => $domain, 'name' => $request->name]);
    }

    public function verify(Request $request, $mail = null)
    {
        // $validator = Validator::make(Input::all(), [
        //     'g-recaptcha-response' => 'required'
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(array('success' => false, 'robot verifier' => 'Please verify that you are not a robot'));
        // }

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
        return response()->json(array('success' => true, 'verify' => $verify, 'email' => $email));
        // return view("verifier", ['verify' => $verify, 'email' => $email]);
    }
}
