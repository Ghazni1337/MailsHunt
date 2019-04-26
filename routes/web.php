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

//Route::get('/faq', function () {
//    return view('faq');
//});

Route::get('/support', function () {
    return view('support');
});

Route::post('/domain-search', 'MailController@search');

Route::post('/email-finder', 'MailController@find');

Route::post('/email-verifier', 'MailController@verify');