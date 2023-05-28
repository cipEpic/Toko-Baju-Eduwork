<?php
    include_once("database/connect.php");

    // Retrieve form data
    $name = $_POST['name'];
    $image = $_POST['Image'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $category = $_POST['id_category'];
    // Insert data into the 'products' table
    $insertProductQuery = "INSERT INTO products (name, Image, price, status, id_category) VALUES ('$name', '$image', '$price', '$status', '$category')";
    mysqli_query($conn, $insertProductQuery);

    // Get the newly inserted product ID
    $productID = mysqli_insert_id($conn);

    // Insert data into the 'product_size' table
    if (isset($_POST['sizes'])) {
        $sizes = $_POST['sizes'];
        foreach ($sizes as $size) {
            $insertProductSizeQuery = "INSERT INTO product_size (id_product, size_id) VALUES ('$productID', '$size')";
            mysqli_query($conn, $insertProductSizeQuery);
        }
    }


    // Redirect back to the tambah-jquery.php page after successful insertion
    header("location:manajemen.php");
?>
