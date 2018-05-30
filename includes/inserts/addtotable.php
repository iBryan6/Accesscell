<?php
include_once '../connect.php';

//ADD PROVEEDOR
if (isset($_GET['agregarproveedor'])){
    $representante = mysqli_real_escape_string($conn, $_POST['representante']);
    $tipodeproducto = mysqli_real_escape_string($conn, $_POST['tipodeproducto']);
    $ubicacion = mysqli_real_escape_string($conn, $_POST['ubicacion']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    if (empty($ubicacion)) {
        $ubicacion="-";
    }
    if (empty($telefono)) {
        $telefono="-";
    }
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

//ADD COMPRA
if (isset($_GET['agregarcompra'])){
    $tipotransaccion = 1;
    $tipopago = mysqli_real_escape_string($conn, $_POST['tipopagoselect']);
    $fecha = mysqli_real_escape_string($conn, $_POST['timedate']);
    $precio = mysqli_real_escape_string($conn, $_POST['costoinput']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['cantidadinput']);
    $detalle = mysqli_real_escape_string($conn, $_POST['detalleinput']);
    $deuda = mysqli_real_escape_string($conn, $_POST['deudainput']);
    $empleado = mysqli_real_escape_string($conn, $_POST['userid']);
    $almacen = mysqli_real_escape_string($conn, $_POST['inventarioselect']);

    if (empty($detalle)) {
        $detalle="-";
    }
    if (empty($deuda)) {
        $deuda=0;
    }
    mysqli_query($conn, "INSERT INTO transaccion(idTipotransaccion, idTipopago, fecha, precio, cantidad, detalle, deuda, idempleado,idalmacen) VALUES ($tipotransaccion,$tipopago,'$fecha', $precio, $cantidad,'$detalle',$deuda,$empleado, $almacen);");


    $result = mysqli_query($conn, "SELECT stock FROM almacen WHERE almacen.idalmacen =$almacen");
    while ($row = $result->fetch_assoc()) {
        $stock= $row['stock'];
    }
    $cantidadnueva = $stock+$cantidad;
    mysqli_query($conn, "UPDATE almacen SET stock=$cantidadnueva WHERE almacen.idalmacen = $almacen");

    header("Location: ../../admin-dashboard-compras.php");

}
?>
