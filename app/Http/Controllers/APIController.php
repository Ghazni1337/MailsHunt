<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Stat;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function verifierLookup(Request $request, $mail) {
        $email = $mail;

        $stats = new Stat();
        $stats->ip = request()->ip();
        $stats->type = 3;
        $stats->save();

        return json_encode($this->verfier($email), JSON_UNESCAPED_SLASHES);
    }

    public function verifierBulk(Request $request) {
        if ($request->getContent() && isset(json_decode($request->getContent(), true)["emails"])) {
            $emails = json_decode($request->getContent(), true)["emails"];
            $bulk = [];
            foreach ($emails as $email) {
                array_push($bulk, $this->verfier($email));
            }

            $obj = (object) [
                'emails' => $bulk,
            ];

            $stats = new Stat();
            $stats->ip = request()->ip();
            $stats->type = 4;
            $stats->results = count($emails);
            $stats->save();

            return json_encode($obj, JSON_UNESCAPED_SLASHES);
        } else {
            return json_encode('{"success": false, "message": "no email address found!"}', JSON_UNESCAPED_SLASHES);
        }
    }

    public function saveExtractor(Request $request) {
        foreach ($request->emails as $email) {
            Mail::firstOrCreate(['mail' => $email]);
        }

        return json_encode('{"success": true}');
    }

    function verfier($email) {
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
        if (in_array($email_domain, MailController::get_banned_domains())) {
            $disposable = true;
        } else {
            $disposable = false;
        }

        // 3 - check if its role email.
        if (in_array($email_user, MailController::get_role_emails())) {
            $role = true;
        } else {
            $role = false;
        }

        // 4 - check if its free email.
        if (in_array($email_domain, MailController::get_free_emails())) {
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

        // 6 - check deliverable
        if ($valid_format && $server_status) {
            $deliverable = true;
        } else {
            $deliverable = false;
        }

        if  (!$valid_format) {
            $email_domain = "invalid";
            $email_user = "invalid";
        }

        $obj = (object) [
            'success' => true,
            'email' => $email,
            'deliverable' => $deliverable,
            'valid-format' => $valid_format,
            'disposable' => $disposable,
            'role-base' => $role,
            'free-mail' => $free,
            'server-status' => $server_status,
            'email-domain' => $email_domain,
            'email-user' => $email_user
        ];

        return $obj;
    }
}
