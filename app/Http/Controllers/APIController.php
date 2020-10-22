<?php

namespace App\Http\Controllers;

use App\APIUser;
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
        $stats->query = $email;
        $stats->save();

        return json_encode(VerifierController::lookup($email), JSON_UNESCAPED_SLASHES);
    }

    public function verifierBulk(Request $request, $hash) {
        $user = APIUser::where('hash', $hash)->first();

        if (!$user) {
            return json_encode(["success" => false, "message" => "failed to authenticate"], JSON_UNESCAPED_SLASHES);
        }

        set_time_limit(0);
        if ($request->getContent() && isset(json_decode($request->getContent(), true)["emails"])) {
            $emails = json_decode($request->getContent(), true)["emails"];
            $bulk = [];
            foreach ($emails as $key => $email) {
                if ($key < 20) {
                    array_push($bulk, VerifierController::lookup($email));
                } else {
                    break;
                }
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
}
