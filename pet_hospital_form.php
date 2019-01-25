<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <style>
    </style>


    <?php

    $user = 'root';
    $password = 'root';
    $db = 'pet_hospital';
    $host = 'localhost';
    $port = 8889;

    $link  = mysqli_init();
    $success =  mysqli_real_connect(
      $link,
      $host,
      $user,
      $password,
      $db,
      $port
    );


    // retrieving pet
    $sql = "SELECT * FROM Animals";


    if ($result = $link->query($sql)) {
      printf("Select returned %d rows.\n", $result->num_rows);
      echo '<pre>';
      print_r($result->fetch_all(MYSQLI_ASSOC));
      echo '</pre>';
      $result->close();
    }


      echo '<h1>PET DATABASE MANIPULATION FORM</h1>';

      // inserting data into DATABASE


      $hospital_name = "Hospital: ".htmlspecialchars($_POST['hospital_name']);
      $pet_name = "Pet Name: ".htmlspecialchars($_POST['pet_name']);
      $owner_name = "Owner Name: ".htmlspecialchars($_POST['owner_name']);
      $malady = "Reason for Visit: ".htmlspecialchars($_POST['maladies']);

      // function assemblePage(){
      //   $html =
      //     '<h3>'.$GLOBALS[$sql].'</h3>';
      //
      //   return $html;
      // }
      //echo assemblePage();

    ?>

    <form action ="" method ="POST">
      <input type="text" name="hospital_name" placeholder="Hospital" /><br>
      <input type="text" name="pet_name" placeholder="Pet Name"/><br>
      <input type="text" name="owner_name" placeholder="Owner Name"/><br>
      <input type="text" name="malady" placeholder="Malady" /><br>
      <button type ="submit">Submit</button>
    </form>

<!-- note to self: make separate page for GET -->



  </body>
</html>
