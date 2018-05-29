<?php require 'includes/connect.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>
    <?php include_once('includes/head.php');?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img class="img-responsive" src="dist/img/Logo.png" alt="LOGO ACCESSCELL" width="80%">
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Pantalla de inicio de sesion</p>

            <form action="login-verify.php" method="post" autocomplete="off">
                <div class="form-group has-feedback">
                    <input type="user" class="form-control" placeholder="Usuario" name="user" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Contraseña" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4" style="float: right;">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
</body>

</html>
