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
        <i class="fa fa-thumbs-up" aria-hidden="true"></i> {{ count($post->like) }} like(s) &nbsp;&middot;&nbsp;
        <i class="fa fa-comment" aria-hidden="true"></i> {{ count($post->comment) }} comment(s)
      </p>
      <div class="post-comment">
        <textarea name="text" class="form-control nbr comment-text" rows="5" cols="10" placeholder="Type your comment here.">
        </textarea>
        <button type="button" name="button" class="col-md-offset-11 nbr btn btn-default mar1 post_comment">post</button>
      </div>
    </div>
  </div>

  @foreach($post->comment as $key => $value)
    <div class="comment-display pad1">
        <?php
         // fetch user's detail
         $vvv = DB::table('users')->where('id','=',$value->user_id)->get();
        ?>
        <u><a href="/user/{{$vvv[0]->id}}">{{ ($vvv[0]->name) }}</a></u> &nbsp;&nbsp;&nbsp;&nbsp; on {{ date('M d, Y', strtotime($vvv[0]->created_at)) }}
        <p>{{ ($value->text) }}</p>
    </div>
    <hr>
  @endforeach

</div>

<script type="text/javascript">
  document.title = "{{ $post->text }}";
</script>

@endsection
