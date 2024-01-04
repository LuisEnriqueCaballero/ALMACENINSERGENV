<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProducto.php";

$proceso =new MetodoProducto();


echo json_encode($proceso->getProducto($_POST['id']));
?>