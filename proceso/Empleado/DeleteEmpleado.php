<?php
include_once '../../config/config.php';
include_once '../../metodo/MetodoEmpleado.php';

$Empleado=new MetodoEmpleado();


echo $Empleado->DeleteEmpleado($_POST['idEmpleado']);
?>