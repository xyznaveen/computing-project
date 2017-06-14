@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="pad">
        Chat With : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
          $users = DB::table('users')->get();
         ?>
        <select class="m-user" name="">
          @foreach($users as $user)
          @if($user->id === auth()->user()->id)
            <?php continue; ?>
          @endif
          <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
        </select>
        <input type="hidden" name="sender" class="_sender" value="{{ auth()->user()->id }}">
        <button type="button" name="button" class="nbr btn btn-primary load-convo">Load Conversation</button>
      </div>
    </div>

    <div class="col-md-8 col-md-offset-2">
      <div class="m-display">
        <div class="chat">
        {{--@foreach($messages as $message)
          @if($message->sent_by == auth()->user()->id)
          <div class="bubble me">{{ $message->message_text }}</div>
          @else
          @endif
          <div class="bubble you">{{ $message->message_text }}</div>
        @endforeach--}}
        </div>
      </div>
      <div class="m-write">
        <form id="message" class="m-form" method="post">
          <input type="text" name="message" value="" class="message" placeholder="Enter message.">
          <input type="hidden" name="to" value="">
          <input type="hidden" name="by" class="sentby" value="{{ auth()->user()->id }}">
          {{ csrf_field() }}
          <input type="submit" name="send" value="SEND" />
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
