<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProcedimiento.php";
$subproceso=new SubProcesoMetodo();

$datos=array(
$_POST['proceso'],
$_POST['subproceso']
);

echo $subproceso->InsertDatos($datos);