
	<header>

		<ul class="nav  nav-fill justify-content-center">
			<li class="nav-item"><a class="nav-link" href="/index.php"
				<?php if ($_SERVER['REQUEST_URI'] == '/index.php') {?>
				style="text-decoration: underline" <?php }?>>Home</a></li>
			<li class="nav-item"><a class="nav-link " href="/register.php" <?php if ($_SERVER['REQUEST_URI'] == '/register.php') {?>
				style="text-decoration: underline" <?php }?>>Register</a></li>
			<li class="nav-item"><a class="nav-link" href="/login.php" <?php if ($_SERVER['REQUEST_URI'] == '/login.php') {?> style="text-decoration: underline" <?php }?>>Log In</a></li>
		</ul>

	</header>