<?php
include_once '../connect.php';

//VENTAS
if (isset($_GET['tablaventas'])){

    $idinput = $_GET['tablaventas'];
    $result = mysqli_query($conn, "SELECT deuda FROM transaccion WHERE idTransaccion = $idinput");
    while ($row = $result->fetch_assoc()) {
        $deuda= $row['deuda'];
    }
    echo $deuda;
}
?>
