<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	crossorigin="anonymous">
<title>Insert title here</title>
</head>
<body>

	<?php include __DIR__ . '/header.php';?>
	
	<?php
	
if (isset($success) && $success) {
    $success = '<p class="alert alert-success"> You are logged in !</p>';
}

if (isset($error) && $error) {
    $error = '<p class="alert alert-danger"> You are NOT logged in !</p>';
}

?>
	
	<?php
echo $success ?? '';
echo $error ?? '';
?>
	<form class="jumbotron" method="POST">
		<h1>Log In :</h1>
		<div class="form-group">
			<label for="nickname">Username : </label> <input type="text"
				class="form-control" id="nickname" name="nickname"
				aria-describedby="emailHelp" placeholder="Enter username">
		</div>

		<div class="form-group">
			<label for="exampleInputPassword1">Password : </label> <input
				type="password" class="form-control" id="password3" name="password"
				placeholder="Password">
		</div>

		<button type="button" class="btn btn-danger">
			<a href="/public/index.php"
				style="color: white; text-decoration: none;">Back</a>
		</button>
		<button type="submit" class="btn btn-primary">LogIn</button>
	</form>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
		crossorigin="anonymous"></script>
	<script
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
		crossorigin="anonymous"></script>
</body>
</html>