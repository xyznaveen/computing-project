<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>PSN :: Homepage</title>
	<link rel="stylesheet" type="text/css" href="{{{ asset('css/app.css') }}}" />
	<link rel="stylesheet" type="text/css" href="{{{ asset('css/base.css') }}}" />
</head>
<body>

	<div class="n-box n-form-container">
		<form action="/authenticate" method="POST">
			<legend>Login</legend>
			<input type="text" name="un" required="required" placeholder="Username" />
			<input type="password" name="pw" required="required" placeholder="Password" />
			<input type="submit" value="Login" />
		</form>
	</div>

</body>
</html>
