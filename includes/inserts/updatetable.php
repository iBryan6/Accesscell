<?php
include_once '../connect.php';

//EDITAR PROVEEDOR
if (isset($_GET['editarproveedor'])){
    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $representante = mysqli_real_escape_string($conn, $_POST['representanteinput']);
    $tipodeproducto = mysqli_real_escape_string($conn, $_POST['tipodeproductoinput']);
    $ubicacion = mysqli_real_escape_string($conn, $_POST['ubicacioninput']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefonoinput']);

    mysqli_query($conn, "UPDATE proveedor SET representante = '$representante', tipodeproducto = '$tipodeproducto', ubicacion = '$ubicacion', telefono = '$telefono' WHERE idproveedor = $idinput");
    header("Location: ../../admin-dashboard-proveedor.php");
}

//EDITAR MARCA
if (isset($_GET['editarmarca'])){
    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $marca = mysqli_real_escape_string($conn, $_POST['marcainput']);

    mysqli_query($conn, "UPDATE marca SET nombre_marca = '$marca' WHERE idmarca = $idinput");
    header("Location: ../../admin-dashboard-marcas.php");
}

//EDITAR CATEGORIA
if (isset($_GET['editarcategoria'])){
    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $categoria = mysqli_real_escape_string($conn, $_POST['categoriainput']);

    mysqli_query($conn, "UPDATE categoria SET nombre_categoria = '$categoria' WHERE idcategoria = $idinput");
    header("Location: ../../admin-dashboard-categoria.php");
}

//EDITAR PRODUCTO
if (isset($_GET['editarproducto'])){
    //var_dump($_POST);
    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $marca = mysqli_real_escape_string($conn, $_POST['updatemarca']);
    $categoria = mysqli_real_escape_string($conn, $_POST['updatecat']);
    $modelo = mysqli_real_escape_string($conn, $_POST['updatemodelo']);
    $costodecompra = mysqli_real_escape_string($conn, $_POST['updatecosto']);
    $preciomayor = mysqli_real_escape_string($conn, $_POST['updateventamayor']);
    $preciodetalle = mysqli_real_escape_string($conn, $_POST['updatepreciodet']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['updatedescripcion']);
    $proveedor = mysqli_real_escape_string($conn, $_POST['updateproveedor']);
    $sucursal = mysqli_real_escape_string($conn, $_POST['updatesucursal']);


    if (empty($costodecompra)) {
        $costodecompra=0;
    }
    if (empty($preciomayor)) {
        $preciomayor=0;
    }
    if (empty($preciodetalle)) {
        $preciodetalle=0;
    }

    mysqli_query($conn, "UPDATE producto SET marca = '$marca', categoria = '$categoria', modelo = '$modelo', costodecompra = $costodecompra, preciomayor = $preciomayor, preciodetalle = $preciodetalle, descripcion = '$descripcion', proveedor = '$proveedor',sucursal = '$sucursal' WHERE idproducto = $idinput");
    header("Location: ../../admin-dashboard-productos.php");
}

//EDITAR INVENTARIO
if (isset($_GET['editarinventario'])){
    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $stock = mysqli_real_escape_string($conn, $_POST['stockedit']);
    $productosd = mysqli_real_escape_string($conn, $_POST['idprod']);

    mysqli_query($conn, "UPDATE almacen SET stock = $stock, idproducto = $productosd WHERE idalmacen = $idinput");

}
?>
