<?php
include_once '../../config/config.php';
include_once '../../metodo/MetodoVehiculo.php';

$Vehiculo=new MetodoVehiculo();


echo $Vehiculo->DeleteVehiculo($_POST['idVehiculo']);
?>