<!DOCTYPE html>
<html>
<head>
	<title>Superdating - love is power</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Superdating - love is power</h1>
<h2>You are signed in as WONDER WOMAN.</h2>
<h3>Go to your profile page to edit your information.</h3>
<?php

// ensure that php errors are displayed
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


	// Include and initiate the database class (you only have to do this once)
	include('classes/database.php');
	$database = new Database;
	$database->connect();



	// Get all the names
	$superheroes = $database->query('SELECT * FROM superheroes');

	//$likes = $database->query('SELECT * FROM count_likes');
	$comments = $database->query('SELECT * FROM comments');

	// Loop through all names
	foreach ($superheroes as $superhero) {
		?>
		<article class="name">
			<img src="<?php echo $superhero['image'];?>">
			<input type="submit" name="like me" value="Like me">
			<h2><?php echo $superhero['name'];?></h2>
			<h4>Age: <?php echo $superhero['age'];?></h4>
    	<h4>Gender: <?php echo $superhero['gender'];?></h4>
      <h4>Current location: <?php echo $superhero['location'];?></h4>
      <h4>Superpower: <?php echo $superhero['superpower'];?></h4>
    	<h4>Description: <?php echo $superhero['description'];?></h4>
				<a href="profile.php?superhero_id=<?php echo $superhero['id'];?>">Read more or make a comment</a>
		</article>
		<?php
	}
?>
</body>
</html>
