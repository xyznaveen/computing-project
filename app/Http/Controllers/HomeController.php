<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = new \App\Post();

        $user = \App\User::with('role')->find(auth()->user()->id);

        $collection = $post->with(['user' ,'like','comment'])
                            ->join('friends as f','user_two','=','user_id')
                            ->where('f.user_one','=',auth()->user()->id)
                            ->orderBy('posts.created_at','desc')
                            ->paginate(8);

        return view('home', compact('collection'));
    }

}
