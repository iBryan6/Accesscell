<?php
include_once '../connect.php';

//POPULATE PROVEEDOR
if (isset($_POST["sucursal"])){
    if($_POST["sucursal"] != ''){
        $sql = "SELECT DISTINCT proveedor FROM producto WHERE sucursal = '".$_POST["sucursal"]."'";
    }
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0)
        echo "<option></option>";
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['proveedor']."'>".$row['proveedor']."</option>";
        }
}

//POPULATE CATEGORIA
if (isset($_POST["proveedor"], $_POST['sucursalcategoria'])){
    if($_POST["proveedor"] != '' && $_POST['sucursalcategoria'] !=''){
        $proveedor = $_POST["proveedor"];
        $categoria = $_POST["sucursalcategoria"];
        $sql = "SELECT DISTINCT categoriaid,nombre_categoria,tipo,sucursal FROM producto INNER JOIN categoria ON (producto.categoriaid = categoria.idcategoria) WHERE proveedor = '$proveedor' AND sucursal = '$categoria' ORDER BY nombre_categoria, tipo ASC";
    }
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0)
        echo "<option></option>";
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['categoriaid']."'>".$row['nombre_categoria']." ".$row['tipo']."</option>";
        }
}

//POPULATE PRODUCTO
if (isset($_POST["categoria"], $_POST['sucursalproducto'], $_POST['proveedorproducto'])){
    if($_POST["categoria"] != '' && $_POST['sucursalproducto'] != '' && $_POST['proveedorproducto']){
        $proveedor = $_POST["proveedorproducto"];
        $categoria = $_POST["categoria"];
        $sucursal = $_POST["sucursalproducto"];
        $sql = "SELECT DISTINCT idproducto,marca,modelo,costodecompra,preciomayor,preciodetalle,categoriaid FROM producto WHERE categoriaid = '$categoria' AND proveedor ='$proveedor' AND sucursal='$sucursal'";
    }
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0)
        echo "<option></option>";
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['idproducto']."'>".$row['marca']." ".$row['modelo']."</option>";
        }
}

//POPULATE PRODUCTO
if (isset($_GET["test"])){
    $dbdata = array();
    $sql = "SELECT * FROM recibo WHERE idTipotransaccion = 1";
    $result = mysqli_query($conn,$sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                $dbdata[] = $row;
            }
        } else {
            echo "0 resultados";
        }
    echo json_encode($dbdata);
    mysqli_free_result($result);
    mysqli_close($conn);
}
?>
