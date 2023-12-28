<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../core/functions.php";
    require_once "../inc/conn.php";
    $erorrs = [];
    $task = sanitizer($_POST['new_task']);
    $date = date('Y-m-d' . ' H:i:a');
    $user_id = $_SESSION['user']["id"];
    if(require_input($task)){
        $erorrs[] = "Task is required";
    }elseif(min_length($task, 3)){
        $erorrs[] = "Task should be at least 3 characters";
    }elseif(max_length($task, 255)){
        $erorrs[] = "Task should be less than 255 characters";
    }

    if(empty($erorrs)){
        $sql = "INSERT INTO todos (todo, user_id, status, careated_at) VALUES ('$task','$user_id','0','$date')";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            $_SESSION["erorrs"] = ["task not add erorr in add"];
            header("location:../addtodo.php");
            die;
        }
        $_SESSION["success"] = ["done add task ya broo"];
    }else{
        $_SESSION["erorrs"] = $erorrs;
    }
    header("location:../addtodo.php");

}