<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function newLike(Request $request) {

      $userId = auth()->user()->id;

      return $request->postid;

    }
}
