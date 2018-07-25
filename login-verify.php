<?php session_start();
require 'includes/connect.php';
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
            <?php $usuario = $conn->escape_string($_POST['user']);
                $result = $conn->query("SELECT * FROM empleado INNER JOIN sucursal ON(sucursal.idsucursal = empleado.sucursalid) WHERE username ='$usuario'");

                if ( $result->num_rows == 0 ){ // User doesn't exist
                $_SESSION['message'] = "<b>Usuario</b> con este nombre<b> no existe!</b>";
                    echo $_SESSION['message'];
                    echo "<br><br><b><a href=/> VOLVER</a></b>";
                }

                else { // User exists
                $user = $result->fetch_assoc();
                    $estadocuenta = $user['estado'];
                    if($estadocuenta == 0){
                        echo "TU CUENTA FUE DESHABILITADA! <br>PORFAVOR CONTACTATE CON TU ADMINISTRADOR.<br><br><b><a href=/> VOLVER</a></b>";
                    }
                    else{
                        if ($_POST['password'] == $user['password']) {
                        //VARIABLES DE SESSION
                        $_SESSION['idempleado'] = $user['idempleado'];
                        $_SESSION['tipo usuario'] = $user['tipo_empleado'];
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['nombres'] = $user['nombres'];
                        $_SESSION['apellidos'] = $user['apellidos'];
                        $_SESSION['telefonousuario'] = $user['telefono'];
                        $_SESSION['carnetusuario'] = $user['carnet'];
                        $_SESSION['sucursal'] = $user['sucursalid'];
                        $_SESSION['fecha registro'] = $user['fecha_registro'];
                        $_SESSION['sucursalname'] = $user['razon_social'];
                        // This is how we'll know the user is logged in
                        $_SESSION['logged_in'] = true;
                        $_SESSION['message'] = "Ingreso correctamente";
                        echo $_SESSION['username'];
                        if($_SESSION['tipo usuario']=='Admin'||$_SESSION['tipo usuario']=='Super Admin'){
                            echo "<br><br><b><a href=admin-dashboard> ¡LOGIN EXITOSO, INGRESAR!</a></b>";
                        }
                        else{
                            echo "Tesy";
                        }

                    }
                    else {
                        $_SESSION['message'] = "Ingresaste la <b>contraseña incorrecta</b>";
                        echo $_SESSION['message'];
                        echo "<br><br><b><a href=/> VOLVER</a></b>";
                    }
                    }
                }
            ?>
        </div>
    </div>
</body>

</html>
