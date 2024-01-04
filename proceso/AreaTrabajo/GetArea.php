<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoAreaTrabajo.php";
  $area=new MetodoAreaTrabajo();
  
  echo json_encode($area->GetArea($_POST['id']));