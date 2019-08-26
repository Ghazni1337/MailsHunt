<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/domain-search', function () {
    return view('home');
});

Route::get('/email-finder', function () {
    return view('finder');
});

Route::get('/email-verifier', function () {
    return view('verifier');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/email-verifier-api', function () {
    return view('api');
});

Route::get('/support', function () {
    return view('support');
});

//addons
Route::get('/addons', function () {
    return view('addons.home');
});
Route::get('/addons/domain-extractor', function () {
    return view('addons.extractor');
});
Route::get('/addons/email-finder', function () {
    return view('addons.finder');
});
Route::get('/addons/email-verifier', function () {
    return view('addons.verifier');
});
//end addons

Route::post('/domain-search', 'MailController@search');
Route::post('/email-finder', 'MailController@find');
Route::post('/email-verifier', 'MailController@verify');
Route::get('/email-verifier/{email}', 'MailController@verify');
Route::get('/api/verifier-lookup/{email}', 'APIController@verifierLookup');
Route::post('/api/extractor', 'APIController@saveExtractor');
