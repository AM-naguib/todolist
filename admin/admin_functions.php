<?php
require_once('../inc/conn.php');
@session_start();
check_admin();




function check_admin()
{
    if (!$_SESSION['user']['role'] == 1) {
        header("location:../todos.php");
        die;
    }
}
function remove_user($id)
{
    global $conn;
    $sql = "delete from users where id = '$id'";
    $result = mysqli_query($conn, $sql);
    $sql = "delete from todos where user_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true;
    }
    return false;

}


function change_password($id,$passowrd){
    global $conn;
    $sql = "UPDATE users SET password = '$passowrd' WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        return true;
    }
    return false;
}

function get_user_profile($id){
    global $conn;
    $data = [];
    // this join To train on joins
    $sql = "SELECT users.username,todos.id AS todo_id,todos.todo,users.id FROM users LEFT JOIN todos ON users.id = todos.user_id WHERE users.id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $data [] = $row;
        }
        return $data;
    }
    return false;
}


function remove_todo($id){
    global $conn;
    $sql = "DELETE FROM todos WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    }
    return false;
}