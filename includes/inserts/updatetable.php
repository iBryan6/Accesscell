<?php
include_once '../connect.php';

//EDITAR PROVEEDOR
if (isset($_GET['editarproveedor'])){
    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $representante = mysqli_real_escape_string($conn, $_POST['representanteinput']);
    $ubicacion = mysqli_real_escape_string($conn, $_POST['ubicacioninput']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefonoinput']);

    mysqli_query($conn, "UPDATE proveedor SET representante = '$representante', ubicacion = '$ubicacion', telefono = '$telefono' WHERE idproveedor = $idinput");
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
    $tipo = mysqli_real_escape_string($conn, $_POST['tipoinput']);

    mysqli_query($conn, "UPDATE categoria SET nombre_categoria = '$categoria', tipo='$tipo' WHERE idcategoria = $idinput");
    header("Location: ../../admin-dashboard-categoria.php");
}

//EDITAR PRODUCTO
if (isset($_GET['editarproducto'])){

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

    mysqli_query($conn, "UPDATE producto SET marca = '$marca', categoriaid = '$categoria', modelo = '$modelo', costodecompra = $costodecompra, preciomayor = $preciomayor, preciodetalle = $preciodetalle, descripcion = '$descripcion', proveedor = '$proveedor',sucursal = '$sucursal' WHERE idproducto = $idinput");
    header("Location: ../../admin-dashboard-productos.php");
}

//EDITAR INVENTARIO
if (isset($_GET['editarinventario'])){
    $idinput = mysqli_real_escape_string($conn, $_POST['idinput']);
    $productosd = mysqli_real_escape_string($conn, $_POST['updateidprod']);
    $stock = mysqli_real_escape_string($conn, $_POST['updatestock']);

    mysqli_query($conn, "UPDATE almacen SET stock = $stock, idproducto = $productosd WHERE idalmacen = $idinput");
    header("Location: ../../admin-dashboard-inventario.php");
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
?>
