<?php
include_once '../connect.php';

//ADD PROVEEDOR
if (isset($_GET['agregarproveedor'])){
    $representante = mysqli_real_escape_string($conn, $_POST['representante']);
    $ubicacion = mysqli_real_escape_string($conn, $_POST['ubicacion']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    if (empty($ubicacion)) {
        $ubicacion="-";
    }
    if (empty($telefono)) {
        $telefono="-";
    }
    mysqli_query($conn, "INSERT INTO proveedor(representante, ubicacion, telefono) VALUES ('$representante', '$ubicacion', '$telefono');");
    header("Location: ../../admin-dashboard-proveedor.php");

}

//ADD CATEGORIA
if (isset($_GET['agregarcategoria'])){
    $nombre = mysqli_real_escape_string($conn, $_POST['nombrecategoria']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);

    $result = mysqli_query($conn,"SELECT nombre_categoria, tipo FROM categoria WHERE nombre_categoria = '$nombre' AND tipo ='$tipo'");
    if($result->num_rows == 0) {
        mysqli_query($conn, "INSERT INTO categoria(nombre_categoria, tipo) VALUES ('$nombre', '$tipo');");
        header("Location: ../../admin-dashboard-categoria.php");
    }else{
        header("Location: ../../admin-dashboard-categoria.php");
    }


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

    $validate = mysqli_query($conn, "SELECT * FROM producto WHERE marca='$marca' AND categoriaid='$categoria' AND modelo ='$modelo' AND proveedor ='$proveedor' AND sucursal='$sucursal'");
    if($validate->num_rows == 0)
    {
      mysqli_query($conn, "INSERT INTO producto(marca, modelo, costodecompra, preciomayor, preciodetalle, descripcion, proveedor,sucursal, categoriaid) VALUES ('$marca','$modelo', $costodecompra, $preciomayor,$preciodetalle,'$descripcion','$proveedor', '$sucursal', $categoria);");
        header("Location: ../../admin-dashboard-productos.php");
    }
    else{
        header("Location: ../../admin-dashboard-productos.php");
    }
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

//ADD COMPRA EFECTIVO
if (isset($_GET['agregarcompra'])){
    $tipotransaccion = 1;
    $tipopago = 1;
    $fecha = mysqli_real_escape_string($conn, $_POST['timedate']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['cantidadinput']);
    $precio = mysqli_real_escape_string($conn, $_POST['costoinput']);
    $detalle = mysqli_real_escape_string($conn, $_POST['detalleinput']);
    $factura = mysqli_real_escape_string($conn, $_POST['facturainput']);
    $deuda = 0;
    $empleado = mysqli_real_escape_string($conn, $_POST['userid']);
    $almacen = mysqli_real_escape_string($conn, $_POST['inventarioselect']);

    $costototal= $cantidad*$precio;
    if (empty($detalle)) {
        $detalle="-";
    }
    if (empty($factura)) {
        $factura=0;
    }

    $validate = mysqli_query($conn, "SELECT * FROM transaccion WHERE factura='$factura' AND idTipotransaccion='$tipotransaccion' AND idTipopago='$tipopago' AND idalmacen='$almacen' AND cantidad='$cantidad' AND precio='$costototal'");
    $result = mysqli_query($conn, "SELECT stock FROM almacen WHERE almacen.idalmacen =$almacen");
    if($validate->num_rows == 0)
    {
        mysqli_query($conn, "INSERT INTO transaccion(idTipotransaccion, idTipopago, fecha, precio, cantidad, detalle, factura, deuda, idempleado,idalmacen) VALUES ($tipotransaccion,$tipopago,'$fecha', $costototal, $cantidad,'$detalle',$factura, $deuda,$empleado, $almacen);");

        while ($row = $result->fetch_assoc()) {
            $stock= $row['stock'];
        }
        $cantidadnueva = $stock+$cantidad;
        mysqli_query($conn, "UPDATE almacen SET stock=$cantidadnueva WHERE almacen.idalmacen = $almacen");
        header("Location: ../../admin-dashboard-compras.php");
    }
    else{
       header("Location: ../../admin-dashboard-compras.php");
    }
}

//ADD VENTAS EFECTIVO
if (isset($_GET['agregarventa'])){
    $tipotransaccion = 2;
    $tipopago = 1;
    $fecha = mysqli_real_escape_string($conn, $_POST['timedate']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['cantidadinput']);
    $precio = mysqli_real_escape_string($conn, $_POST['costoinput']);
    $detalle = mysqli_real_escape_string($conn, $_POST['detalleinput']);
    $factura = mysqli_real_escape_string($conn, $_POST['facturainput']);
    $deuda = 0;
    $empleado = mysqli_real_escape_string($conn, $_POST['userid']);
    $almacen = mysqli_real_escape_string($conn, $_POST['inventarioselect']);

    $costototal= $cantidad*$precio;
    if (empty($detalle)) {
        $detalle="-";
    }
    if (empty($factura)) {
        $factura=0;
    }

    $validate = mysqli_query($conn, "SELECT * FROM transaccion WHERE factura='$factura' AND idTipotransaccion='$tipotransaccion' AND idTipopago='$tipopago' AND idalmacen='$almacen' AND cantidad='$cantidad' AND precio='$costototal'");
    $result = mysqli_query($conn, "SELECT stock FROM almacen WHERE almacen.idalmacen =$almacen");
    if($validate->num_rows == 0)
    {
        mysqli_query($conn, "INSERT INTO transaccion(idTipotransaccion, idTipopago, fecha, precio, cantidad, detalle, factura, deuda, idempleado,idalmacen, pagoinicial) VALUES ($tipotransaccion, $tipopago,'$fecha', $costototal, $cantidad, '$detalle', $factura, $deuda, $empleado, $almacen, $costototal);");

        while ($row = $result->fetch_assoc()) {
            $stock= $row['stock'];
        }
        $cantidadnueva = $stock-$cantidad;
        mysqli_query($conn, "UPDATE almacen SET stock=$cantidadnueva WHERE almacen.idalmacen = $almacen");

        header("Location: ../../admin-dashboard-ventas.php");
        }
    else{
        header("Location: ../../admin-dashboard-ventas.php");
    }
}

//ADD VENTAS CREDITO
if (isset($_GET['agregarventacredito'])){
    $tipotransaccion = 2;
    $tipopago = 2;
    $fecha = mysqli_real_escape_string($conn, $_POST['timedatecredit']);
    $cantidad = mysqli_real_escape_string($conn, $_POST['cantidadinputcredit']);
    $costo = mysqli_real_escape_string($conn, $_POST['costoinputcredit']);
    $detalle = mysqli_real_escape_string($conn, $_POST['detalleinputcredit']);
    $factura = mysqli_real_escape_string($conn, $_POST['facturainputcredit']);
    $empleado = mysqli_real_escape_string($conn, $_POST['useridcredit']);
    $almacen = mysqli_real_escape_string($conn, $_POST['inventarioselectcredit']);
    $pagoinicial = mysqli_real_escape_string($conn, $_POST['pagoinicialcredit']);

    $costototal = $costo*$cantidad;
    $deuda = $costototal-$pagoinicial;
    if($deuda==$costototal){
        $deuda=0;
    }
    if (empty($detalle)) {
        $detalle="-";
    }
    if (empty($factura)) {
        $factura=0;
    }

    $validate = mysqli_query($conn, "SELECT * FROM transaccion WHERE factura='$factura' AND idTipotransaccion='$tipotransaccion' AND idTipopago='$tipopago' AND idalmacen='$almacen' AND cantidad='$cantidad' AND precio='$costototal'");
    $result = mysqli_query($conn, "SELECT stock FROM almacen WHERE almacen.idalmacen =$almacen");
    if($validate->num_rows == 0)
    {
        mysqli_query($conn, "INSERT INTO transaccion(idTipotransaccion, idTipopago, fecha, precio, cantidad, detalle, factura, deuda, pagoinicial,idempleado,idalmacen) VALUES ($tipotransaccion, $tipopago,'$fecha', $costototal, $cantidad, '$detalle', $factura, $deuda, $pagoinicial, $empleado, $almacen);");

        while ($row = $result->fetch_assoc()) {
            $stock= $row['stock'];
        }
        $cantidadnueva = $stock-$cantidad;
        mysqli_query($conn, "UPDATE almacen SET stock=$cantidadnueva WHERE almacen.idalmacen = $almacen");

        header("Location: ../../admin-dashboard-ventas.php");
    }
    else{
        header("Location: ../../admin-dashboard-ventas.php");
    }
}
    //ADD SUCURSAL
    if (isset($_GET['agregarsucursal'])){

        $razonsocial = mysqli_real_escape_string($conn, $_POST['razon-social-input']);
        $direccion = mysqli_real_escape_string($conn, $_POST['direccion-input']);
        $telefono = mysqli_real_escape_string($conn, $_POST['telefono-input']);

        if (empty($direccion)) {
            $direccion="-";
        }
        if (empty($telefono)) {
            $telefono="-";
        }

        $validate = mysqli_query($conn, "SELECT * FROM sucursal WHERE razon_social='$razonsocial'");
        if($validate->num_rows == 0)
        {
            mysqli_query($conn, "INSERT INTO sucursal(razon_social, direccion, telefono) VALUES ('$razonsocial','$direccion','$telefono');");
            header("Location: ../../admin-list-sucursales.php");
        }
        else{
           header("Location: ../../admin-list-sucursales.php");
        }
    }
?>
