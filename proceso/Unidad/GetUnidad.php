<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoUnidad.php";
  $Unidad=new MetodoUnidad();
 

  echo json_encode($Unidad->GetUnidad($_POST['id']));