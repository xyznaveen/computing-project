@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="">
        Your Friend(s) :=
        <select class="m-user" name="">
          <option value="this is empty">User's Name</option>
        </select>
        <button type="button" name="button" class="btn btn-primary">Load Conversation</button>
      </div>
    </div>

    <div class="col-md-8 col-md-offset-2">
      <div class="m-display">
        @for($i = 0 ; $i < 100; ++$i)
        <div class="chat">
          <div class="bubble me">Hello t I'm an expandeable chat box with box shadow. How I'm an expandeable chat box with box shadow. Howhere!</div>
          <div class="bubble me">Hello there!</div>
          <div class="bubble me">Hello there!</div>
          <div class="bubble you">Hi. I'm an expandeable chat box with box shadow. How are you? I expand horizontally and vertically, as you can see here.</div>
          <div class="bubble you">Hi. I'm an expandeable chat box with box shadow. How are you? I expand horizontally and vertically, as you can see here.</div>

        </div>
        @endfor
      </div>
      <div class="m-write">
        <form class="m-form"method="post">
          <input type="text" name="m-text" value="" placeholder="Enter message.">
          <input type="submit" name="send" value="SEND" />
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
