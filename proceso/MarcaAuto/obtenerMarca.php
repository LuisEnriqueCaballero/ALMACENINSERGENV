<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoMarcaAuto.php";
  $marcaauto=new MetodoMarcaauto();
  
  echo json_encode($marcaauto->ObtenerDatos($_POST['idmarca'])); 
?>