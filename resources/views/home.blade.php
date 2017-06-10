@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 alert alert-success">
      <strong>Success!</strong> Your post was submitted successfully.
    </div>

    <div class="col-md-8 col-md-offset-2 alert alert-danger nbr">
      You need to type in some text before you submit.
    </div>
  </div>
  <div class="row">


    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default create-post nbr">

          <form id="create-post" class="" method="post">
            {{ csrf_field() }}
            <textarea class="panel-body form-control create-post-area" name="post_text"
                      value="" placeholder="write something cool . . . ">
            </textarea>
            <div class="panel-footer">
              <input type="submit" class="btn btn-default col-md-offset-11" value="Post">
            </div>
          </form>
      </div>
    </div>
    @foreach($collection as $key => $value)

    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default nbr">
        <div class="panel-body">
          <a href="/user/{{ $value->user->id }}" class="bold">{{ $value->user->name  }}</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a onclick="e.preventDefault()" title="{{ date('F d, Y', strtotime($value->created_at)) }} &middot; {{ date('H:m A', strtotime($value->created_at)) }}">{{ $value->created_at->diffForHumans() }}</a>
          <hr>
          <p>
            {{ $value->text }}
          </p>
          <p class="pst">
            <input type="hidden" class="p_token" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" class="p_userid" name="_userid" value="{{ auth()->user()->id }}" />
            <input type="hidden" class="p_postid" name="_postid" value="{{ $value->id }}" />
            <a class="post_like">Like</a> &middot;
            <a class="a" href="/user/{{ $value->user->id }}/post/{{ $value->id }}">Comment</a>
          </p>
        </div>
        <div class="panel-footer">
          <i class="fa fa-thumbs-up" aria-hidden="true"></i> {{ $value->id }} like(s) &nbsp;&middot;&nbsp;
          <i class="fa fa-comment" aria-hidden="true"></i> {{ $value->id }} comment(s)
        </div>
      </div>
    </div>
    @endforeach

    <div class="col-md-8 col-md-offset-2">
      {{ $collection }}
    </div>

  </div>
</div>
@endsection
