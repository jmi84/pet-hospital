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

// Set variables for formul input and escape user inputs for security
$pet_name = mysqli_real_escape_string($link, $_REQUEST['pet_name']);
$hospital_name = mysqli_real_escape_string($link, $_REQUEST['hospital_name']);
$owner_name = mysqli_real_escape_string($link, $_REQUEST['owner_name']);
$malady = mysqli_real_escape_string($link, $_REQUEST['malady']);

// Insert the names for the Hospitals, Owners, and Maladies tables
// Also, store as variables the last_insert_ids for each of these 3 tables
$sql1 = "INSERT INTO Hospitals (name) VALUES ('$hospital_name') SET ($last_hospital_id = mysqli_insert_id())";
$sql2 = "INSERT INTO Owners (name) VALUES ('$owner_name') SET ($last_owner_id = mysqli_insert_id())";
$sql3 = "INSERT INTO Maladies (name) VALUES ('$malady') SET ($last_malady_id = mysqli_insert_id())";

// Using $pet_name and the last_insert_ids from above, insert values into the Animals table
$sql4 = "INSERT INTO Animals (name, hospital_id, owner_id, malady_id) VALUES ('$pet_name')";

// Do the thing
mysql_query($sql1, $connection);
mysql_query($sql2, $connection);
mysql_query($sql3, $connection);
mysql_query($sql4, $connection);

// Echo out results
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

?>
