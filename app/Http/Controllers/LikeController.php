<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function newLike(Request $request) {

      $like = new \App\Like();
      // check if user has already liked the post
      $countl = $like->where('post_id','=',$request->postid)->where('user_id','=',auth()->user()->id)->count();
      if($countl === 0) {
        $like->user_id = auth()->user()->id;
        $like->post_id = $request->postid;
        $like->save();
      }
      $countl = $like->where('post_id','=',$request->postid)->count();
      return $countl;
    }
}
