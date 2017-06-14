<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    public function index() {

      // $messages = \App\Message::with('receivedBy')
      //             ->where('sent_by','=',auth()->user()->id)
      //             ->orWhere('received_by','=',3)
      //             ->orderBy('created_at','desc')
      //             ->get();
      return view('message');
    }

    public  function newMessage(Request $request) {
      $message = new \App\Message();
      $message->sent_by = auth()->user()->id;
      $message->received_by = $request->to;
      $message->message_text = $request->input('message');
      $message->save();

      return $message->message_text;

    }

    public function getMessages($s,$r) {
      $messages = \App\Message::with('receivedBy')
                  ->where('sent_by','=',$s)
                  ->where('received_by','=',$r)
                  ->orWhere('sent_by','=',$r)
                  ->where('received_by','=',$s)
                  ->orderBy('created_at','desc')
                  ->get();
      return json_encode($messages);
    }
}
