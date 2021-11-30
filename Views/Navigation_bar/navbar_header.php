<?php 

    require_once($_SERVER['DOCUMENT_ROOT'].'\Proyecto-Rfid/back/Controllers/LoginController.php');
    $session = LoginController::validation();
    if ($session == 1) {
        LoginController::log_out();
    }

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Dashboard v.4</title>

    <link href="Resources/CSS/bootstrap.min.css" rel="stylesheet">
    <link href="Resources/CSS/animate.css" rel="stylesheet">
    <link href="Resources/CSS/style.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="Resources/CSS/plugins/toastr/toastr.min.css" rel="stylesheet">

</head>

<body class="top-navigation" <?php if (isset($message)) {   ?> onload="toastmessage()" <?php    } ?>>

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">
                <nav class="navbar navbar-expand-lg navbar-static-top navbar-dark bg-dark" role="navigation">

                    <a href="Home" class="navbar-brand">Cistem</a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-reorder"></i>
                    </button>

                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="<?php    if ($locate === 0) {    echo 'active h6';  }   ?>">
                                <a aria-expanded="false" href="Devices" class="">Dispositivos</a>
                            </li>
                            <li class="<?php    if ($locate === 1) {    echo 'active h6';  }   ?>">
                                <a aria-expanded="false" href="Tokens" class="">Tokens</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <a href="../back/Controllers/Log-out.php">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="wrapper wrapper-content">
                <div class="container">
                    <div class="row ">
                        