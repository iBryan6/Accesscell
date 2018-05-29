<?php require 'includes/connect.php';
session_start();
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
            <?php
                error_reporting(0);

                $usuario = $conn->escape_string($_POST['user']);
                $result = $conn->query("SELECT * FROM empleado WHERE username ='$usuario'");

                if ( $result->num_rows == 0 ){ // User doesn't exist
                $_SESSION['message'] = "<b>Usuario</b> con este nombre<b> no existe!</b>";
                    echo $_SESSION['message'];
                    echo "<br><br><b><a href=login-page.php> VOLVER</a></b>";

                }

                else { // User exists
                $user = $result->fetch_assoc();

                    if ($_POST['password'] == $user['password']) {

                        $_SESSION['idempleado'] = $user['idempleado'];
                        $_SESSION['tipo usuario'] = $user['tipo_empleado'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['nombres'] = $user['nombres'];
                        $_SESSION['apellidos'] = $user['apellidos'];
                        $_SESSION['sucursal'] = $user['sucursalid'];
                        $_SESSION['fecha registro'] = $user['fecha_registro'];

                        // This is how we'll know the user is logged in
                        $_SESSION['logged_in'] = true;

                        header("location: admin-sucursales.php");
                        $_SESSION['message'] = "Ingreso correctamente";
                    }
                    else {
                        $_SESSION['message'] = "Ingresaste la <b>contraseña incorrecta</b>";
                        echo $_SESSION['message'];
                        echo "<br><br><b><a href=login-page.php> VOLVER</a></b>";
                    }
                }
            ?>
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
