@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
  @foreach($users as $key => $user)
    <div class="row">
      <div class="col-md-12">
        @if($user->profile)
        @endif
        <div class="panel panel-default nbr">
          <div class="panel-body pad1">
            <div class="row">
              <div class="col-md-10">
                <div class="fimg">
                  <img src="/storage/{{ $user->profile->profile_image_url }}">
                </div>
                <a href="/user/{{ $user->id }}" class="bold">{{ $user->name  }}</a>
                since : {{ date('F d, Y', strtotime($user->created_at)) }}
                <input type="hidden" name="to" class="profile_user_id" value="{{$user->id}}">
              </div>
              <div class="col-md-2">
                <button type="button" name="button" class="btn btn-default add_friend btn-xs">Add Friend</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
