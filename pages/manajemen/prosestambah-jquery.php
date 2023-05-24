<?php

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    include_once("connect.php");

    $result = mysqli_query($conn, "INSERT INTO `customer`(`first_name`, `last_name`, `email`, `phone`, `address`) VALUES ('$first_name','$last_name','$email','$phone','$address');");

    header("Location:customer-jquery.php");
?>