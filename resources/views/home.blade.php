@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 alert alert-success">
      <strong>Success!</strong> Your post was submitted successfully.
    </div>

    <div class="col-md-8 col-md-offset-2 alert alert-danger">
      You need to type in some text before you submit.
    </div>
  </div>
  <div class="row">


    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default create-post">

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

    @for($i=0; $i<2; ++$i)
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          User Name
        </div>
        <div class="panel-body">
          @for($j = 0; $j < 10; ++$j)
            lorem ipsum lipsum
          @endfor
        </div>
        <div class="panel-footer">
          <a class="a">Like</a> &middot;
          <a class="a">Comment</a>
          <i class="fa fa-flag col-md-offset-10 a" title="click to report this post" aria-hidden="true"></i>
        </div>
        <div class="panel-footer">
          <i class="fa fa-thumbs-up" aria-hidden="true"></i> {{ $i+4 }} like(s) &nbsp;&middot;&nbsp;
          <i class="fa fa-comment" aria-hidden="true"></i> {{$i+8}} comment(s)

        </div>
      </div>
    </div>
    @endfor
  </div>
</div>
@endsection
