<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function newPost(Request $request) {

      $postText = $request->post_text;
      $userId = auth()->user()->id;

      if(\App\Post::create( [ 'text'=>$postText, 'user_id'=> $userId ] ))
        return 'success';
      else
        return 'failure';

    }

}
