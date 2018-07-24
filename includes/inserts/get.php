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
if (isset($_GET['preciomayor'])){
    $almacenid = $_GET['preciomayor'];
    $result = mysqli_query($conn, "SELECT preciomayor FROM almacen INNER JOIN producto ON(almacen.idproducto = producto.idproducto) WHERE idalmacen ='$almacenid'");
    if ($result->num_rows > 0)
    while($row = $result->fetch_assoc()) {
        echo $row['preciomayor'];
    }
    else {
        echo "0";
    }
}
if (isset($_GET['preciomenor'])){
    $almacenid = $_GET['preciomenor'];
    $result = mysqli_query($conn, "SELECT preciodetalle FROM almacen INNER JOIN producto ON(almacen.idproducto = producto.idproducto) WHERE idalmacen ='$almacenid'");
    if ($result->num_rows > 0)
    while($row = $result->fetch_assoc()) {
        echo $row['preciodetalle'];
    }
    else {
        echo "0";
    }
}
?>
