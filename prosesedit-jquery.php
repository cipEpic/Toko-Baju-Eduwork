<?php
    $id_product = $_GET['id_product'];
    $name = $_POST['name'];
    $Image = $_POST['Image'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $id_category = $_POST['id_category'];

    include_once("database/connect.php");

    // Update product details
    $updateProductQuery = "UPDATE products SET name = '$name', Image = '$Image', price = '$price', status = '$status', id_category = '$id_category' WHERE id_product = '$id_product'";
    mysqli_query($conn, $updateProductQuery);

    // Fetch existing size entries for the product
    $fetchProductSizeQuery = "SELECT * FROM product_size WHERE id_product = '$id_product'";
    $existingSizes = array();
    $result = mysqli_query($conn, $fetchProductSizeQuery);
    while ($row = mysqli_fetch_assoc($result)) {
        $existingSizes[] = $row['size_id'];
    }

    // Retrieve selected sizes from the form data
    if (isset($_POST['sizes'])) {
        $selectedSizes = $_POST['sizes'];

        // Insert new size entries
        foreach ($selectedSizes as $size) {
            // Check if the size is already existing
            if (!in_array($size, $existingSizes)) {
                $insertProductSizeQuery = "INSERT INTO product_size (id_product, size_id) VALUES ('$id_product', '$size')";
                mysqli_query($conn, $insertProductSizeQuery);
            }
        }

        // Delete removed size entries
        foreach ($existingSizes as $size) {
            // Check if the size is not selected anymore
            if (!in_array($size, $selectedSizes)) {
                $deleteProductSizeQuery = "DELETE FROM product_size WHERE id_product = '$id_product' AND size_id = '$size'";
                mysqli_query($conn, $deleteProductSizeQuery);
            }
        }
    }

    header("location: manajemen.php");
?>
