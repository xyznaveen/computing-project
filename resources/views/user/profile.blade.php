@extends('layouts.app')

@if(!isset($collection->id))
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 shadow pad1">
      <div class="profile-picture">

      </div>
      <div class="profile-details">
        <h1>{{ auth()->user()->name }}</h1>
        <p>{{ auth()->user()->email }}</p>

        <p>Joined on - {{ date('F d, Y', strtotime(auth()->user()->created_at)) }}</p>
        <p>Friend(s) - 0</p>
      </div><!--
      --><div class="profile-details">
        <p>Total posts - {{ DB::table('posts')->where('user_id', auth()->user()->id)->count() }}</p>
        <p>Total photos - 0</p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2 mar1">
      <center><h2>User's Post(s)</h2></center>
    </div>
    @if( count($collection) == 0 )
    <div class="col-md-8 col-md-offset-2">
      <h4>You have not shared anything.</h4>
      <h5><a href="/home">post something</a> first.</h5>
    </div>
    @endif
    @foreach($collection as $key => $value)
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="fimg">

          </div>
          <a href="/user/{{auth()->user()->id}}" class="bold">{{auth()->user()->name}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a onclick="e.preventDefault()" title="{{ date('F d, Y', strtotime($value->created_at)) }} &middot; {{ date('H:m A', strtotime($value->created_at)) }}">{{ $value->created_at->diffForHumans() }}</a>
          <hr>
          <p>{{ $value->text }}</p>
          <p class="pst">
            <input type="hidden" class="p_token" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" class="p_userid" name="_userid" value="{{ auth()->user()->id }}" />
            <input type="hidden" class="p_postid" name="_postid" value="{{ $value->id }}" />
            <a class="post_like">Like</a> &middot;
            <a class="a" href="/user/{{ $value->user->id }}/post/{{ $value->id }}">Comment</a>
          </p>
        </div>
        {{-- count number of likes on this post --}}
        <?php $likes = 0;?>
        @foreach($value->like as $like)
          @if( $like->post_id == $value->id )
            <?php $likes++; ?>
          @endif
        @endforeach

        {{-- count number of comment on this post --}}
        <?php $ccount = 0; ?>
        @foreach($value->comment as $comment)
          @if( $comment->post_id == $value->id )
            <?php ++$ccount; ?>
          @endif
        @endforeach
        <div class="panel-footer">
          {{ $likes }} like(s) &middot; {{ $ccount }} comment(s)
        </div>
      </div>
    </div>
    @endforeach
    <div class="col-md-8 col-md-offset-2">
      {{ $collection->links() }}
    </div>
  </div>
</div>
@endsection
@else
@section('content')
@if($collection->id == auth()->user()->id)
<script>window.location = "http://127.0.0.1:8000/profile"</script>
@endif
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 shadow pad1">
      <div class="profile-picture">

      </div>
      <div class="profile-details">
        <h1>{{ $collection->name }}</h1>
        <p>{{ $collection->email }}</p>
        <input type="hidden" name="to" class="profile_user_id" value="{{$collection->id}}">

        <p>Joined on - {{ date('F d, Y', strtotime($collection->created_at)) }}</p>
        <p>Friend(s) - 0</p>
      </div><!--
      --><div class="profile-details">
        <p>Total posts - {{ DB::table('posts')->where('user_id', $collection->id)->count() }}</p>
        <p>Total photos - 0</p>
      </div>
      <div class="col-md-8 col-md-offset-2 mar1">
        <button type="button" class="btn btn-primary nbr btn-shadow add_friend" name="button">add friend</button>
        <button type="button" class="btn btn-primary nbr btn-shadow" name="button">report this user</button>
      </div>
    </div>
  </div>
  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <center><h2>User's Post(s)</h2></center>
    </div>
    @if( count($collection) == 0 )
    <div class="col-md-8 col-md-offset-2">
      <h4>You have not shared anything.</h4>
      <h5><a href="/home">post something</a> first.</h5>
    </div>
    @endif
    {{-- prepare like counter -- }}
    {{-- extract each post from the collection --}}
    @foreach($collection->post as $key => $value)
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <a href="/user/{{$collection->id}}" class="bold">{{ $collection->name }}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a onclick="e.preventDefault()" title="{{ date('F d, Y', strtotime($value->created_at)) }} &middot; {{ date('H:m A', strtotime($value->created_at)) }}">{{ $value->created_at->diffForHumans() }}</a>
          <hr>
          {{-- display the user's post's text --}}
          <p>{{ $value->text }}</p>
          <p class="pst">
            <input type="hidden" class="p_token" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" class="p_userid" name="_userid" value="{{ auth()->user()->id }}" />
            <input type="hidden" class="p_postid" name="_postid" value="{{ $collection->id }}" />
            <a class="post_like">Like</a> &middot;
            <a class="a" href="/user/{{ $collection->id }}/post/{{ $value->id }}">Comment</a>
          </p>
        </div>
        <div class="panel-footer">
        
        {{-- count number of likes on this post --}}
        <?php $likes = 0;?>
        @foreach($value->like as $like)
          @if( $like->post_id == $value->id )
            <?php $likes++; ?>
          @endif
        @endforeach

        {{-- count number of comment on this post --}}
        <?php $ccount = 0; ?>
        @foreach($value->comment as $comment)
          @if( $comment->post_id == $value->id )
            <?php ++$ccount; ?>
          @endif
        @endforeach

        {{ $likes }} like(s) &middot; {{ $ccount }}  comment(s)
        </div>
      </div>
    </div>
    {{-- reset the counter at the end of each loop, because next iteration will be for a different post --}}
    @endforeach
    <div class="col-md-8 col-md-offset-2">
    </div>
  </div>
</div>
@endsection
@endif