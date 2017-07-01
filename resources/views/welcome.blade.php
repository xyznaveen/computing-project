<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8" />
	<title>Project Social Network</title>
	<link rel="icon" href="{{ asset('/images/logo.png') }}" type="image/png" sizes="16x16">

	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/base.css') }}">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
	<div class="psn-nav">
		<nav class="navbar nbr navbar-default">
		  <div class="container">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">PSN</a>
		    </div>
		    
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="/register"><i class="fa fa-user-plus"></i> Sign Up</a></li>
		      <li><a href="/login"><i class="fa fa-sign-in"></i> Login</a></li>
		    </ul>
		  </div>
		</nav>
	</div>	

	<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="branding-image">
						<img src="{{ asset('images/logo.png') }}" />
					</div>
					<h1>because the fun is here.</h1>
				</div>
				<div class="col-md-12">
					<p>You need a break from your busy schedule. And it is just getting better.</p>
				</div>
				<div class="col-md-12">
					<p>
						<a href="/login" class="btn btn-danger btn-xs">Login now </a> to get started or
						<a href="/register" class="btn btn-default btn-xs">Register </a> if you don't already have an account.
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="footer">
		<div class="container">
			<div class="row no-gutter-col">
				<div class="col-md-12 no-gutter-col">
					<ul>
						<li><a href="#">About</a> &middot; </li>
						<li><a href="#">Help</a> &middot; </li>
						<li><a href="#">FAQ</a></li>
					</ul>
				</div>
				<div class="col-md-12 no-gutter-col">
					Designed and Developed by: <a href="http://www.facebook.com/xyznavn" target="_blank">Naveen Niraula</a>
					<p><h3>Copyright &copy; {{date('Y')}}</h3></p>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
