<?php
include "database/connect.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="styles/global.css">
  <link rel="icon" type="image/x-icon" href="public/favicon.ico">
  <style>
    .carousel-control-next,
    .carousel-control-prev {
      width: 5%;
    }

    .carousel-control-next-icon,
    .carousel-control-prev-icon {
      width: 30px;
      height: 30px;
      background-size: 100% 100%;
      background-color: #333;
      border-radius: 50%;
    }

    .carousel-control-next-icon {
      transform: rotate(180deg);
    }

    .carousel-control-prev-icon::before,
    .carousel-control-next-icon::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-repeat: no-repeat;
    }

    /* Custom CSS for status colors */
    .status-available {
      background-color: green;
      color: white;
      padding: 4px 8px;
      border-radius: 4px;
    }

    .status-restock {
      background-color: red;
      color: white;
      padding: 4px 8px;
      border-radius: 4px;
    }
  </style>
</head>
<body>
  <div class="pt-lg-5">
    <h2 class="text-center w3-xxxlarge pb-3">Products That We Have</h2>
    <div class="text-center">
      <form action="" method="POST" class="d-flex justify-content-center align-items-center">
        <div class="form-group mr-2 pt-3">
          <input type="text" name="search" class="form-control" placeholder="Search product">
        </div>
        <button type="submit" class="btn btn-primary mr-2">Search</button>
        <?php
        if (!empty($_POST['search'])) {
          echo "<a href='index.php' class='btn btn-secondary'>Show All</a>";
        }
        ?>
      </form>
    </div>
    <div id="productCarousel" class="carousel slide pt-4" data-ride="carousel">
      <div class="carousel-inner">
        <?php
        $search = isset($_POST['search']) ? $_POST['search'] : '';

        if (!empty($search)) {
          $sql = "SELECT products.*, categories.name AS category_name, GROUP_CONCAT(size.name SEPARATOR ', ') AS size_names
                  FROM products
                  INNER JOIN categories ON products.id_category = categories.id_category
                  LEFT JOIN product_size ON products.id_product = product_size.id_product
                  LEFT JOIN size ON product_size.size_id = size.size_id
                  WHERE products.name LIKE '%$search%'
                  GROUP BY products.id_product";
        } else {
          $sql = "SELECT products.*, categories.name AS category_name, GROUP_CONCAT(size.name SEPARATOR ', ') AS size_names
                  FROM products
                  INNER JOIN categories ON products.id_category = categories.id_category
                  LEFT JOIN product_size ON products.id_product = product_size.id_product
                  LEFT JOIN size ON product_size.size_id = size.size_id
                  GROUP BY products.id_product";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $count = 0;
          while ($row = $result->fetch_assoc()) {
            $id = $row['id_product'];
            $name = $row['name'];
            $image = $row['Image'];
            $price = $row['price'];
            $status = $row['status'];
            $category = $row['category_name'];
            $sizes = $row['size_names'];

            $activeClass = ($count == 0) ? 'active' : '';

            if ($count % 3 == 0) {
              echo "<div class='carousel-item $activeClass'>";
              echo "<div class='row justify-content-center'>";
            }

            echo "<div class='col-sm-4'>";
            echo "<div class='product-card'>";
            echo "<h3>$name</h3>";
            echo "<img src='$image' alt='$name' class='product-image' />";
            echo "<p>Price: $price</p>";
            echo "<p>Status: <span class='status " . ($status == 'available' ? 'status-available' : 'status-restock') . "'>$status</span></p>";
            echo "<p>Category: $category</p>";
            echo "<p>Sizes: $sizes</p>";
            echo "<a href='#' class='btn btn-primary'>Pesan</a>";
            echo "</div>";
            echo "</div>";

            if (($count + 1) % 3 == 0) {
              echo "</div>";
              echo "</div>";
            }

            $count++;
          }

          if (($count + 1) % 3 != 0) {
            echo "</div>";
            echo "</div>";
          }
        } else {
          echo "No products found.";
        }
        ?>
      </div>
    </div>

    <div class="text-center mt-4">
      <nav aria-label="Product Carousel Pagination">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#productCarousel" role="button" data-slide="prev" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#productCarousel" role="button" data-slide="next" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#productCarousel').carousel({
        interval: false
      });
    });
  </script>
</body>
</html>
