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

	<?php include __DIR__ . '/../view/header.php';?>
	
	<?php
$nicknameError = '';
if (! empty($errors['nickname'])) {
    $nicknameError = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['nickname'] as $errorText) {
        $nicknameError .= '<li>' . $errorText . '</li>';
    }
    $nicknameError .= '</ul>';
}

$password1Error = '';
if (! empty($errors['password1'])) {
    $password1Error = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['password1'] as $errorText) {
        $password1Error .= '<li>' . $errorText . '</li>';
    }
    $password1Error .= '</ul>';
}

$password2Error = '';
if (! empty($errors['password2'])) {
    $password2Error = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['password2'] as $errorText) {
        $password2Error .= '<li>' . $errorText . '</li>';
    }
    $password2Error .= '</ul>';
}

$rest = substr("abcdef", -2);    // retourne "f"
var_dump($rest);

// Null coalition
// if the left operand exist => use it and if the right operand exist use the right
$nickname = $_POST['nickname'] ?? '';
// if the left operand exist => use it and if the right operand exist use the right
// Null coalition

?>
	<?php
if (isset($success) && $success) {
    echo $success = '<p class="alert alert-success">Hello '. $nickname . '. Your account was successfully created</p>';
} else {
    echo $success = '';
}

?>
	<form class="jumbotron" method="POST">
		<h1>Regitser :</h1>
		<div class="form-group">
			<label for="nickname">Username : </label> <input type="text"
				class="form-control" id="nickname" name="nickname"
				aria-describedby="emailHelp" placeholder="Enter username"
				value="<?php echo $nickname ?>">
				<?php echo $nicknameError ?>
		</div>

		<div class="form-group">
			<label for="exampleInputPassword1">Password : </label> <input
				type="password" class="form-control" id="password1" name="password1"
				placeholder="Password">
				<?php echo $password1Error ?>
		</div>

		<div class="form-group">
			<label for="exampleInputPassword2">Retype your password :</label> <input
				type="password" class="form-control" id="password2" name="password2"
				placeholder="Password">
				<?php echo $password2Error ?>
		</div>
		
		<button type="submit" class="btn btn-danger">
			<a href="/index.php" style="color: white; text-decoration: none;">Back</a>
		</button>
		<button type="submit" class="btn btn-primary">Submit</button>
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