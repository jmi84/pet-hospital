<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Pets</title>
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
      <input type="text" name="owner_name" placeholder="Owner's Name" id="ownername" /><br>
      <input type="text" name="malady" placeholder="Malady" id="malady" /><br>
      <button type ="submit">Submit</button>
    </form>
    <br>

    <?php

      // Displaying all Animal records in a table
      $sql = "SELECT * FROM Animals";

      echo "<table border='1'>
      <tr>
      <th>ID</th>
      <th>Pet Name</th>
      <th>Hospital</th>
      <th>Owner</th>
      <th>Malady</th>
      </tr>
      ";

      if ($result = $link->query($sql)) {

        printf("There are currently %d pets in the database: ", $result->num_rows);

        while($row = $result->fetch_assoc()) {

          echo "<tr>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["hospital_id"] . "</td>";
          echo "<td>" . $row["owner_id"] . "</td>";
          echo "<td>" . $row["malady_id"] . "</td>";

        }

        echo "</table>";

      } else {
          echo "0 results";
      }

      $connection->close();

    ?>

  </body>
</html>
