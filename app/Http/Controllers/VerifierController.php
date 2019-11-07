<?php

namespace App\Http\Controllers;

class VerifierController extends Controller
{

    public static function lookup($email, $version = 1) {
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
        if (in_array($email_domain, self::get_banned_domains())) {
            $disposable = true;
        } else {
            $disposable = false;
        }

        // 3 - check if its role email.
        if (in_array($email_user, self::get_role_emails())) {
            $role = true;
        } else {
            $role = false;
        }

        // 4 - check if its free email.
        if (in_array($email_domain, self::get_free_emails())) {
            $free = true;
        } else {
            $free = false;
        }

        // version 2.0
        if ($version === 2) {
            // check DNS for MX records
            if ((bool) checkdnsrr($email_domain, 'MX') === FALSE) {
                $server_status = false;
            } else {
                $server_status = true;
            }

            return ["valid_format" => $valid_format, "email_type" => $role, "email_status" => self::serverStatus($email, $email_domain), "server_status" => $server_status, "webmail" => $free, "disposable" => $disposable];
        }

        // 5 - check DNS for MX records
        if (self::serverStatus($email, $email_domain) === 3) {
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

    private static function serverStatus($toemail, $domain) {
        // 0 - VALID: the email address can receive emails.
        // 1 - ACCEPT ALL: the email address can receive emails but any email address on this domain can.
        // 2 - BLOCKED: the server prevented us to perform the verification.
        // 3 - INVALID: the email address can't receive emails.


        // get the MX records for the host name
        $mxhosts = array();
        getmxrr($domain, $mxhosts, $mxweight);

        if (!empty($mxhosts)) {
            $mx_ip = $mxhosts[array_search(min($mxweight), $mxhosts)];
        } else {
            // If MX records not found, get the A or AAAA DNS records for the host
            $record_a = dns_get_record($domain, DNS_A) ?: dns_get_record($domain, DNS_AAAA);

            if (!empty($record_a)) {
                $mx_ip = $record_a[0]['ip'] ?: $record_a[0]['ipv6'];
            } else {
                // Exit the program if no MX records are found for the domain host
                return 3;
            }
        }

        try {
            // Open a socket connection with the hostname, smtp port 25
            $connect = @fsockopen($mx_ip, 25);

            if ($connect) {
                // Initiate the Mail Sending SMTP transaction
                if (preg_match('/^220/i', $out = fgets($connect, 1024))) {

                    // Send the HELO command to the SMTP server
                    fputs($connect, "HELO $mx_ip\r\n");
                    $out = fgets($connect, 1024);

                    // Send an SMTP Mail command from the sender's email address
                    fputs($connect, "MAIL FROM: <test@gmail.com>\r\n");
                    $from = fgets($connect, 1024);

                    // Send the SCPT command with the recepient's email address
                    fputs($connect, "RCPT TO: <$toemail>\r\n");
                    $to = fgets($connect, 1024);

                    // Send the SCPT command with the recepient's email address
                    fputs($connect, "RCPT TO: <cex2pndmzdtd9x4do3x2ygn235ukaji0jvnp2izx@$domain>\r\n");
                    $catch = fgets($connect, 1024);

                    // Close the socket connection with QUIT command to the SMTP server
                    fputs($connect, 'QUIT');
                    fclose($connect);

                    // The expected response is 250 if the email is valid
                    if (!preg_match('/^250/i', $from) || !preg_match('/^250/i', $to)) {
                        return 3;
                    } elseif (preg_match('/^250/i', $catch)) {
                        return 1;
                    } else {
                        return 0;
                    }
                }
            } else {
                return 2;
            }
        } catch (\Exception $e) {
            return 2;
        }
        return 3;
    }

    private static function get_banned_domains() {
        //where we store the banned domains
        $file = storage_path('app/banned_domains.json');
        //if the json file is not in local or the file exists but is older than 1 week, regenerate the json
        if (!file_exists($file) OR (file_exists($file) AND filemtime($file) < strtotime('-1 week')) )
        {
            $banned_domains = file_get_contents("https://rawgit.com/ivolo/disposable-email-domains/master/index.json");
            if ($banned_domains !== FALSE)
                file_put_contents($file,$banned_domains,LOCK_EX);
        }
        else {
            //get the domains from the file
            $banned_domains = file_get_contents($file);
        }

        return json_decode($banned_domains);
    }

    private static function get_role_emails() {
        $file = storage_path('app/role_emails.json');
        if (file_exists($file))
        {
            $role_emails = file_get_contents($file);
        } else {
            $role_emails = [];
        }
        return json_decode($role_emails);
    }

    private static function get_free_emails() {
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
