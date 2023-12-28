<?php
require_once('../inc/header.php');
require_once('../inc/conn.php');
require_once('admin_functions.php');
check_admin();
if (!isset($_GET['user_id'])) {
    header("location:admin_panel.php");
}
$todos = get_user_profile($_GET['user_id']);
?>


<div class="container">
    <h1 class="text-center p-5 border-bottom">User Profile :
        <?= $_GET['user_id'] ?>
    </h1>
    <div class="row">
        <div class="col-10 mx-auto">
        <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION['erorr'])): ?>
                <div class="alert alert-danger">
                    <?php
                    echo $_SESSION['erorr'];
                    unset($_SESSION['erorr']);
                    ?>
                </div>
            <?php endif ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>todoid</th>
                        <th>todo</th>
                        <th>username</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($todos as $todo): ?>
                        <tr>
                            <td>
                                <?= $todo['todo_id'] ?>
                            </td>
                            <td>
                                <?= $todo['todo'] ?>
                            </td>
                            <td>
                                <?= $todo['username'] ?>
                            </td>
                            <td><a href="admin_control.php?task_remove=<?php echo $todo['todo_id']."&user_id=".$todo['id'] ?>">delete</a></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</div>