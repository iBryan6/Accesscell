<?php
session_start();
require 'includes/connect.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>INICIO</title>
    <meta name="description" content="Inicia tu session en la pagina web de Accesscell Bolivia.">
    <meta name="keywords" content="Accesscell, Bolivia, Cochabamba, Celulares, Fundas, teléfono, telefono, celular, para celular, carcasa, carcasas para celulares, fundas para celular, donde comprar fundas para celulares">
    <meta name="author" content="Bryan Argandoña">
    <meta name="google-site-verification" content="IrwzVfBiSzlPj6XnieDPqeZZaZbV1uV_iulS8SvPvgs" />
    <?php include_once('includes/head.php');?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img class="img-responsive" src="dist/img/Logo.png" alt="Logo de accesscell en Cochabamba, Bolivia" width="80%">
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <h1 class="login-box-msg">INICIO</h1>
            <p class="login-box-msg">Ingrese con sus datos de Accesscell</p>

            <form action="login-verify" method="post">
                <div class="form-group has-feedback">
                    <input class="form-control" placeholder="Usuario" name="user" autocomplete="name" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" autocomplete="new-password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4" style="float: right;">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
