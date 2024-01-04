<?php
include_once '../../config/config.php';
include_once '../../metodo/MetodoVehiculo.php';

$Vehiculo=new MetodoVehiculo();

$datos=array($_POST['CLIENTE'],
$_POST['PLACA'],
$_POST['MARCA'],
$_POST['MODELO'],
$_POST['COLOR'],
$_POST['MOTOR'],
$_POST['VIN'],
$_POST['CHASIS'],
$_POST['COMBUSTIBLE'],
$_POST['VEHICULO'],
$_POST['INGRESO'],
$_POST['FABRICACION'],
$_POST['ANIO_MODELO'],
$_POST['ESTADO']);
echo $Vehiculo->InsertVehiculo($datos);
?>