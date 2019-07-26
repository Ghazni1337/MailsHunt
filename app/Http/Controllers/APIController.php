<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function verifierLookup(Request $request, $mail) {
        $email = $mail;

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
            'is-disposable' => $disposable,
            'is-role' => $role,
            'is-freemail' => $free,
            'server-status' => $server_status,
            'email-domain' => $email_domain,
            'email-user' => $email_user
        ];

        return json_encode($obj, JSON_UNESCAPED_SLASHES);
    }
}
