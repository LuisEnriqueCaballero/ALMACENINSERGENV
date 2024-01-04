<?php
include_once '../../config/config.php';
include_once '../../metodo/MetodoTransformacion.php';

$transformacion=new MetodoTransformacion();


echo $transformacion->SelecProceso($_POST['id']);
?>