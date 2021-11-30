<?php
    require('back/Controllers/LoginController.php');
    if (isset($_POST['user']) && isset($_POST['password'])) {
        $message = LoginController::login($_POST['user'],$_POST['password']);
    }
    $session = LoginController::validation();
    
    if ($session == 0) {
        LoginController::redirect();
    }

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Proyecto Rfid</title>

    <link href="Views/Resources/CSS/bootstrap.min.css" rel="stylesheet">
    <link href="Views/Resources/CSS/font-awesome.css" rel="stylesheet">

    <link href="Views/Resources/CSS/animate.css" rel="stylesheet">
    <link href="Views/Resources/CSS/style.css" rel="stylesheet">

</head>

<body class="bg-secondary d-flex align-items-center justify-content-center" <?php if (isset($message)) {   ?> onload="toastmessage()" <?php    } ?>>

    <div class="middle-box text-center loginscreen animated fadeInDown mh-100 gray-bg rounded shadow-lg p-3">
        <div class="mt-5">
            <div>
                <img src="Views/Resources/IMG/Logo.png" alt="Logo">
            </div>
            <h3>Proyecto Rfid</h3>
            <p>Iniciar sesion</p>
            <form class="m-t" role="form" action="index.php" method="POST">
                <div class="form-group">
                    <input id="user" name="user" type="text" class="form-control" placeholder="Username" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-success block full-width m-b">Login</button>
            </form>
        </div>
    </div>

    <!-- Mensaje -->
    <?php if (isset($message)) { ?>
    <div class="alert alert-dismissible animated d-none shadow-sm <?php    echo $message['class'];    ?>" role="alert" aria-live="assertive" aria-atomic="true" id="loadToast" style="position: absolute; top: 20px; right: 20px;">
        <div class="alert-heading">
            <?php   echo $message['icon']   ?>
            <strong class="mr-auto m-l-sm"><?php    echo $message['title'];    ?></strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" onclick="closeToast()">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <hr>
        <div class="">
            <?php   echo $message['description']   ?>
        </div>

    </div>
    <?php    }   ?>

    <!-- Mainly scripts -->
    <script src="Views/Resources/JS/jquery-3.1.1.min.js"></script>
    <script src="Views/Resources/JS/popper.min.js"></script>
    <script src="Views/Resources/JS/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6aa6c40f89.js" crossorigin="anonymous"></script>
    <script src="Views/Resources/JS/toast-message.js"></script>

</body>

</html>