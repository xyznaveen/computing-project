@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-2">
  <div class="update-form">
    <form class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Full Name:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="email" placeholder="Enter email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Old Password:</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="pwd" placeholder="Enter password">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">New Password:</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" id="pwd" placeholder="Enter password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
          <button type="submit" class="btn btn-default">Save Changes</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection
