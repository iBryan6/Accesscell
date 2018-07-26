<?php
include_once '../connect.php';

//EDITAR PROVEEDOR
if (isset($_GET['editarproveedor'])){
    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $representante = mysqli_real_escape_string($conn, $_POST['representanteinput']);
    $ubicacion = mysqli_real_escape_string($conn, $_POST['ubicacioninput']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefonoinput']);

    mysqli_query($conn, "UPDATE proveedor SET representante = '$representante', ubicacion = '$ubicacion', telefono = '$telefono' WHERE idproveedor = $idinput");
    header("Location: ../../dashboard-proveedor.php");
}

//EDITAR MARCA
if (isset($_GET['editarmarca'])){
    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $marca = mysqli_real_escape_string($conn, $_POST['marcainput']);

    mysqli_query($conn, "UPDATE marca SET nombre_marca = '$marca' WHERE idmarca = $idinput");
    header("Location: ../../dashboard-marcas.php");
}

//EDITAR CATEGORIA
if (isset($_GET['editarcategoria'])){
    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $categoria = mysqli_real_escape_string($conn, $_POST['categoriainput']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipoinput']);

    $validate = mysqli_query($conn,"SELECT nombre_categoria, tipo FROM categoria WHERE nombre_categoria = '$categoria' AND tipo ='$tipo'");
    if($validate->num_rows == 0) {
        mysqli_query($conn, "UPDATE categoria SET nombre_categoria = '$categoria', tipo='$tipo' WHERE idcategoria = $idinput");
        header("Location: ../../dashboard-categoria.php");
    }else{
        header("Location: ../../dashboard-categoria.php");
    }

}

//EDITAR PRODUCTO
if (isset($_GET['editarproducto'])){

    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $marca = mysqli_real_escape_string($conn, $_POST['updatemarca']);
    $categoria = mysqli_real_escape_string($conn, $_POST['updatecat']);
    $modelo = mysqli_real_escape_string($conn, $_POST['updatemodelo']);
    $preciomayor = mysqli_real_escape_string($conn, $_POST['updateventamayor']);
    $preciodetalle = mysqli_real_escape_string($conn, $_POST['updatepreciodet']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['updatedescripcion']);
    $proveedor = mysqli_real_escape_string($conn, $_POST['updateproveedor']);
    $sucursal = mysqli_real_escape_string($conn, $_POST['updatesucursal']);

    if (empty($preciomayor)) {
        $preciomayor=0;
    }
    if (empty($preciodetalle)) {
        $preciodetalle=0;
    }

    mysqli_query($conn, "UPDATE producto SET marca = '$marca', categoriaid = '$categoria', modelo = '$modelo', preciomayor = $preciomayor, preciodetalle = $preciodetalle, descripcion = '$descripcion', proveedor = '$proveedor',sucursal = '$sucursal' WHERE idproducto = $idinput");
    header("Location: ../../dashboard-productos.php");
}

//EDITAR INVENTARIO
if (isset($_GET['editarinventario'])){
    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $productosd = mysqli_real_escape_string($conn, $_POST['updateidprod']);
    $stock = mysqli_real_escape_string($conn, $_POST['updatestock']);

    mysqli_query($conn, "UPDATE almacen SET stock = $stock, idproducto = $productosd WHERE idalmacen = $idinput");
    header("Location: ../../dashboard-inventario.php");
}
//EDITAR CUENTA
if (isset($_GET['editarcuenta'])){
    $user = $_POST['iduser'];
    $nombres = $_POST['names'];
    $apellidos = $_POST['lastnames'];
    $carnet = $_POST['carnetid'];
    $password = $_POST['passwordactual'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    $result = mysqli_query($conn, "SELECT password FROM empleado WHERE empleado.idempleado =$user");
    while ($row = $result->fetch_assoc()) {
        $passwordactual= $row['password'];
    }
    if($passwordactual==$password){
        if (empty($newpassword) and empty($confirmpassword)) {
            mysqli_query($conn, "UPDATE empleado SET nombres = '$nombres', apellidos = '$apellidos', carnet = $carnet WHERE idempleado = $user");
            echo "<b><span class='form-message' style='color:green;'>Datos cambiados!</span></b>";
        }
        else{
            if($newpassword==$confirmpassword){
                mysqli_query($conn, "UPDATE empleado SET nombres = '$nombres', apellidos = '$apellidos', carnet = $carnet , password = $newpassword WHERE idempleado = $user");
                echo "<b><span class='form-message' style='color:green;'>Tu contraseña fue cambiada</span></b>";
            }
            else
            {
                echo "<b><span class='form-message' style='color:red;'>Las contraseñas no coinciden, porfavor vuelve a intentarlo!</span></b>";
            }
        }
    }
    else{
        echo "<b><span class='form-message' style='color:red;'>Esa no es tu contraseña actual!</span></b>";
    }
}

//EDITAR SUCURSAL
if (isset($_GET['editarsucursal'])){
    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $nombre = mysqli_real_escape_string($conn, $_POST['razon-social-update']);
    $direccion = mysqli_real_escape_string($conn, $_POST['direccion-update']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono-update']);

    mysqli_query($conn, "UPDATE sucursal SET razon_social = '$nombre', direccion='$direccion', telefono='$telefono' WHERE idsucursal = $idinput");
    header("Location: ../../list-sucursales.php");
}
?>
