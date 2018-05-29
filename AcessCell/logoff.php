<?php require 'includes/connect.php';

session_start();
//sets array to none data array
$_SESSION = array();

//deletes cookies
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();
?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <title>Login</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- Ionicons -->
        <link href="bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet">
        <!-- Theme style -->
        <link href="dist/css/AdminLTE.min.css" rel="stylesheet">
        <!-- AdminLTE Skins -->
        <link href="dist/css/skins/skin-blue.min.css" rel="stylesheet">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
        <!-- Main Css -->
        <link href="dist/css/main.css" rel="stylesheet">
        <!-- iCheck -->
        <link rel="stylesheet" href="dist/css/blue.css">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-box-body">
                <p>Session terminada!
                    <br>
                    <br><a href="index.php"> VOLVER?</a></p>
            </div>
        </div>

        <!-- jQuery 3 -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- FastClick -->
        <script src="bower_components/fastclick/lib/fastclick.js"></script>
        <!-- iCheck -->
        <script src="bower_components/iCheck/icheck.min.js"></script>
    </body>

    </html>
