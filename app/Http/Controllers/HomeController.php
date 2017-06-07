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
        $collection = $post->with('user')->orderBy('created_at', 'desc')->paginate(12);


        return view('home', ['collection'=>$collection]);
    }

}
