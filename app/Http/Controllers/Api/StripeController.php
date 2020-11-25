<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function chargeAccount(Request $request)
    {
    	\Stripe\Stripe::setApiKey('sk_test_gOOGJfuY3sDy9EepXbKBMsp600Cg4NFsIr');
        \Stripe\Charge::create ([
                "amount" => $request->amount,
                "currency" => "usd",
                "source" => $this->getToken($request),
                "description" => "Test payment from MailsHunt" 
        ]);

        return response()->json(['success'=>true, 'message'=>'Payment successful']);
    }

    public function getToken(Request $request)
    {
		$response = \Stripe\Token::create(array(
		  "card" => array(
		    "number"    => $request->card_number,
		    "exp_month" => $request->exp_month,
		    "exp_year"  => $request->exp_year,
		    "cvc"       => $request->cvc,
		    "name"      => $request->name
		)));

		return $response->id;
    }
}