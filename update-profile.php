<?php
include('classes/database.php');


$database = new Database;
$database->connect();

$sql = "UPDATE superheroes SET
            name = '" . $_POST['name'] . "',
            age = '" . $_POST['age'] . "',
            gender = '" . $_POST['gender'] . "',
            superpower = '" . $_POST['superpower'] . "',
            location = '" . $_POST['location'] . "',
            description = '" . $_POST['description'] . "',
            image = '" . $_POST['image'] . "'
            WHERE id = " . $_POST['id'];

// Call prepared function to execute the above
$database->queryWithoutFetchAll($sql);

header("Location: profile.php?superhero_id=".$_POST['id']);
