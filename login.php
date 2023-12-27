<?php

require_once('inc/header.php');
if(isset($_SESSION['user'])){
    header("location:todos.php");
    die;
}
?>
<div class="container">
    <div class="row">
        <div class="col-4 mx-auto">
            <h1 class="text-center mt-5 display-1 border-bottom border-3 pb-4">Login</h1>

        </div>
    </div>
    <div class="row">
        <div class="col-5 mx-auto mt-5 border border-3 p-5 rounded shadow bg-light">
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
            <form action="./handlers/login_handler.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3 text-center">
                    <button class="btn btn-primary">Login</button>
                    <a href=""></a>
                </div>
                <div class="my-3 text-center" >
                    <a class="text-decoration-none" href="signup.php">or signup</a>
                </div>
            </form>
        </div>
    </div>

</div>

<?php
require_once('inc/footer.php');
?>