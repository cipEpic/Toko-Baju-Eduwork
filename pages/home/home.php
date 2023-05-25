<!-- Connect to the database -->
<?php
include "database/connect.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Home Page</title>
  <link rel="stylesheet" href="styles/global.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .product-card {
      text-align: center;
      margin-bottom: 20px;
    }

    .product-image {
      width: 200px;
      height: 200px;
      object-fit: cover;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>

  <!-- Your page content -->
  <div class="container pt-lg-4">
    <h2 class="text-center w3-xxxlarge">Products That We Have</h2>

    <div id="productCarousel" class="carousel slide pt-4" data-ride="carousel">
      <div class="carousel-inner">
        <?php
        // Fetch all products from the database
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $count = 0;
          while ($row = $result->fetch_assoc()) {
            $id = $row['id_product'];
            $name = $row['name'];
            $image = $row['Image'];
            $price = $row['price'];
            $status = $row['status'];

            // Add 'active' class to the first slide
            $activeClass = ($count == 0) ? 'active' : '';

            // Display the product information in each slide
            if ($count % 3 == 0) {
              echo "<div class='carousel-item $activeClass'>";
              echo "<div class='row'>";
            }

            echo "<div class='col-sm-4'>";
            echo "<div class='product-card'>";
            echo "<h3>$name</h3>";
            echo "<img src='$image' alt='$name' class='product-image' />";
            echo "<p>Price: $price</p>";
            echo "<p>Status: $status</p>";
            echo "<a href='#' class='btn btn-primary'>Pesan</a>"; // Tambahkan tombol Pesan
            echo "</div>";
            echo "</div>";

            if (($count + 1) % 3 == 0) {
              echo "</div>";
              echo "</div>";
            }

            $count++;
          }

          // Close the last slide and carousel-inner div
          if (($count + 1) % 3 != 0) {
            echo "</div>";
            echo "</div>";
          }
        } else {
          echo "No products found.";
        }
        ?>
      </div>
      <div class="">
        <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
          <span class="circle-icon"></span>
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
          <span class="circle-icon"></span>
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <style>
        .circle-icon {
          position: absolute;
          width: 40px;
          height: 40px;
          background-color: black;
          border-radius: 50%;
          z-index: -1;
        }
      </style>

    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      // Initialize the carousel
      $('#productCarousel').carousel();
    });
  </script>
</body>

</html>
