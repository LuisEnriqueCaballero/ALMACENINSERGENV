<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProducto.php";

$proceso =new MetodoProducto();
$datos=array(
    $_POST['categoria'],
    $_POST['moneda'],
    $_POST['marca'],
    $_POST['producto'],
    $_POST['precio'],
    $_POST['medida'],
    $_POST['cantidad'],
    $_POST['agotado'],
    $_POST['minimo']
    
);
echo $proceso->insertaProducto($datos);
?>