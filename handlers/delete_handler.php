<?php
if($_SERVER["REQUEST_METHOD"] == "GET") {
    session_start();
    require_once "../inc/conn.php";
    require_once "../core/functions.php";
    $id = $_GET["id"];
    $user_id = $_SESSION['user']["id"];
    $sql = "DELETE FROM `todos` WHERE `id` = $id AND `user_id` = $user_id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) == 1){
        $_SESSION['success'] = ["done delete task"];
    }else{
        $_SESSION['erorrs'] = ["task not delete erorr in delete"];
    }
    header("location:../todos.php");

}