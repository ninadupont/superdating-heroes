<?php
include('classes/database.php');

$database = new Database;
$database->connect();

$superhero_id = $_GET["superhero_id"];

$superhero = $database->query("SELECT * FROM superheroes WHERE id = '$superhero_id'")[0];
$comments = $database->query("SELECT * FROM comments LEFT JOIN superheroes
	ON comments.superhero_from = superheroes.id WHERE superhero_to = $superhero_id");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $superhero["name"];?> - Superdating - love is power</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1><?php echo $superhero["name"];?></h1>
<?php
if($superhero_id == 1) {
	?>
<h2>Edit profile</h2>
<form action="update-profile.php" method="post">
	<input type="hidden" name="id" value="<?php echo $superhero["id"];?>">
  <input type="text" name="name" value="<?php echo $superhero["name"];?>">
	<input type="text" name="age" value="<?php echo $superhero["age"];?>">
	<input type="text" name="gender" value="<?php echo $superhero["gender"];?>">
	<input type="text" name="superpower" value="<?php echo $superhero["superpower"];?>">
 	<input type="text" name="location" value="<?php echo $superhero["location"];?>">
	<input type="text" name="description" value="<?php echo $superhero["description"];?>">
	<input type="text" name="image" value="<?php echo $superhero["image"];?>">
	<input type="submit" name="submit" value="Submit">
</form>
<?php
} else {
	?>
		<article class="name">
			<p>
				<img src="<?php echo $superhero['image'];?>">
			</p>
			<input type="submit" name="like me" value="Like me">
			<h2><?php echo $superhero['name'];?></h2>
			<h4>Age: <?php echo $superhero['age'];?></h4>
    	<h4>Gender: <?php echo $superhero['gender'];?></h4>
      <h4>Current location: <?php echo $superhero['location'];?></h4>
      <h4>Superpower: <?php echo $superhero['superpower'];?></h4>
    	<h4>Description: <?php echo $superhero['description'];?></h4>

		</article>
	<?php
}
?>

	<a href="index.php">Back to main page</a>
<h2>Add comment</h2>

<form action="add-comment.php" method="post">
  <input type="hidden" name="superhero_from" value="1">
  <input type="hidden" name="superhero_to" value="<?php echo $superhero["id"];?>">

  <label for="text">Your comment</label>
  <input type="text" name="text" id="text" value="">

  <input type="submit" name="submit" value="Add">
</form>

<h2>Comments</h2>
<?php
foreach ($comments as $comment) {
?>
<dl>
  <dt><b><?php echo $comment["name"];?></b></dt>
  <dd><?php echo $comment["text"];?></dd>
</dl>
<?php
}
?>
</body>
</html>
