<?php
require_once('../inc/header.php');
require_once('../inc/conn.php');
require_once('admin_functions.php');

check_admin();

$sql = "SELECT count(todos.id) as tasks_count,users.id,users.username  FROM users left join todos on users.id = todos.user_id group by users.id";
$result = mysqli_query($conn, $sql);

?>
<div class="push-edit"
    style="height:calc(100vh - 56px) ; position: absolute; left: 0; right: 0; bottom: 0; width: 100%;background: #08080875;display:none;justify-content: center;align-items: center;z-index: 1;">
    <div class="edit-windo" style="height:500px; width:700px; position:relative;">
        <div class="row">
            <div class="col-12 mx-auto">
                <i style="position: absolute; right: 10px; top: 10px;cursor:pointer;" class="fa-solid fa-x"></i>
                <form action="./admin_control.php" method="POST"
                    class="form-group  p-5 bg-light rounded shadow mb-5 border">
                    <label for="newpass" class="form-label">Edit Password</label>
                    <input type="password" class="form-control" id="newpass" name="new_pass">
                    <input type="text" style="display:none" class="form-control" id="user_id" name="id">
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <h1 class='text-center my-5'>ADMIN PANEL</h1>
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

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>user_id</td>
                        <td>username</td>
                        <td>count tasks</td>
                        <td>remove user</td>
                        <td>changePassword</td>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>
                                <?php echo $row['id'] ?>
                            </td>
                            <td>
                                <a href="user_profile.php?user_id=<?php echo $row['id'] ?>">
                                    <?php echo $row['username'] ?>
                                </a>

                            </td>
                            <td>
                                <?php echo $row['tasks_count'] ?>
                            </td>
                            <td><a href="admin_control.php?remove_id=<?php echo $row['id'] ?>">Remove User</a></td>
                            <td>
                                <p style="cursor:pointer;" id="editBtn" data-id="<?php echo $row["id"] ?>"><i
                                        style="color: blue; padding:5px; background-color:black;carsor:pointer;"
                                        class="fa-solid fa-pen-to-square"></i></p>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    let pushWindow = document.querySelector(".push-edit");
    let editBtn = document.querySelectorAll('#editBtn');
    let exitBtn = document.querySelector('.fa-x')
    let inputId = document.querySelector('#user_id')
    editBtn.forEach(button => {
        button.addEventListener("click", () => {
            pushWindow.style.display = "flex";
            inputId.value = button.dataset.id;
            window.scroll({
                top: 0,
                left: 0,
                behavior: "smooth",
            });
        });
    });
    exitBtn.addEventListener("click", function () {
        pushWindow.style.display = "none";
    })
</script>