<?php
include_once '../../config/config.php';
include_once '../../metodo/MetodoVehiculo.php';

$Vehiculo=new MetodoVehiculo();


echo $Vehiculo->SeleccionarMarca($_POST['idMarca']);
?>