<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoProcesoauto.php";

$proceso =new MetodoProcesoauto();


echo json_encode($proceso->obtenerdatos($_POST['id']));
?>