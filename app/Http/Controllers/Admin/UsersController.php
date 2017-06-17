<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index() {
    	$users = \App\User::all();

    	return view('admin.users', compact('users'));
    }

    public function remove($a,$b,$c,$d,$e,$f,$id) {

    	$user = \App\User::find($id);
    	$user->delete();

    	$post = new \App\Post();
    	$post->where('user_id','=',$id)->delete();

    	$like = new \App\Like();
    	$like->where('user_id','=',$id)->delete();

    	// delete comment
    	$comment = new \App\Comment();
    	$comment->where('user_id','=',$id)->delete();

    	return redirect()->route('ausers');
    }

}
