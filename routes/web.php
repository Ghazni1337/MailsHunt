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

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/domain-search', function () {
//     return view('search');
// })->name('domain-search');

// Route::get('/email-finder', function () {
//     return view('finder');
// });

// Route::get('/email-verifier', function () {
//     return view('verifier');
// });

// Route::get('/shop', function () {
//     return view('shop');
// });

// Route::get('/email-verifier-api', function () {
//     return view('api');
// });

// Route::get('/support', function () {
//     return view('support');
// });

// //addons
// Route::get('/addons', function () {
//     return view('addons.home');
// });
// Route::get('/addons/email-extractor', function () {
//     return view('addons.extractor');
// });
// Route::get('/addons/email-finder', function () {
//     return view('addons.finder');
// });
// Route::get('/addons/email-verifier', function () {
//     return view('addons.verifier');
// });
//end addons

Route::post('/domain-search', 'MailController@search')->middleware('request');
Route::post('/email-finder', 'MailController@find')->middleware('request');
Route::post('/email-verifier', 'MailController@verify')->middleware('request');
Route::get('/email-verifier/{email}', 'MailController@verify')->middleware('request');
Route::get('/api/verifier-lookup/{email}', 'APIController@verifierLookup')->middleware('request');
Route::post('/api/verifier-lookup/{hash}', 'APIController@verifierBulk');
Route::post('/api/extractor', 'APIController@saveExtractor');

//new admin routes
//
//LOGIN
//Begining if the same routes in different names
//dont know why i did this but...
Route::get('/', function(){
    return view('admin.login');
})->name('home');

Route::get('login', function(){
    return view('admin.login');
})->name('admin.login');
// end of sames

Route::post('login', 'AdminController@adminLogin')->name('login');

//DASHBOARD INDEX
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
    Route::get('dashboard', function(){
        return view('admin.index', ['title' => 'Admin area']);
    })->name('dashboard');

    // PLANS 
    Route::get('add_plan', function(){
        return view('plans.add',['title' => 'Add new plan']);
    })->name('plan.add'); 
    Route::get('all_plans', 'PlanController@index')->name('plan.all');
    Route::post('add_plan', 'PlanController@store');  
    Route::get('edit_plan/{id}', 'PlanController@edit')->name('plan.edit');
    Route::post('edit_plan/{id}', 'PlanController@update');
    Route::post('destroy_plan', 'PlanController@destroy')->name('destroy_plan');

    //Accounts
    Route::get('accounts', 'AccountController@index')->name('accounts');
    Route::get('destroy_account/{id}', 'AccountController@destroy')->name('account.delete');
});
