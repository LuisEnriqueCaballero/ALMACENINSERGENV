<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProveedor.php";

$proveedor =new MetodoProveedor();
$datos=array(
    $_POST['empresaU'],
    $_POST['rucU'],
    $_POST['telefonoU'],
    $_POST['nombreU'],
    $_POST['apellidoU'],
    $_POST['celularU'],
    $_POST['celular1U'],
    $_POST['distritoU'],
    $_POST['direccionU'],
    $_POST['bancoU'],
    $_POST['cuentasU'],
    $_POST['cuentaU'],
    $_POST['banco1U'],
    $_POST['cuentas1U'],
    $_POST['cuenta1U'],
    $_POST['banco2U'],
    $_POST['cuentas2U'],
    $_POST['cuenta2U'],
    $_POST['banco3U'],
    $_POST['cuentas3U'],
    $_POST['cuenta3U'],
    $_POST['id']
);
echo $proveedor->UpdateProveedor($datos);