<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoTransformacion.php";

$transformacion =new MetodoTransformacion();
$datos=array(
$_POST['vehiculo'],
$_POST['proceso'],
$_POST['subprocedimiento'],
$_POST['fecha_inicio'],
);
echo $transformacion->nuevoprocedimiento($datos);
?>