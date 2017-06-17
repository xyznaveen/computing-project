<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function loadProfile() {
      $userId = auth()->user()->id;

      $profile = new \App\Profile();
      $profile = $profile->where('user_id','=',$userId)->get();

      $profile = $profile->get(0);

      $post = new \App\Post();
      $collection = $post->with('like','comment')->where('user_id','=',$userId)->orderBy('created_at','desc')->paginate(8);

      return view('user.profile', compact('collection', 'profile'));
    }

    public function test() {
      $user = new \App\Post;
      $users = $user->find(auth()->user()->id)->user();

      dd($users);

    }

    public function getUser($id) {
      $user = new \App\User();
      $users = $user->with('like','post')->where('id','=',$id)->first();
      return view('user.profile', ['collection'=>$users]);
    }

}
