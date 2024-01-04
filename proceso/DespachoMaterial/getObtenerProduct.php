<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoDespacho.php";

$producto=new Despacho();

echo json_encode($producto->SelcProducto($_POST['idproducto']));
?>