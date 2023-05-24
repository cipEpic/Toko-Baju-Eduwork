<?php
    $id = $_GET['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    print_r($_POST);
    include_once("connect.php");

    $result = mysqli_query($conn, "UPDATE `customer` SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', address = '$address' WHERE id = '$id';");

    header("Location:customer-jquery.php");
?>