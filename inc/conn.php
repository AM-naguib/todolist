<?php

$conn = mysqli_connect("localhost", "root", "");
$database_name = "mytodo";


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    $create = "CREATE DATABASE IF NOT EXISTS $database_name";
    $done = mysqli_query($conn,$create);
    if($done){
        $conn = mysqli_connect("localhost", "root", "",$database_name);
    }
}


