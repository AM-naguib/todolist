<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../inc/conn.php";
    require_once "../core/functions.php";
    $erorrs = [];
    foreach ($_POST as $key => $value) {
        $$key = sanitizer($value);
    }
    // start validation
    // name validation
    if (require_input($name)) {
        $erorrs[] = "name is required";
    } elseif (min_length($name, 3)) {
        $erorrs[] = "name is too short";
    } elseif (max_length($name, 20)) {
        $erorrs[] = "name is too long";
    }
    // username validation
    if (require_input($username)) {
        $erorrs[] = "username is required";
    } elseif (min_length($username, 3)) {
        $erorrs[] = "username is too short";
    } elseif (max_length($username, 30)) {
        $erorrs[] = "username is too long";
    }
    // password validation
    if (require_input($password)) {
        $erorrs[] = "password is required";
    } elseif (min_length($password, 3)) {
        $erorrs[] = "password is too short";
    } elseif (max_length($password, 30)) {
        $erorrs[] = "password is too long";
    }
    // end validation
    if (empty($erorrs)) {
        $sql = "INSERT INTO users (`username`, `password`, `name`) VALUES ('$username', '$password', '$name')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION["success"] = ["reg is done"];
            header("location:../login.php");
            die;
        } else {
            $_SESSION["erorrs"] = ["reg is not done"];

        }
    } else {
        $_SESSION["erorrs"] = $erorrs;
    }
    header("location:../signup.php");


}