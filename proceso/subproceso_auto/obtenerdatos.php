<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProcedimiento.php";
$subproceso=new SubProcesoMetodo();


echo json_encode($subproceso->Obtenerdatos($_POST['idsubproceso']));
?>