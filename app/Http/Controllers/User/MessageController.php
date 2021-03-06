<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    public function index() {
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

    /*
    * @param  $s - sender id
    * @param  $r - receiver id
    * @return     JSON of the laravel collection
    */
    public function getMessages($s,$r) {

      // fetch all the records where either sent by receiver or received by sender
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
