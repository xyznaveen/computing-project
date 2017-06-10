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
    <div class="col-md-8 col-md-offset-2">
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
        <div class="panel-heading">
          <a href="/user/{{auth()->user()->id}}">{{auth()->user()->name}}</a>
        </div>
        <div class="panel-body">
          {{ $value->text }}
        </div>
        <div class="panel-footer">
          {{ $value->id }}
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

        <p>Joined on - {{ date('F d, Y', strtotime($collection->created_at)) }}</p>
        <p>Friend(s) - 0</p>
      </div><!--
      --><div class="profile-details">
        <p>Total posts - {{ DB::table('posts')->where('user_id', $collection->id)->count() }}</p>
        <p>Total photos - 0</p>
      </div>
      <div class="col-md-8 col-md-offset-2 mar1">
        <button type="button" class="btn btn-primary nbr btn-shadow" name="button">add friend</button>
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
    <?php
      $likes = 0;
    ?>
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="/user/{{$collection->id}}">{{ $collection->name }}</a>
        </div>
        <div class="panel-body">
          {{-- display the user's post's text --}}
          {{ $value->text }}
        </div>
        <div class="panel-footer">
          {{-- extract each like from the collection, retrived using eager loading --}}
          @foreach($collection->like as $like)
            {{-- check if the like belongs to the post --}}
            @if($value->id == $collection->like->get(0)->post_id)

              <?php
               // increment the counter by 1
               $likes++;
              ?>

            @endif
          @endforeach

          {{ $likes }} like(s) &middot;
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
