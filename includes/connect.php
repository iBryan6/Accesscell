<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "acesscell";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Error al conectar a la Base de Datos, revisar Servidor");

?>
