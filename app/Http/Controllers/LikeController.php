<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function newLike(Request $request) {

      $like = new \App\Like();

      // check if user has already liked the post
      $countl = $like->where('post_id','=',$request->postid)->where('user_id','=',auth()->user()->id)->count();
      
      // if there was no previous like
      if($countl === 0) {
        
        // insert the value i.e. Like
        $like->user_id = auth()->user()->id;
        $like->post_id = $request->postid;
        $like->save();
      } else {

        // unlike the liked post
        $like = $like->where('post_id','=',$request->postid)->where('user_id','=',auth()->user()->id)->first();
        $like->delete();
      }

      // get total likes for the post
      $countl = $like->where('post_id','=',$request->postid)->count();
      return $countl;
    }
}
