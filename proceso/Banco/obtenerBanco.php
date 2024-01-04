<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoBanco.php";
  $banco=new MetodoBanco();
  
  echo json_encode($banco->ObtenerDatos($_POST['id'])); 
?>