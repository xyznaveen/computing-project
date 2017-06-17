@extends('layouts.app')

@section('content')
@include('admin.partials.nav')
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default nbr">
		<div class="panel-heading">
			<center><h1>System Summary</h1></center>
		</div>
		<div class="panel-body">
			<div class="d-block">
				<span>{{ DB::table('users')->count() }}</span> <strong>user(s) have signed up till date.</strong>
			</div>
			<div class="d-block">
				 <span>{{ DB::table('posts')->count() }}</span> <strong>post(s) have been created.</strong>
			</div>
			<div class="d-block">
				<span>{{ DB::table('reports')->count() }}</span> <strong>complain(s) have been filed.</strong>
			</div>
			<div class="d-block">
				<span>{{ DB::table('comments')->count() }}</span> <strong>comment(s) have been commented.</strong>
			</div>
			<div class="d-block">
				<span>{{ DB::table('likes')->count() }}</span> <strong>like button has been clicked.</strong>
			</div>
			<div class="d-block">
				<span>{{ DB::table('messages')->count() }}</span> <strong>message(s) have been exchanged.</strong>
			</div>
		</div>
	</div>
</div>
@endsection
