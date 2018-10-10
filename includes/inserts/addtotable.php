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

    $validate = mysqli_query($conn,"SELECT nombre_categoria, tipo FROM categoria WHERE nombre_categoria = '$nombre' AND tipo ='$tipo'");
    if($validate->num_rows == 0) {
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

        /*if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            mysqli_query($conn, "INSERT INTO almacen(idproducto, stock) VALUES ('$last_id','0');");
        }*/
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

//ADD PERSONAL
if (isset($_GET['agregarempleado'])){

        $date = mysqli_real_escape_string($conn, $_POST['timedate']);
        $username = mysqli_real_escape_string($conn, $_POST['username-input']);
        $password = mysqli_real_escape_string($conn, $_POST['password-input']);
        $sucursal = mysqli_real_escape_string($conn, $_POST['sucurscal-select']);

        $validate = mysqli_query($conn, "SELECT * FROM empleado WHERE username='$username'");
        if($validate->num_rows == 0)
        {
            mysqli_query($conn, "INSERT INTO empleado(tipo_empleado, username, password, sucursalid, fecha_registro, estado) VALUES ('Empleado','$username','$password',$sucursal,'$date',1);");
            header("Location: ../../admin-empleados.php");
        }
        else{
           header("Location: ../../admin-empleados.php");
        }
    }
?>
