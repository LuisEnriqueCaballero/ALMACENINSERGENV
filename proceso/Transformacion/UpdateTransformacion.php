<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoTransformacion.php";

$transformacion =new MetodoTransformacion();
$datos=array(
$_POST['vehiculoU'],
$_POST['procesoU'],
$_POST['subprocedimientoU'],
$_POST['fecha_inicioU'],
$_POST['fecha_finalU'],
$_POST['id'],
);
echo $transformacion->actualizadatos($datos);
?>