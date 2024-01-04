<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoUnidad.php";
  $Unidad=new MetodoUnidad();

  echo $Unidad->DeleteUnidad($_POST['idUnidad']);