<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>PSN :: Homepage</title>
	@include('required/css')
</head>
<body>

	<div class="n-center">
		<h1>Project Social Network</h1>
	</div>

	<div class="n-box n-form-container">
		<form action="/authenticate" method="POST">
			<span class="n-inline-element"><legend>Login</legend>
			<input type="text" name="un" required="required" placeholder="Username" />
			<input type="password" name="pw" required="required" placeholder="Password" />
			<input type="submit" value="Login" /></span>
			<span class="n-inline-element">
				<a href="/register">Register here.</a>
				&nbsp;&nbsp;&nbsp;OR&nbsp;&nbsp;&nbsp; login with
				<a href="">Facebook</a>
			</span>
		</form>
	</div>

</body>
</html>
