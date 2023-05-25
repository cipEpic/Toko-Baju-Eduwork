<?php

    $name = $_POST['name'];
    $image = $_POST['Image'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $id_category = $_POST['id_category'];

    include_once("database/connect.php");


    $result = mysqli_query($conn, "INSERT INTO `products`(`name`, `Image`, `price`, `status`, `id_category`) VALUES ('$name','$Image','$price','$status','$id_category');");

    header("manajemen.php");
?>