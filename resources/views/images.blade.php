@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
	<div class="row">
		<div class="col-md-12">
			<center><h1>User's Images</h1></center>
		</div>
		
		<div class="col-md-12">
			@foreach($images as $image)
			<div class="uploaded-image home-post">
				<img src="/{{ $image->image_url }}">
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection