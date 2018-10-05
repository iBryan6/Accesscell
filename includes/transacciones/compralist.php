<?php
include_once '../connect.php';

/*//POPULATE LIST
if (isset($_POST["array"])){
    $array = $_POST["array"];
    $arrlength = count($array);
    for ($rowList = 1; $rowList < $arrlength; $rowList++) {
        $producto = $array[$rowList]['producto'];
        $cantidad = $array[$rowList]['cantidad'];
        $precio = $array[$rowList]['precio'];
        $sql = "SELECT idproducto FROM producto INNER JOIN categoria ON (producto.categoriaid = categoria.idcategoria) WHERE idproducto = '".$producto."'";
        $result = mysqli_query($conn, $sql);

        while($data = mysqli_fetch_assoc($result)){
            array_push($data,$cantidad);
            array_push($data,$precio);
            $arreglo["data"][]= $data;
        }

    }
    echo json_encode ($arreglo);
    mysqli_close($conn);
}*/

if (isset($_POST["list"])){
    $array = $_POST["list"];
    if (is_array($array)){
        $arrlength = count($array);
        $myArray = array();
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
                echo "<td class='afterund'>".$english_format_number = number_format(($cantidad))."</td>";
                echo "<td class='beforebs'>".$english_format_number = number_format(($precio),2)."</td>";
                echo "<td class='beforebs'>".$english_format_number = number_format(($precio*$cantidad),2)."</td>";
                echo "<td>".$row['proveedor']."</td>";
                echo "<td><a class='btn btn-md bg-red btnborrar' id='".$producto."' title='Eliminar'><i class='fa fa-trash'></i></a><a class='btn btn-md bg-green btneditar' data-role='update' data-id='".$producto."' title='Editar'><i class='fa fa-edit'></i></a></td>";
                echo "</tr>";
            }
        }
    }
    mysqli_close($conn);
}

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
        echo "<td class='afterund'>".$english_format_number = number_format(($cantidad))."</td>";
        echo "<td class='beforebs'>".$english_format_number = number_format(($precio),2)."</td>";
        echo "<td class='beforebs'>".$english_format_number = number_format(($precio*$cantidad),2)."</td>";
        echo "<td>".$row['proveedor']."</td>";
        echo "<td><a class='btn btn-md bg-red btnborrar' id='".$producto."' title='Eliminar'><i class='fa fa-trash'></i></a><a class='btn btn-md bg-green btneditar' data-role='update' data-id='".$producto."' title='Editar'><i class='fa fa-edit'></i></a></td>";
        echo "</tr>";
    }
    mysqli_close($conn);
}

if (isset($_GET["itemlist"])){

}
?>
