<!-- connect ke database -->
<?php
include "database\connect.php";
?>

<!DOCTYPE html>
<html>

<head>
  <title>Home Page</title>
  <link rel="stylesheet" href="styles/global.css">
  <style>

  </style>
</head>

<body>

  <!-- Your page content -->
  <div class="slider-container">
    <div class="slider-content">
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
          echo "<div class='product-card'>";
          echo "<h3>$name</h3>";
          echo "<img src='$image' alt='$name' class='product-image' />";
          echo "<p>Price: $price</p>";
          echo "<p>Status: $status</p>";
          echo "</div>";
        }
      } else {
        echo "No products found.";
      }
      ?>
    </div>
  </div>

  <div class="slider-btn">
    <button class="prev-btn">Previous</button>
    <button class="next-btn">Next</button>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      var slideWidth = $('.product-card').outerWidth() * 3; // Calculate the width of three product cards
      var slideCount = $('.product-card').length; // Get the total number of product cards
      var sliderContentWidth = slideWidth * Math.ceil(slideCount / 3); // Calculate the total width of the slider content

      $('.slider-content').css('width', sliderContentWidth); // Set the width of the slider content

      // Function to move the slider to the next slide
      function nextSlide() {
        $('.slider-content').animate({
          'margin-left': '-=' + slideWidth
        }, 500, function() {
          // Move the first card to the end of the slider content
          $('.slider-content .product-card:first').appendTo('.slider-content');
          $('.slider-content').css('margin-left', 0); // Reset the margin-left property
        });
      }

      // Function to move the slider to the previous slide
      function prevSlide() {
        $('.slider-content').css('margin-left', '-' + slideWidth + 'px'); // Set the initial margin-left property

        // Move the last card to the beginning of the slider content
        $('.slider-content .product-card:last').prependTo('.slider-content');

        $('.slider-content').animate({
          'margin-left': 0
        }, 500);
      }

      // Bind click event to the next and previous buttons
      $('.next-btn').click(nextSlide);
      $('.prev-btn').click(prevSlide);
    });
  </script>
</body>

</html>
