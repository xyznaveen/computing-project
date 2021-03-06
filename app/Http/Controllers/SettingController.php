<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {

    	// find user currently logged in
    	$user = \App\User::with('profile')->find(auth()->user()->id);

      	return view('settings', compact('user'));
    }
}
