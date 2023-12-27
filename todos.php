<?php
require_once('inc/header.php');
if (!isset($_SESSION['user'])) {
    header("location:login.php");
    die;
}
require_once('inc/conn.php');
require_once "./core/functions.php";
$user_id = $_SESSION['user']["id"];
$sql = "SELECT * FROM todos where user_id = '$user_id' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
<div class="push-edit"
    style="height:calc(100vh - 56px) ; position: absolute; left: 0; right: 0; bottom: 0; width: 100%;background: #08080875;display:none;justify-content: center;align-items: center;z-index: 1;">
    <div class="edit-windo" style="height:500px; width:700px; position:relative;">
        <div class="row">
            <div class="col-12 mx-auto">
                <i style="position: absolute; right: 10px; top: 10px;cursor:pointer;" class="fa-solid fa-x"></i>
                <form action="./handlers/edit_handler.php" method="POST"
                    class="form-group  p-5 bg-light rounded shadow mb-5 border">
                    <label for="addtask" class="form-label">Edit Task</label>
                    <input type="text" class="form-control" id="addtask" name="new_task">
                    <input type="text" style="display:none" class="form-control" id="taskid" name="id">
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h1 class="text-center my-5">To Do List</h1>
    <div class="row">
        <div class="col-10 mx-auto">
            <?php if (isset($_SESSION["erorrs"])): ?>
                <?php foreach ($_SESSION["erorrs"] as $erorr): ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?php echo $erorr ?>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION["erorrs"]); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION["success"])): ?>
                <?php foreach ($_SESSION["success"] as $erorr): ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo $erorr ?>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION["success"]); ?>
            <?php endif; ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>task</th>
                        <th>completed</th>
                        <th>created at</th>
                        <th>updated_at</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>
                                <?php echo $row["id"] ?>
                            </td>
                            <td id="content">
                                <?php echo $row["todo"] ?>
                            </td>

                            <td class="<?php echo $row["status"] == 0 ? "" : "bg-success text-white"; ?>">
                                <?php
                                echo $row["status"] == 0 ? "not completed" : "completed";
                                ?>
                            </td>
                            <td>
                                <?php echo $row["created_at"] ?>
                            </td>
                            <td>
                                <?php echo $row["updated_at"] ?>
                            </td>
                            <td>
                                <a href="handlers/delete_handler.php?id=<?php echo $row["id"] ?>"><i
                                        style="color: red; padding:5px; background:rgba(255, 0, 0, 0.171);"
                                        class="fa-solid fa-trash-can"></i></a>
                                <a href="todo_edit.php?id=<?php echo $row["id"] . "&content=" . $row["todo"] ?>"><i
                                        style="color: blue; padding:5px; background-color:DodgerBlue;"
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a style="cursor:pointer;" id="editBtn" data-id="<?php echo $row["id"] ?>"><i
                                        style="color: blue; padding:5px; background-color:black;carsor:pointer;"
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <?php if ($row["status"] == 0): ?>
                                    <a href="handlers/status_update_handler.php?id=<?php echo $row["id"] . "&status=0" ?>"><i
                                            style="color: green; padding:5px; background-color:#D2E3C8;"
                                            class="fa-solid fa-check"></i></a>
                                <?php else: ?>
                                    <a href="handlers/status_update_handler.php?id=<?php echo $row["id"] . "&status=1" ?>"><i
                                            style="color: #FFF78A; padding:5px; background-color:#FFAD84;"
                                            class="fa-solid fa-x"></i></a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once('inc/footer.php');
?>