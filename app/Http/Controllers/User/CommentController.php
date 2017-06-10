<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function newComment($postid, $text) {

      $comment = new \App\Comment();
      $comment->text = $text;
      $comment->user_id = auth()->user()->id;
      $comment->post_id = $postid;
      $comment->save();

      return 'success';

    }
}
