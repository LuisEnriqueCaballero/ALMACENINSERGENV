<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoTransformacion.php";

$transformacion =new MetodoTransformacion();

echo json_encode($transformacion->obtenerdatos($_POST['id']));
?>