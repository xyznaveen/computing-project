@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="pad">
        Your Friend(s) :=
        <select class="m-user" name="">
          <option value="">-- select a name --</option>
        </select>
        <button type="button" name="button" class="btn btn-primary">Load Conversation</button>
      </div>
    </div>

    <div class="col-md-8 col-md-offset-2">
      <div class="m-display">
        @foreach($messages as $message)
        <div class="chat">
          @if($message->sent_by == auth()->user()->id)
          <div class="bubble me">{{ $message->message_text }}</div>
          @else
          <div class="bubble you">{{ $message->message_text }}</div>
          @endif
        </div>
        @endforeach
      </div>
      <div class="m-write pad mshadow">
        <form id="message" class="m-form" method="post">
          <input type="text" name="message" value="" class="message" placeholder="Enter message.">
          <input type="hidden" name="to" value="">
          {{ csrf_field() }}
          <input type="submit" name="send" value="SEND" />
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
