@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 box">
      <div class="profile-picture">

      </div>
      <div class="profile-details">
        <p>User Name</p>
        <p>user@email.address</p>
        <p>Member since ::: 2017 / 12 / 3</p>
        <p>Total friends ::: 0</p>
      </div><!--
      --><div class="profile-details">
        <p>Post count ::: 0</p>
        <p>Photo uploaded ::: 0</p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      User's post
    </div>
  </div>

</div>
@endsection
