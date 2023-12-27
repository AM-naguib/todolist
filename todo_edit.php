<?php
require_once('inc/header.php');
if(!isset($_SESSION['user'])){
    header("location:login.php");
    die;
}
if (!isset($_GET["content"]) && !isset($_GET["id"])) {
    header("location:todos.php");
    die;
}
require_once "./core/functions.php";
$content = $_GET["content"];
$id = $_GET["id"];
?>
<div class="container">
    <div class="col-4 mx-auto my-5">
        <h1 class="text-center">Edit Todo</h1>
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
            <form action="./handlers/edit_handler.php" method="POST"
                class="form-group  p-5 bg-light rounded shadow mb-5 border"> 
                <label for="addtask" class="form-label">Edit Task</label>
                <input type="text" class="form-control" id="addtask" name="new_task" value="<?= $content ?>">
                <input type="text" style="display: none"   class="form-control" id="addtask" name="id" 
                    value="<?= $id ?>">
                <button class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php
require_once('inc/footer.php');
?>