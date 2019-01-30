<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Pets</title>
    <link rel="stylesheet" href="style.php" media="screen">
  </head>

  <body>

    <style>
    </style>

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

      // Main header
      echo '<h1>ADD NEW PET RECORD</h1>';

    ?>

    <!-- The form -->
    <form action ="insert.php" method ="POST">
      <input type="text" name="pet_name" placeholder="Pet's Name" id="petname" /><br>
      <input type="text" name="hospital_name" placeholder="Hospital" id="hospitalname" /><br>
      <input type="text" name="hospital_location" placeholder="Hospital Location" id="hospitallocation" /><br>
      <input type="text" name="owner_name" placeholder="Owner's Name" id="ownername" /><br>
      <input type="text" name="malady" placeholder="Malady" id="malady" /><br>
      <button type ="submit">Submit</button>
    </form>
    <br>

    <?php

      // // Displaying all Animal records in a table
      // $sql = "SELECT * FROM Animals";

      $sql = "SELECT Animals.name AS animal_name, Hospitals.name AS hospital_name, Hospitals.location AS hospital_location, Owners.name AS owner_name, Maladies.name AS malady_name FROM Animals LEFT JOIN Hospitals ON Animals.hospital_id = Hospitals.id LEFT JOIN Owners ON Animals.owner_id = Owners.id LEFT JOIN Maladies ON Animals.malady_id = Maladies.id GROUP BY Animals.id";

      echo "<table border='1'>
      <tr>
      <th>Pet Name</th>
      <th>Hospital Name</th>
      <th>Hospital Location</th>
      <th>Owner Name</th>
      <th>Malady</th>
      </tr>
      ";

      if ($result = $link->query($sql)) {

        printf("There are currently %d pets in the database: ", $result->num_rows);


        while($row = $result->fetch_assoc()) {

          echo "<tr>";
          echo "<td>" . $row["animal_name"] . "</td>";
          echo "<td>" . $row["hospital_name"] . "</td>";
          echo "<td>" . $row["hospital_location"] . "</td>";
          echo "<td>" . $row["owner_name"] . "</td>";
          echo "<td>" . $row["malady_name"] . "</td>";

        }

        echo "</table>";

      } else {
          echo "0 results";
      }

      $connection->close();

    ?>

  </body>
</html>
