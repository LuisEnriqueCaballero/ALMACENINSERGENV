<?php
include_once '../../config/config.php';
include_once '../../metodo/MetodoEmpleado.php';

$Empleado=new MetodoEmpleado();

$datos=array($_POST['DOCUMENTO'],
$_POST['NUMERO'],
$_POST['NOMBRE'],
$_POST['APELLIDO'],
$_POST['EDAD'],
$_POST['SEXO'],
$_POST['TELEFONO'],
$_POST['CELULAR'],
$_POST['AREA'],
$_POST['DEPARTAMENTO'],
$_POST['PROVINCIA'],
$_POST['DISTRITO'],
$_POST['DIRECCION'],
$_POST['HIJO'],
$_POST['PLANILLA'],
$_POST['FECHA_CUMPLE'],
$_POST['FECHA_INGRESO'],
$_POST['BANCO'],
$_POST['CUENTA'],
$_POST['ESTADO']);
echo $Empleado->InsertEmpleado($datos);
?>