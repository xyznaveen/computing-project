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
        $friend->user_one = auth()->user()->id;
        $friend->user_two = $to;
        $friend->save();
      } else {
        return 'you are already friend with this person!';
      }
    }

}
