<?php
include_once '../../config/config.php';
include_once '../../metodo/MetodoEmpleado.php';

$Empleado=new MetodoEmpleado();


echo json_encode($Empleado->GetEmpleado($_POST['id']));
?>