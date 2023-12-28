<!doctype html>
<html lang="en">

<?php session_start(); ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex align-items-center" id="navbarSupportedContent">
                
                <?php if (isset($_SESSION['user'])): ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="addtodo.php">add todos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="todos.php">all todos</a>
                        </li>
                        <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="http://127.0.0.1/my%20projects/todolist/admin/admin_panel.php">ADMIN
                                    PANEL</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <div class="user_info d-flex align-items-center gap-5 justify-content-center">
                        <p class="m-0">Hi,
                            <?php echo $_SESSION['user']['name'] ?>
                        </p>
                        <p class="m-0"><a href="handlers/logout.php" class="btn btn-primary">Logout</a></p>
                    </div>
                <?php else: ?>
                    <div class="login-reg gap-2">
                        <a class="btn btn-primary" href="login.php">Login</a>
                        <a class="btn btn-primary" href="signup.php">Sign up</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>