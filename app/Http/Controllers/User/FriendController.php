<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{

  public function index() {
    $users = \App\User::with('profile')->where('id','<>',auth()->user()->id)->get();
    return view('user.user_list', compact('users'));
  }

}
