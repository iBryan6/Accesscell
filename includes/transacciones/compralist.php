<?php
include_once '../connect.php';

//POPULATE PROVEEDOR
if (isset($_POST["list"])){
    $array = $_POST["list"];
    $arrlength = count($array);
    for($x = 0; $x < $arrlength; $x++) {
        echo print_r($array[$x]);
        echo "<br>";
    }
}

?>
