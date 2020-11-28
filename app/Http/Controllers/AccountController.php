<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class AccountController extends Controller
{
    public function index()
    {
    	$title = "Registered accounts";
    	$accounts = Account::all();

    	return view('accounts.index',compact('title','accounts'));
    }

    public function destroy($id)
    {
    	$account = Account::find($id);
    	$account->delete();

    	session()->flash('success','Account successfully deleted');
    	return redirect()->back();
    }
}
