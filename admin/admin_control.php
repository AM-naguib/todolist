<?php
require_once('admin_functions.php');
check_admin();

if (isset($_GET["remove_id"])) {
    if(remove_user($_GET["remove_id"])){
        $_SESSION["success"] = "user removed";
    }else{
        $_SESSION["erorr"] = "can not found";
    }
    header("location:admin_panel.php");
}
echo $_POST["id"];
echo $_POST["new_pass"];



if(isset($_POST["id"]) &&isset($_POST['new_pass'])){
    if(change_password($_POST["id"],$_POST['new_pass'])){
        $_SESSION["success"] = "password changed thank you bank masr";
    }else{
        $_SESSION["erorr"] = "can not found";
        
    }
    header("location:admin_panel.php");
}


if(isset($_GET["task_remove"])){
    $user_id = $_GET['user_id'];
    if(remove_todo($_GET["task_remove"])){
        $_SESSION["success"] = "task removed";
    }else{
        $_SESSION["erorr"] = "can not found";

    }
    header("location:user_profile.php?user_id=$user_id");

}
