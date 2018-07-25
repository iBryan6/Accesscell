<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "accesscell";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Error al conectar a la Base de Datos, revisar Servidor");
/*
//SERVER HOSTGATOR
$dbServername = "localhost";
$dbUsername = "accessce_user";
$dbPassword = "6dbac6";
$dbName = "accessce_db";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("Error al conectar a la Base de Datos, revisar Servidor");*/

?>
