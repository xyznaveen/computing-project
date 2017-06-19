@extends('layouts.app')
@section('content')

<div class="col-md-8 col-md-offset-2">
  <div class="update-form">
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('proupdate') }}">
      {{ csrf_field() }}
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Full Name:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="email" name="name" placeholder="Enter your name" value="{{ auth()->user()->name }}">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="address">Addrerss:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="{{ $user->profile->address }}">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="phone-number">Phone number :</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="phone-number" name="phone-number" placeholder="Enter phone-number" value="{{ $user->profile->phone_number }}">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="phone-number">Photo : </label>
        <div class="col-sm-4">
          <input type="file" class="control-label" name="picture" id="fileToUpload">
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
