<?php
include_once '../connect.php';

if (isset($_GET['priceproduct'])){
    $almacenid = $_GET['priceproduct'];
    $result = mysqli_query($conn, "SELECT costodecompra FROM almacen INNER JOIN producto ON(almacen.idproducto = producto.idproducto) WHERE idalmacen ='$almacenid'");
    if ($result->num_rows > 0)
    while($row = $result->fetch_assoc()) {
        echo $row['costodecompra'];
    }
    else {
        echo "0";
    }
}
?>
