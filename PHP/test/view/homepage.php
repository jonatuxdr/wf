<?php

// var_dump($projects->fetchAll());

// var_dump($arrayProjects);
$projects = $projects->fetchAll();

//var_dump($categories);
//var_dump($projects);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
	integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	crossorigin="anonymous">

<style>
/*table, th, td {
	border: 1px solid black;
}*/
* {
	box-sizing: border-box;
}

body {
	margin: 0;
	padding: 0;
}

.card {
	margin: 15px
}
</style>
</head>
<body>

	<!-- <table>
		<tr>
			<th>ID</th>
			<th>title</th>
			<th>Description</th>
			<th>image</th>
			<th>pubDate</th>
			<th>statusId</th>
		</tr>
    -->

	<div class="container d-flex justify-content-around ">
  <?php

foreach ($projects as $project) {
    ?>
      <!--<section class="container">
		<article class="row">
		<div class="col-sm-3">
			<div class="card" style="width: 18rem;">
				<img class="card-img-top" src="<?php //echo $project['image']?>"
					alt="Card image cap">
				<div class="card-body">
					<p class="card-text">Some quick example text to build on the card
						title and make up the bulk of the card's content.</p>
				</div>
			</div>
		</div>
		</article>
	
	</section> -->

		<div class="card  col-sm-3">
			<img src="<?php echo $project['image']?>" alt="Card image cap"
				class="img-thumbnail" alt="Responsive image">
					<?php 
					/*
					 switch ($i) {
                        case 0:
                        echo "i égal 0";
                    break;
                        case 1:
                        echo "i égal 1";
                        break;
                        case 2:
                        echo "i égal 2";
                        break;
                    }
					 * */
					switch ($project['label']){
					    case 'In progress':
					        ?>
					       <span class="badge badge-success"><?php echo $project['label']?></span>
					       <?php break;?>
					    <?php 
                        case 'Analysis':
                            ?>
                            <span class="badge badge-primary"><?php echo $project['label']?></span>
                            <?php break;?>
                        <?php 
                        case 'Blocked':
					        ?>
					       <span class="badge badge-danger"><?php echo $project['label']?></span>
					       <?php break;?>

					<?php 
					}
					?>

			<div class="card-body">
				<h5 class="card-title"><?php echo $project['title']?></h5>
				<p class="card-text"><?php echo $project['description']?></p>
			</div>
			<div class="card-footer">
			<?php 
			$categories = [];
			foreach ($project['categories'] as $category) {
			    $categories[] = $category['label'];
			}
			$categories = implode(' | ', $categories);
			?>
				<small class="text-muted"><?php echo $project['pubDate']?></small>
				 <span class="badge badge-danger"><?php echo $categories?></span>
			</div>
		</div>

   <?php
    /*
     * echo
     * "<tr><td>" .
     * $project['id'] .
     * "</td>".
     * "<td>" . $project['title'] ."</td>" .
     * "<td>" . $project['description'] ."</td>" .
     * "<td>" . $project['image'] ."</td>" .
     * "<td>" . $project['pubDate'] ."</td>" .
     * "<td>" . $project['label'] ."</td>" .
     *
     * "</td></tr>";
     */
}
// var_dump($project);

?>
		</div>

	<!-- 
</table>
 -->

	<!-- 
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title varchar(255) NOT NULL,
	description BLOB NOT NULL,
	image varchar(255) DEFAULT NULL,
	pubDate DATETIME DEFAULT NULL,
	creationDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updatedAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	statusId INTEGER UNSIGNED NOT NULL,
 -->
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
