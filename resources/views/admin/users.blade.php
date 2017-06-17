@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		@foreach($users as $user)
			<div class="d-block">
				<br />
				<div class="fimg"></div> <strong>{{ $user->name }}</strong> {{ $user->email }} &nbsp;&nbsp;&nbsp;<button class="btn btn-default btn-xs">remove user</button> | <a href="/user/{{ $user->id }}" class="btn btn-link btn-xs">visit profile</a href="/user/{{ $user->id }}">
			</div>
		@endforeach
	</div>
@endsection