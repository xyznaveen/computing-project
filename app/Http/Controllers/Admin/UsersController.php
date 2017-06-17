<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index() {
    	$users = \App\User::all();

    	return view('admin.users', compact('users'));
    }

    public function remove($id) {

    	$user = \App\User::find($id);
    	
    	$user->delete();

    }

}
