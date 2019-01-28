<?php

// Database connection
$user = 'root';
$password = 'root';
$db = 'pet_hospital';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();
$connection =  mysqli_real_connect(
  $link,
  $host,
  $user,
  $password,
  $db,
  $port
);

// Escape user inputs for security
$pet_name = mysqli_real_escape_string($link, $_REQUEST['pet_name']);
$hospital_name = mysqli_real_escape_string($link, $_REQUEST['hospital_name']);
$owner_name = mysqli_real_escape_string($link, $_REQUEST['owner_name']);
$malady = mysqli_real_escape_string($link, $_REQUEST['malady']);

// Attempt insert query execution
$sql = "INSERT INTO Animals (name, hospital_id, owner_id, malady_id) VALUES ('$pet_name', '$hospital_name', '$owner_name', '$malady')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

?>
