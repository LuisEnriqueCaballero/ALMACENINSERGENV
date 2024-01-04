<?php
include_once '../../config/config.php';
include_once '../../metodo/MetodoVehiculo.php';

$Vehiculo=new MetodoVehiculo();


echo json_encode($Vehiculo->GetVehiculo($_POST['id']));
?>