<!-- connect ke database -->
<?php
    include "database\connect.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
</head>
<body>

  <!-- Your page content -->

  <?php

  // Fetch all products from the database
  $sql = "SELECT * FROM products";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Loop through each product and display its information
    while ($row = $result->fetch_assoc()) {
      $id = $row['id_product'];
      $name = $row['name'];
      $image = $row['Image'];
      $price = $row['price'];
      $status = $row['status'];

      // Display the product information
      echo "<div>";
      echo "<h3>$name</h3>";
      echo "<img src='$image' alt='$name' />";
      echo "<p>Price: $price</p>";
      echo "<p>Status: $status</p>";
      echo "</div>";
    }
  } else {
    echo "No products found.";
  }

  // Close the database connection
//   $conn->close();
  ?>

</body>
</html>
