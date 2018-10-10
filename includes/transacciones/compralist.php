<?php
include_once '../connect.php';

if (isset($_POST["list"])){
    $array = $_POST["list"];
    if (is_array($array)){
        $arrlength = count($array);
        for ($rowList = 0; $rowList < $arrlength; $rowList++) {
            $producto = $array[$rowList]['producto'];
            $cantidad = $array[$rowList]['cantidad'];
            $precio = $array[$rowList]['precio'];
            $sql = "SELECT * FROM producto INNER JOIN categoria ON (producto.categoriaid = categoria.idcategoria) WHERE idproducto = '".$producto."'";
            $result = mysqli_query($conn, $sql);
            $counter = $rowList + 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr id='$producto'>";
                echo "<td>".$counter."</td>";
                echo "<td>".$row['nombre_categoria']." - ".$row['tipo']."</td>";
                echo "<td>".$row['marca']."</td>";
                echo "<td>".$row['modelo']."</td>";
                echo "<td class='afterund' data-target='cantidad' type='number'>".$english_format_number = number_format(($cantidad))."</td>";
                echo "<td class='beforebs' data-target='precio' type='number'>".$english_format_number = number_format(($precio),2)."</td>";
                echo "<td class='beforebs'>".$english_format_number = number_format(($precio*$cantidad),2)."</td>";
                echo "<td>".$row['sucursal']."</td>";
                echo "<td>".$row['proveedor']."</td>";
                echo "<td><a class='btn btn-md bg-red btnborrar' id='".$producto."' title='Eliminar'><i class='fa fa-trash'></i></a></td>";
                echo "</tr>";
            }
        }
    }
    mysqli_close($conn);
};

if (isset($_POST["itemlist"])){
    $array = $_POST["itemlist"];
    $producto = $array[0]['producto'];
    $cantidad = $array[0]['cantidad'];
    $precio = $array[0]['precio'];
    $sql = "SELECT * FROM producto INNER JOIN categoria ON (producto.categoriaid = categoria.idcategoria) WHERE idproducto = '".$producto."'";
    $result = mysqli_query($conn, $sql);

    while($row = $result->fetch_assoc()) {
    echo "<tr id='$producto'>";
        echo "<td>1</td>";
        echo "<td>".$row['nombre_categoria']."</td>";
        echo "<td>".$row['marca']."</td>";
        echo "<td>".$row['modelo']."</td>";
        echo "<td class='afterund editablecontent' contenteditable='true'>".$english_format_number = number_format(($cantidad))."</td>";
        echo "<td class='beforebs' contenteditable='true'>".$english_format_number = number_format(($precio),2)."</td>";
        echo "<td class='beforebs'>".$english_format_number = number_format(($precio*$cantidad),2)."</td>";
        echo "<td>".$row['sucursal']."</td>";
        echo "<td>".$row['proveedor']."</td>";
        echo "<td><a class='btn btn-md bg-red btnborrar' id='".$producto."' title='Eliminar'><i class='fa fa-trash'></i></a></td>";
        echo "</tr>";
    }
    mysqli_close($conn);
};

if (isset($_POST["Items"])){
    $array = $_POST["Items"];
        $arrlength = count($array);
        for ($rowList = 0; $rowList < $arrlength; $rowList++) {
            $producto = $array[$rowList]['producto'];
            $cantidad = $array[$rowList]['cantidad'];
            $precio = $array[$rowList]['precio'];
            $sql = "SELECT * FROM producto INNER JOIN categoria ON (producto.categoriaid = categoria.idcategoria) WHERE idproducto = '".$producto."'";
            $result = mysqli_query($conn, $sql);
            while($row = $result->fetch_assoc()) {
                echo "<tr id='$producto'>";
                echo "<td>".$row['modelo']."</td>";
                echo "<td class='afterund' data-target='cantidad' type='number'>".$english_format_number = number_format(($cantidad))."</td>";
                echo "<td class='beforebs' data-target='precio' type='number'>".$english_format_number = number_format(($precio),2)."</td>";
                echo "<td class='beforebs'>".$english_format_number = number_format(($precio*$cantidad),2)."</td>";
                echo "</tr>";
            }
        }
}

//COMPRAR
if (isset($_GET['compraFinal'])){
    //GET ALL INFO
    $numRecibo = mysqli_real_escape_string($conn, $_POST['reciboNumFinal']);
    $usuarioFinal = mysqli_real_escape_string($conn, $_POST['usuarioFinal']);
    $totalPrice = mysqli_real_escape_string($conn, $_POST['totalPrice']);
    $listaProd = $_POST['productoList'];
    $listaCant = $_POST['cantidadList'];
    $listaPrecio = $_POST['precioList'];
    date_default_timezone_set( 'America/New_York' );
    $dateTime = date("Y-m-d h:i");
    $descripcion = mysqli_real_escape_string($conn, $_POST['detalleFinal']);

    if (empty($descripcion)) {
        $descripcion="-";
    }
    //INSERT DATA
    mysqli_query($conn, "INSERT INTO recibo(fecha, numero, idTipopago, idTipotransaccion, descripcion, pagoTotal) VALUES ('$dateTime', $numRecibo, 1, 1, '$descripcion', $totalPrice);");

    $arrlength = count($listaProd);
    for ($rowList = 0; $rowList < $arrlength; $rowList++) {
        $sql = mysqli_query($conn, "SELECT * FROM almacen WHERE idproducto=$listaProd[$rowList];");
        while($row = $sql->fetch_assoc()) {
            $nuevoStock = $row['stock'] + $listaCant[$rowList];
            mysqli_query($conn, "INSERT INTO transaccion(precio, cantidad, idalmacen, recibo) VALUES ($listaPrecio[$rowList], $listaCant[$rowList], ".$row['idalmacen'].", $numRecibo);");
            mysqli_query($conn, "UPDATE almacen SET stock = $nuevoStock WHERE idproducto=$listaProd[$rowList];");
        }
    }
    header("Location: ../../admin-dashboard-compras.php");
}
?>
