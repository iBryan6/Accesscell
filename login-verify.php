<?php require 'includes/connect.php';
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <?php include_once('includes/head.php');?>
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
                    echo "<br><br><b><a href=index.php> VOLVER</a></b>";

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
                        echo "<br><br><b><a href=index.php> VOLVER</a></b>";
                    }
                }
            ?>
        </div>
    </div>
</body>

</html>
