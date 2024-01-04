<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoAreaTrabajo.php";
  $area=new MetodoAreaTrabajo();
  
  echo $area->DeleteArea($_POST['idarea']);