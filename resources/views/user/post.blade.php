@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-2">
  <div class="panel panel-default nbr">
    <div class="panel-body">
      <a href="/user/{{ $post->user->id }}" class="bold">{{ $post->user->name  }}</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a onclick="e.preventDefault()" title="{{ date('F d, Y', strtotime($post->created_at)) }} &middot; {{ date('H:m A', strtotime($post->created_at)) }}">{{ $post->created_at->diffForHumans() }}</a>
      <hr>
      <p>
        {{ $post->text }}
      </p>
      <p class="pst">
        <input type="hidden" class="p_token" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" class="p_userid" name="_userid" value="{{ auth()->user()->id }}" />
        <input type="hidden" class="p_postid" name="_postid" value="{{ $post->id }}" />
        <a class="post_like">Like</a> &middot;
        <a class="a" href="/user/{{ $post->user->id }}/post/{{ $post->id }}">Comment</a>
      </p>
    </div>
    <div class="panel-footer">
      <p>
        <i class="fa fa-thumbs-up" aria-hidden="true"></i> {{ $post->id }} like(s) &nbsp;&middot;&nbsp;
        <i class="fa fa-comment" aria-hidden="true"></i> {{ $post->id }} comment(s)
      </p>
      <div class="post-comment">
        <textarea name="name" class="form-control nbr" rows="1" cols="10" placeholder="Type your comment here.">
        </textarea>
      </div>
      <div class="comment-display">
        <div class="panel panel-default">
          <div class="panel-body nbr">
            adadjkjashdkj
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  document.title = "{{ $post->user->name }} | {{ $post->text }}";
</script>

@endsection
