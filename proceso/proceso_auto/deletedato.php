<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProcesoauto.php";

$proceso =new MetodoProcesoauto();

echo $proceso->Eliminar($_POST['idproceso']);
?>