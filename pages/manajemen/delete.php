<?php

    include_once("connect.php");

    $id = $_GET['id'];


    $result = mysqli_query($conn, "DELETE FROM customer WHERE id='$id'");

    header("Location:customer-jquery.php");
?>