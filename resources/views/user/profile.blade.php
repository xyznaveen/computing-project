@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="profile-picture">

      </div>
      <div class="profile-details">
        <p>{{ auth()->user()->name }}</p>
        <p>{{ auth()->user()->email }}</p>

        <p>Joined on - {{ date('F d, Y', strtotime(auth()->user()->created_at)) }}</p>
        <p>Users known - 0</p>
      </div><!--
      --><div class="profile-details">
        <p>Total posts - {{ DB::table('posts')->where('user_id',1)->count() }}</p>
        <p>Total photos - 0</p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <u><h2>User's post(s)</h2></u>
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
