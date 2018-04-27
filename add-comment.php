<?php
include('classes/database.php');


$database = new Database;
$database->connect();

$sql = "INSERT INTO comments (
            text,
            superhero_from,
            superhero_to
          )
    VALUES (?, ?, ?)";

// Secondly, add values
$values = array(
  $_POST['text'],
  $_POST['superhero_from'],
  $_POST['superhero_to'],
);

// Call prepared function to execute the above
$database->prepared($sql,$values);

header("Location: profile.php?superhero_id=$values[2]");
