<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function loadProfile() {

      $userId = auth()->user()->id;

      $collection = \App\Post::where('user_id',$userId)->paginate(10);

      return view('user.profile', ['collection'=>$collection]);
    }

    public function test() {
      $user = new \App\Post;
      $users = $user->find(auth()->user()->id)->user();

      dd($users);

    }

    public function getUser($email) {
      $user = new \App\User;
      $users = $user->with('post', 'like')->where('email','=',$email)->first();
      return view('user.profile', ['collection'=>$users]);
    }

}
