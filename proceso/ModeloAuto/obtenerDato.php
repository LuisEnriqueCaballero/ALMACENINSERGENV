<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoModeloAuto.php";
  $modeloauto=new MetodoModeloauto;
 
  echo json_encode($modeloauto->ObtenerDatos($_POST['idmodelo'])); 
?>