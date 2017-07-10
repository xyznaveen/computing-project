<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendRequestController extends Controller
{

    public function sendRequest($to) {

      $friend = new \App\Friend();
      $res = \App\Friend::where('user_one','=',auth()->user()->id)
                          ->where('user_two','=',$to)->get();

      if(count($res) === 0){
        \App\Friend::create(['user_one'=>auth()->user()->id, 'user_two'=>$to]);
        \App\Friend::create(['user_one'=>$to, 'user_two'=>auth()->user()->id]);
      } else {
        return 'you are already friends with this person!';
      }
    }

}
