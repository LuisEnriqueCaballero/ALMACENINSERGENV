<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProducto.php";

$proceso =new MetodoProducto();

echo $proceso->deleteProducto($_POST['idproducto']);
?>