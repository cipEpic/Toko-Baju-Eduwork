<?php
    $id_product = $_GET['id_product'];
    $name = $_POST['name'];
    $Image = $_POST['Image'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $id_category = $_POST['id_category'];


    print_r($_POST);
    include_once("database/connect.php");


    $result = mysqli_query($conn, "UPDATE `products` SET name = '$name', Image = '$Image', price = '$price', status = '$status', id_category = '$id_category' WHERE id_product = '$id_product';");

    header("manajemen.php");
    ?>