<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProducto.php";

$proceso =new MetodoProducto();
$data=array(
    
    $_POST['categoriaU'],
    $_POST['monedaU'],
    $_POST['marcaU'],
    $_POST['productoU'],
    $_POST['precioU'],
    $_POST['medidaU'],
    $_POST['cantidadU'],
    $_POST['agotadoU'],
    $_POST['minimoU'],
    
    $_POST['id']
);
echo $proceso->updateProducto($data);
?>