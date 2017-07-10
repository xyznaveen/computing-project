<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        
        // $collection = $post->with(['user','user.profile','like','comment'])
        //                     ->where('friends.user_one',$user->id)
        //                     ->orWhere('friends.user_two',$user->id)
        //                     ->orderBy('posts.created_at','desc')
        //                     ->paginate(8);

        $collection = $post->with(['user','user.profile','like','comment'])
                           ->where('user_id', function($query) {
                                $query->select('user_one')->from('friends')
                                ->where('user_two', auth()->user()->id);
                           })
                           ->orWhere('user_id', auth()->user()->id)
                           ->orderBy('posts.created_at','desc')
                           ->paginate(8);
        
        // if(count($collection) === 0) {
        //     $collection = \App\Post::with(['user', 'comment', 'like'])->where('user_id','=',auth()->user()->id)->orderBy('posts.created_at','desc')->paginate(8);
        // }  
        
        return view('home', compact('collection'));
    }

}
