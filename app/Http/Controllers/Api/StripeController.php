<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function getIntent()
    {
        $user = auth()->user();
        return response()->json(['success'=> true, 'intent'=> $user->createSetupIntent()]);
    }

    public function saveMethod( Request $request ){
        $user = auth()->user();
        $paymentMethodID = $request->get('payment_method');

        if( $user->stripe_id == null ){
            $user->createAsStripeCustomer();
        }

        $user->addPaymentMethod( $paymentMethodID );
        $user->updateDefaultPaymentMethod( $paymentMethodID );
        
        return response()->json(['success'=>true, 'message'=>'Payment method saved']);        
    }

    public function getPaymentMethods( Request $request ){
        $user = auth()->user();

        $methods = array();

        if( $user->hasPaymentMethod() ){
            foreach( $user->paymentMethods() as $method ){
                array_push( $methods, [
                    'id' => $method->id,
                    'brand' => $method->card->brand,
                    'last_four' => $method->card->last4,
                    'exp_month' => $method->card->exp_month,
                    'exp_year' => $method->card->exp_year,
                ] );
            }
        }

        return response()->json( ['success'=>true, 'methods'=>$methods] );
    }

    public function removePaymentMethod( Request $request ){
        $user = auth()->user();
        $paymentMethodID = $request->get('id');

        $paymentMethods = $user->paymentMethods();

        foreach( $paymentMethods as $method ){
            if( $method->id == $paymentMethodID ){
                $method->delete();
                break;
            }
        }
        
        return response()->json(['success'=>true, 'Payment method deleted']);
    }

    public function processSubscription( Request $request ){
        $user = $request->user();
        $planID = $request->get('plan');
        $paymentID = $request->get('payment');

        if( $user->subscribed('MailsHunt') ){
            $user->newSubscription( 'MailsHunt', $planID )
                    ->create( $paymentID );
        }else{
            $user->subscription('MailsHunt')->swap( $planID );
        }
        
        return response()->json([
        'success' => true,
        'message' => 'Subscription successful'
        ]);
    }
}