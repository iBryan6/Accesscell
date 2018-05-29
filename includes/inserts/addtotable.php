<?php
include_once '../connect.php';

//ADD PROVEEDOR
if (isset($_GET['agregarproveedor'])){
    $representante = mysqli_real_escape_string($conn, $_POST['representante']);
    $tipodeproducto = mysqli_real_escape_string($conn, $_POST['tipodeproducto']);
    $ubicacion = mysqli_real_escape_string($conn, $_POST['ubicacion']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    mysqli_query($conn, "INSERT INTO proveedor(representante, tipodeproducto, ubicacion, telefono) VALUES ('$representante', '$tipodeproducto', '$ubicacion', '$telefono');");
    header("Location: ../../admin-dashboard-proveedor.php");
}

//ADD CATEGORIA
if (isset($_GET['agregarcategoria'])){
    $nombre = mysqli_real_escape_string($conn, $_POST['nombrecategoria']);
    mysqli_query($conn, "INSERT INTO categoria(nombre_categoria) VALUES ('$nombre');");
    header("Location: ../../admin-dashboard-categoria.php");
}

//ADD MARCA
if (isset($_GET['agregarmarca'])){
    $nombre = mysqli_real_escape_string($conn, $_POST['nombremarca']);
    mysqli_query($conn, "INSERT INTO marca(nombre_marca) VALUES ('$nombre');");
    header("Location: ../../admin-dashboard-marcas.php");
}

//ADD PRODUCTO
if (isset($_GET['agregarproducto'])){
    $proveedor = mysqli_real_escape_string($conn, $_POST['selectproveedor']);
    $marca = mysqli_real_escape_string($conn, $_POST['selectmarca']);
    $categoria = mysqli_real_escape_string($conn, $_POST['selectcategoria']);
    $modelo = mysqli_real_escape_string($conn, $_POST['modeloinput']);
    $costodecompra = mysqli_real_escape_string($conn, $_POST['costounitarioinput']);
    $preciomayor = mysqli_real_escape_string($conn, $_POST['preciovminput']);
    $preciodetalle = mysqli_real_escape_string($conn, $_POST['preciovdinput']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcioninput']);
    $sucursal = mysqli_real_escape_string($conn, $_POST['selectsucursal']);

    if (empty($costodecompra)) {
        $costodecompra=0;
    }
    if (empty($preciomayor)) {
        $preciomayor=0;
    }
    if (empty($preciodetalle)) {
        $preciodetalle=0;
    }
    mysqli_query($conn, "INSERT INTO producto(marca, categoria, modelo, costodecompra, preciomayor, preciodetalle, descripcion, proveedor,sucursal) VALUES ('$marca','$categoria','$modelo', $costodecompra, $preciomayor,$preciodetalle,'$descripcion','$proveedor', '$sucursal');");
    header("Location: ../../admin-dashboard-productos.php");
}

//ADD INVENTARIO
if (isset($_GET['agregarinventario'])){
    $producto = mysqli_real_escape_string($conn, $_POST['selectproducto']);
    $stock = mysqli_real_escape_string($conn, $_POST['stockinput']);

    if (empty($stock)) {
        $stock=0;
    }

    mysqli_query($conn, "INSERT INTO almacen(idproducto, stock) VALUES ('$producto','$stock');");
    header("Location: ../../admin-dashboard-inventario.php");

}

//ADD INVENTARIO
if (isset($_GET['agregarinventario'])){
    $producto = mysqli_real_escape_string($conn, $_POST['selectproducto']);
    $stock = mysqli_real_escape_string($conn, $_POST['stockinput']);

    if (empty($stock)) {
        $stock=0;
    }

    mysqli_query($conn, "INSERT INTO almacen(idproducto, stock) VALUES ('$producto','$stock');");
    header("Location: ../../admin-dashboard-inventario.php");

}
?>
