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

        // selecting post from all user except from this user
        // $collection = $post->with('user', 'like', 'comment')
        //               ->where('user_id','=','friends.user_two')
        //               ->where('f.user_one','=',auth()->user()->id)
        //               ->orderBy('created_at', 'desc')
        //               ->paginate(8);

        $collection = $post->with('user','like','comment')
                            ->join('friends', function($q){
                              $q->on('user_id','friends.user_two')
                                ->where('friends.user_one','=',auth()->user()->id)
                                ->orWhere('user_id','=',auth()->user()->id);
                            })->orderBy('friends.created_at','desc')->get();

        return view('home', ['collection'=>$collection]);
    }

}
