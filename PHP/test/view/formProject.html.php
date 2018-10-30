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
<?php 

$titleError = '';
if (! empty($errors['title'])) {
    $titleError = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['title'] as $errorText) {
        $titleError .= '<li>' . $errorText . '</li>';
    }
    $nicknameError .= '</ul>';
}

$descriptionError = '';
if (! empty($errors['description'])) {
    $descriptionError = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['description'] as $errorText) {
        $descriptionError .= '<li>' . $errorText . '</li>';
    }
    $descriptionError .= '</ul>';
}


$imgError = '';
if (! empty($errors['image'])) {
    $imgError = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['image'] as $errorText) {
        $imgError .= '<li>' . $errorText . '</li>';
    }
    $imgError .= '</ul>';
}

$statusError = '';
if (! empty($errors['status'])) {
    $statusError = '<ul class="alert alert-danger" role="alert">';
    foreach ($errors['status'] as $errorText) {
        $statusError .= '<li>' . $errorText . '</li>';
    }
    $statusError .= '</ul>';
}


?>
	<form class="jumbotron" method="POST">
		<h1>Enter a project :</h1>
		<div class="form-group">
			<label for="nickname">Title : </label><?php echo $errorTitle ?? ''?> <input
				type="text" class="form-control" id="title" name="title"
				aria-describedby="emailHelp" placeholder="Enter title">
				<?php echo  $titleError ?? ''?>
		</div>

		<div class="form-group">
			<label for="exampleInputPassword1">Description : </label> <input
				type="text" class="form-control" id="description" name="description">
				<?php echo $descriptionError ?? ''?>
		</div>

		<div class="form-group">
			<label for="exampleInputPassword2">Publication Date :</label> <input
				type="text" class="form-control" id="pubDate" name="pubDate">
				<?php echo  $pubDateError ?? ''?>
		</div>

		<div class="form-group">
			<label for="exampleInputPassword2">Image :</label> <input type="file"
				class="form-control" id="image" name="image">
				<?php echo  $imgError ?? ''?>
		</div>

		<div class="form-group">
			<label for="exampleFormControlSelect1">Status :</label> <select
				class="form-control" id="status" name="status">
				<option>Analysis</option>
				<option>Out of budget</option>
				<option>Blocked</option>
				<option>In progress</option>
			</select>
		</div>

		<div class="form-group">
			<label for="exampleFormControlSelect2">Catgory : </label>
			<select multiple class="form-control" id="category" name="categoryId">
				<option>Management</option>
				<option>ERP</option>
				<option>DMZ</option>
			</select>
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