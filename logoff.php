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
    <title>Login</title>
    <?php include_once('includes/head.php');?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-body">
            <p>Session terminada!
                <br>
                <br><a href="index.php"> VOLVER?</a></p>
        </div>
    </div>
</body>

</html>
