@extends('layouts.app')

@section('content')
	@include('admin.partials.nav')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default mar1">
			<div class="panel-heading">
				<center><h1>Users</h1></center>
			</div>
			<div class="panel-body">
				@foreach($users as $user)
					<div class="d-block">
						<br />
						<div class="fimg"></div> <strong>{{ $user->name }}</strong> {{ $user->email }} &nbsp;&nbsp;&nbsp;<a href="/on_{{ rand() }}/ref_{{ rand(893,1233) }}/ia{{ rand(2,987) }}/rem/referer/{{ csrf_token() }}/0000{{$user->id}}" class="btn btn-default btn-xs">remove user</a> | <a href="/user/{{ $user->id }}" class="btn btn-link btn-xs">visit profile</a href="/user/{{ $user->id }}">
					</div>
				@endforeach
			</div>	
		</div>
	</div>
@endsection