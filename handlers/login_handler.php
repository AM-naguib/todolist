<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../inc/conn.php";
    require_once "../core/functions.php";
    $erorrs = [];
    $username = sanitizer($_POST['username']);
    $password = sanitizer($_POST['password']);
    if (require_input($username)) {
        $erorrs[] = "Username is required";
    }
    if (require_input($password)) {
        $erorrs[] = "Password is required";
    }
    if (empty($erorrs)) {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            $_SESSION['user'] = $user;
            header("location:../todos.php");
        } else {
            $erorrs[] = "Invalid username or password";
            $_SESSION['erorrs'] = $erorrs;
            header("location:../login.php");
        }
    } else {
        $_SESSION['erorrs'] = $erorrs;
        header("location:../login.php");
    }


}