<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProveedor.php";

$proveedor =new MetodoProveedor();
$datos=array(
$_POST['empresa'],
$_POST['ruc'],
$_POST['telefono'],
$_POST['nombre'],
$_POST['apellido'],
$_POST['celular'],
$_POST['celular1'],
$_POST['distrito'],
$_POST['direccion'],
$_POST['banco'],
$_POST['cuentas'],
$_POST['cuenta'],
$_POST['banco1'],
$_POST['cuentas1'],
$_POST['cuenta1'],
$_POST['banco2'],
$_POST['cuentas2'],
$_POST['cuenta2'],
$_POST['banco3'],
$_POST['cuentas3'],
$_POST['cuenta3']
);
echo $proveedor->InsertProveedor($datos);
?>