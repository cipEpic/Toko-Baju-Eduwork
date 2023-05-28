<?php
include_once("database/connect.php");

$id_product = $_GET['id_product'];

// Delete product sizes
mysqli_query($conn, "DELETE FROM product_size WHERE id_product='$id_product'");

// Delete the product
mysqli_query($conn, "DELETE FROM products WHERE id_product='$id_product'");

header("location:manajemen.php");
?>
