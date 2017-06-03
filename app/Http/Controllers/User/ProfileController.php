<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function loadProfile() {

      $userId = auth()->user()->id;

      $collection = \App\Post::where('user_id',1)->paginate(10);

      return view('user.profile', ['collection'=>$collection]);
    }

}
