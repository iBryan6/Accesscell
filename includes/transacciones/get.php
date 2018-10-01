<?php
include_once '../connect.php';

//POPULATE SUCURSAL
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

//POPULATE PROVEEDOR
if (isset($_POST["proveedor"])){
    if($_POST["proveedor"] != ''){
        $sql = "SELECT DISTINCT categoriaid,nombre_categoria,tipo FROM producto INNER JOIN categoria ON (producto.categoriaid = categoria.idcategoria) WHERE proveedor = '".$_POST["proveedor"]."'ORDER BY nombre_categoria, tipo ASC";
    }
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0)
        echo "<option></option>";
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['categoriaid']."'>".$row['nombre_categoria']." ".$row['tipo']."</option>";
        }
}

//POPULATE PRODUCTO
if (isset($_POST["categoria"])){
    if($_POST["categoria"] != ''){
        $sql = "SELECT idproducto,marca,modelo,costodecompra,preciomayor,preciodetalle,categoriaid FROM producto WHERE categoriaid = '".$_POST["categoria"]."'";
    }
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0)
        echo "<option></option>";
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['idproducto']."'>".$row['marca']." ".$row['modelo']."</option>";
        }
}
?>
