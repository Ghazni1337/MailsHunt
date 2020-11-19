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
});

Route::group(['middleware' => ['auth.jwt', 'cors'], 'prefix' => 'v1'], function () {
    
    // Route::post('tenant', 'Api\ApiAuthController@registerTenant');
});
