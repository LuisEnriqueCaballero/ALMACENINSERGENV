<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProcedimiento.php";
$subproceso=new SubProcesoMetodo();

$datos=array(
$_POST['procesoU'],
$_POST['subprocesoU'],
$_POST['id']
);

echo $subproceso->Updatedatos($datos);