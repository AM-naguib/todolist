<?php
require_once('inc/header.php');
if(!isset($_SESSION['user'])){
    header("location:login.php");
    die;
}
require_once "./core/functions.php";
?>
<div class="container">
    <div class="col-4 mx-auto my-5">
        <h1 class="text-center">Add New Todo</h1>
    </div>
    <div class="row">
        <div class="col-4 mx-auto">
            <?php if (isset($_SESSION["erorrs"])): ?>
                <?php foreach ($_SESSION["erorrs"] as $erorr): ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?php echo $erorr ?>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION["erorrs"]); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION["success"])): ?>
                <?php foreach ($_SESSION["success"] as $success): ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo $success ?>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION["success"]); ?>
            <?php endif; ?>
            <form action="./handlers/add_todo_handler.php" method="POST"
                class="form-group  p-5 bg-light rounded shadow mb-5 border">
                <label for="addtask" class="form-label">Add New Task</label>
                <input type="text" class="form-control" id="addtask" name="new_task">
                <button class="btn btn-primary mt-3">Add Task</button>
            </form>
        </div>
    </div>
</div>
<?php
require_once('inc/footer.php');
?>