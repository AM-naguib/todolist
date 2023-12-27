<?php
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    session_start();
    require_once "../inc/conn.php";
    $id = $_GET['id'];
    $status = $_GET['status'];
    $user_id = $_SESSION['user']["id"];
    if($status == 0){
        $sql = "UPDATE todos set status = 1 where id = $id AND user_id = $user_id";

    }else{
        $sql = "UPDATE todos set status = 0 where id = '$id' AND user_id = '$user_id'";
    }
    $result = mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn)){
        header("location:../todos.php");
    }else{
        $_SESSION['erorrs'] = ["something went wrong"];
        header("location:../todos.php");
    }
}