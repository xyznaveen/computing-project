@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="profile-picture">

      </div>
      <div class="profile-details">
        <p>User Name</p>
        <p>user@email.address</p>
        <p>Joined on - 2017 / 12 / 3</p>
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
      User's post
    </div>
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
