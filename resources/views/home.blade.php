@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">

    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default create-post">
        <div class="panel-heading">
          write something really cool below
        </div>
        <textarea class="panel-body form-control create-post-area" name="post" value="" placeholder="Write something."></textarea>
        <div class="panel-footer">
          <button class="btn btn-default col-md-offset-11">post</button>
        </div>
      </div>
    </div>

    @for($i=0; $i<10; ++$i)
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          User Name
        </div>
        <div class="panel-body">
          @for($j = 0; $j < 100; ++$j)
            lorem ipsum lipsum
          @endfor
        </div>
        <div class="panel-footer">
          <i class="fa fa-thumbs-up" aria-hidden="true"></i> {{ $i+4 }} likes &middot;
          <i class="fa fa-comment" aria-hidden="true"></i> {{$i+8}} Comments &middot;
          <i class="fa fa-flag col-md-offset-7"  aria-hidden="true"></i> Report
        </div>
      </div>
    </div>
    @endfor
  </div>
</div>
@endsection
