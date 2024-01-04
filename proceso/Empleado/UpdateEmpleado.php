<?php
include_once '../../config/config.php';
include_once '../../metodo/MetodoEmpleado.php';

$Empleado=new MetodoEmpleado();

$datos=array($_POST['DOCUMENTOU'],
$_POST['NUMEROU'],
$_POST['NOMBREU'],
$_POST['APELLIDOU'],
$_POST['EDADU'],
$_POST['SEXOU'],
$_POST['TELEFONOU'],
$_POST['CELULARU'],
$_POST['AREAU'],
$_POST['DEPARTAMENTOU'],
$_POST['PROVINCIAU'],
$_POST['DISTRITOU'],
$_POST['DIRECCIONU'],
$_POST['HIJOU'],
$_POST['PLANILLAU'],
$_POST['FECHA_CUMPLEU'],
$_POST['FECHA_INGRESOU'],
$_POST['BANCOU'],
$_POST['CUENTAU'],
$_POST['ESTADOU'],
$_POST['id']
);
echo $Empleado->UpdateEmpleado($datos);
?>