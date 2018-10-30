<?php
// $config = include __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../model/user.php';
?>

<header>

	<ul class="nav  nav-fill justify-content-center">
		<?php if (getCurrentUser() != null) {?>
			
		<li class="nav-item">Hello <?php echo getCurrentUser()['nickname'];?></li>
		<li class="nav-item">
			<a class="nav-link" href="/index.php"
    			<?php if ($_SERVER['REQUEST_URI'] == '/index.php') {?>
    			style="text-decoration: underline" <?php }?>>Home
			</a>
		</li>
		<li class="nav-item"><a class="nav-link " href="/createProject.php"
			<?php if ($_SERVER['REQUEST_URI'] == '/createProject.php') {?>
			style="text-decoration: underline" <?php }?>>Create Projects</a></li>
		<li class="nav-item"><a class="nav-link" href="/logout.php">Logout</a></li>
		<?php } else {?>
		<li class="nav-item"><a class="nav-link" href="/index.php"
			<?php if ($_SERVER['REQUEST_URI'] == '/index.php') {?>
			style="text-decoration: underline" <?php }?>>Home</a></li>

		<li class="nav-item"><a class="nav-link " href="/register.php"
			<?php if ($_SERVER['REQUEST_URI'] == '/register.php') {?>
			style="text-decoration: underline" <?php }?>>Register</a></li>

		<li class="nav-item"><a class="nav-link" href="/login.php"
			<?php if ($_SERVER['REQUEST_URI'] == '/login.php') {?>
			style="text-decoration: underline" <?php }?>>Log In</a></li>
	</ul>    
		<?php }?>
		

	</header>