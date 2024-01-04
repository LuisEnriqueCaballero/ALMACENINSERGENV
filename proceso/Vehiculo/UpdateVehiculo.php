<?php
include_once '../../config/config.php';
include_once '../../metodo/MetodoVehiculo.php';

$Vehiculo=new MetodoVehiculo();

$datos=array($_POST['CLIENTEU'],
$_POST['PLACAU'],
$_POST['MARCAU'],
$_POST['MODELOU'],
$_POST['COLORU'],
$_POST['MOTORU'],
$_POST['VINU'],
$_POST['CHASISU'],
$_POST['COMBUSTIBLEU'],
$_POST['VEHICULOU'],
$_POST['INGRESOU'],
$_POST['FABRICACIONU'],
$_POST['ANIO_MODELOU'],
$_POST['ESTADOU'],
$_POST['ID']);
echo $Vehiculo->UpdateVehiculo($datos);
?>