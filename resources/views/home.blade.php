@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 alert alert-success alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success!</strong> Posted your update.
    </div>

    <div class="col-md-8 col-md-offset-2 alert alert-danger alert-dismissable fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Error!</strong> The post cannot be empty.
    </div>
  </div>
  <div class="row">

    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default create-post nbr home-post">

          <form id="create-post" class="" method="post">
            {{ csrf_field() }}
            <textarea class="panel-body form-control create-post-area nbr" name="post_text"
                      value="" placeholder="write something cool . . . ">
            </textarea>
            <div class="panel-footer nbr">
              <input type="submit" class="btn btn-default col-md-offset-11" value="Post">
            </div>
          </form>
      </div>
    </div>
    @if(count($collection) == 0)
      <div class="col-md-8 col-md-offset-2">
          <center><h3>Dull and boring feed?</h3></center>
          <center>Get conected <a href="/discover">See list of active people on PSN</a></center>
        </div>
    @else
    
    @foreach($collection as $key => $value)
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default nbr home-post">
        <div class="panel-body nbr">
           <?php 
           $immg = DB::table('profiles')
                   ->select('profile_image_url as propic')
                   ->where('user_id','=',$value->user->id)
                   ->get(); 
           ?>
          <div class="fimg">
            @foreach($immg as $pro)
              @if(true)
                <img src="/storage/{{ $pro->propic }}">
              @endif
            @endforeach
          </div>
          <a href="/user/{{ $value->user->id }}" class="bold">{{ $value->user->name  }}</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a onclick="e.preventDefault()" title="{{ date('F d, Y', strtotime($value->created_at)) }} &middot; {{ date('H:m A', strtotime($value->created_at)) }}">{{ $value->created_at->diffForHumans() }}</a>
          <hr>
          <p>
            {{ $value->text }}
            {{ $value }}
          </p>
          <p class="pst">
            <input type="hidden" class="p_token" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" class="p_userid" name="_userid" value="{{ auth()->user()->id }}" />
            <input type="hidden" class="p_postid" name="_postid" value="{{ $value->id }}" />
            <a class="post_like">Like</a> &middot;

            <a class="a" href="/user/{{ $value->user->id }}/post/{{ $value->id }}">Comment</a>
          </p>
        </div>
        <div class="panel-footer nbr">
          <i class="fa fa-thumbs-up" aria-hidden="true"></i> <span class="like_count">{{ count($collection->get($key)->like) }}</span> like(s) &nbsp;&middot;&nbsp;
          <i class="fa fa-comment" aria-hidden="true"></i> {{ count($collection->get($key)->comment) }} comment(s)
        </div>
      </div>
    </div>
    @endforeach
    @endif

    <div class="col-md-8 col-md-offset-2">
      {{ $collection->links() }}
    </div>

  </div>
</div>

@endsection
