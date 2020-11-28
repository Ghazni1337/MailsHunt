<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors', 'id.tenant'], 'prefix' => 'v1'], function () {
    Route::post('register', 'Api\ApiAuthController@registerTenant');
    Route::post('login', 'Api\ApiAuthController@login');
    Route::post('domain-search', 'MailController@search')->middleware('request');
    Route::post('email-finder', 'MailController@find')->middleware('request');
    Route::post('email-verifier', 'MailController@verify')->middleware('request');
    Route::get('email-verifier/{email}', 'MailController@verify')->middleware('request');
    Route::post('get-fqdn', 'Api\ApiAuthController@findFQDN');
    Route::post('charge-account','Api\StripeController@chargeAccount');
    Route::post('find','MailController@doWebScraping');

    //Paypal payment routes
    	Route::post('paypal/express-checkout', 'Api\PaypalController@expressCheckout');
		Route::get('paypal/express-checkout-success', 'Api\PaypalController@expressCheckoutSuccess');
		Route::post('paypal/notify', 'Api\PaypalController@notify');

    //authenticated routes
    Route::group(['middleware' => 'auth.jwt'], function () {
    	//Leads List routes
    	Route::post('create-list', 'Api\LeadsListController@createList');
    	Route::post('update-list', 'Api\LeadsListController@update');
    	Route::get('delete-list/{id}', 'Api\LeadsListController@destroy');
    	Route::get('all-lists', 'Api\LeadsListController@index');
    	Route::get('list/{id}/prospects', 'Api\LeadsListController@getProspects');

    	//Prospect/Leads routes
    	Route::post('add-prospect', 'Api\ProspectController@store');//save prospect info and add to the choosen list
    	Route::post('update-prospect', 'Api\ProspectController@update');
    	Route::get('prospect/{id}/view', 'Api\ProspectController@show');
    	Route::get('delete-prospect/{id}', 'Api\ProspectController@destroy');
    	Route::get('all-prospects', 'Api\ProspectController@index');

    	//Plans route
    	Route::get('get-plans', 'PlanController@getPlansAPI');

    	//User routes
    	Route::get('user', 'Api\ApiAuthController@currentUser');
    	Route::get('logout', 'Api\ApiAuthController@logout');

    	//Stripe payment route
    	Route::get('stripe/setupintent', 'Api\StripeController@getIntent');
    	Route::post('stripe/payment-method', 'Api\StripeController@saveMethod');
    	Route::get('stripe/get-payment-methods', 'Api\StripeController@getPaymentMethods');
    	Route::get('stripe/delete-method', 'Api\StripeController@removePaymentMethod');
    	Route::post('stripe/subscribe', 'Api\StripeController@processSubscription');

  //   	//Paypal payment routes
  //   	Route::post('paypal/express-checkout', 'Api\PaypalController@expressCheckout');
		// Route::get('paypal/express-checkout-success', 'Api\PaypalController@expressCheckoutSuccess');
		// Route::post('paypal/notify', 'Api\PaypalController@notify');
	});
});


