<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoAreaTrabajo.php";
  $area=new MetodoAreaTrabajo();
  $datos=array(
    $_POST['descripcionU'],
    $_POST['ID']
  );
  echo $area->UpdateArea($datos);