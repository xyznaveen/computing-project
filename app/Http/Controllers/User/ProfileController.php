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

      $imageCount = \App\Image::where('user_id','=',auth()->user()->id)->count();

      $post = new \App\Post();
      $collection = $post->with('like','comment')->where('user_id','=',$userId)->orderBy('created_at','desc')->paginate(8);

      return view('user.profile', compact('collection', 'profile', 'imageCount'));
    }

    public function getUser($id) {
      $user = new \App\User();
      $users = $user->with('profile','like','post')->where('id','=',$id)->first();
      $imageCount = \App\Image::where('user_id','=',$id)->count();
      return view('user.profile', ['collection'=>$users,'imageCount'=>$imageCount]);
    }

}
