<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProcedimiento.php";
$subproceso=new SubProcesoMetodo();


echo $subproceso->Eliminardato($_POST['id']);
?>