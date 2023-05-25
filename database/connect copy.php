<?php
    include_once("connect.php");

    $hostName= "localhost";
    $userName = "root";
    $password="";
    $dbName="db_baju";
    $conn= new mysqli($hostName,$userName,$password,$dbName);



    if($conn){
        echo "";
    }else{
        echo "not connected";
    }
?>