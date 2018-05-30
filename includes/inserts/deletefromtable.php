<?php
include_once '../connect.php';

//DELETE PROVEEDOR
if (isset($_GET['borrarproveedor'])){
    $borrar_id = $_GET['borrarproveedor'];
    mysqli_query($conn, "DELETE FROM proveedor WHERE idproveedor = $borrar_id");
}

//DELETE CATEGORIA
if (isset($_GET['borrarcategoria'])){
    $borrar_id = $_GET['borrarcategoria'];
    mysqli_query($conn, "DELETE FROM categoria WHERE idcategoria = $borrar_id");
}

//DELETE MARCA
if (isset($_GET['borrarmarca'])){
    $borrar_id = $_GET['borrarmarca'];
    mysqli_query($conn, "DELETE FROM marca WHERE idmarca = $borrar_id");
}

//DELETE PRODUCTO
if (isset($_GET['borrarproducto'])){
    $borrar_id = $_GET['borrarproducto'];
    mysqli_query($conn, "DELETE FROM producto WHERE idproducto = $borrar_id");
}

//DELETE INVENTARIO
if (isset($_GET['borrarinventario'])){
    $borrar_id = $_GET['borrarinventario'];
    mysqli_query($conn, "DELETE FROM almacen WHERE idalmacen = $borrar_id");
}
//DELETE VENTA
if (isset($_GET['borrarcompra'])){
    $borrar_id = $_GET['borrarcompra'];
    mysqli_query($conn, "DELETE FROM transaccion WHERE idTransaccion = $borrar_id");
}
?>
