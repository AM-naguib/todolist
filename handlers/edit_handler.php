<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    session_start();
    require_once "../core/functions.php";
    require_once "../inc/conn.php";
    $erorrs = [];
    $id = $_POST['id'];
    $user_id = $_SESSION['user']["id"];
    $new_task = sanitizer($_POST['new_task']);
    $date =date('Y-m-d' . ' H:i:a');
    if(require_input($new_task)){
        $erorrs[] = "task can't be empty";
    }elseif(min_length($new_task, 3)){
        $erorrs[] = "task must be at least 3 characters";
    }elseif(max_length($new_task, 100)){
        $erorrs[] = "task must be less than 100 characters";
    }
    if(empty($erorrs)){
        $sql = "UPDATE todos SET todo = '$new_task', updated_at =  '$date' WHERE id = '$id' AND user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn) > 0){
            $_SESSION["success"][] = "task updated successfully";
            header("location:../todos.php");
        }else{
            $_SESSION["erorrs"] = ["something went wrong"];
        }
    }else{
        $_SESSION["erorrs"] = $erorrs;
    }
    header("location:../todos.php");

}