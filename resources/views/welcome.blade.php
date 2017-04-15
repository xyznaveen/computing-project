<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>PSN :: Homepage</title>
	<link rel="stylesheet" type="text/css" href="{{{ asset('css/app.css') }}}" />
	<link rel="stylesheet" type="text/css" href="{{{ asset('css/base.css') }}}" />
</head>
<body class="main-container">
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <ul class="nav navbar-nav">
	      <li><a href="#">learn</a></li>
	    </ul>
	  </div>
	</nav>

	<div class="container-fluid jumbotron text-center n-logo">
		<h1 class="n-heading">PSN</h1>
		<p>the real fun starts here.</p>
	</div>

	<div class="n-space"></div>

	<div class="container-fluid n-login">
		<form method="POST" action="/authenticate">
		  <div class="input-group">
		    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		    <input id="email" type="text" class="form-control" name="email" placeholder="Email">
		  </div>
		  <div class="input-group">
		    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
		  </div>
		  <div class="n-actions">
		  	<input type="submit" class="btn btn-default" value="Login"><a href="#" class="btn btn-default btn-link">Register Now ?</a>
		  </div>
		</form>
	</div>
	
	<div class="n-space"></div>

	<footer>
		<div class="container-fluid n-container">
			<p>Copyright &copy; 2017</p>
		</div>
	</footer>

</body>
</html>
