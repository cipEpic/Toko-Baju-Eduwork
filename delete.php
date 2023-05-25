<?php

include_once("database/connect.php");


    $id_product = $_GET['id_product'];


    $result = mysqli_query($conn, "DELETE FROM products WHERE id_product='$id_product'");

    header("manajemen.php");
?>