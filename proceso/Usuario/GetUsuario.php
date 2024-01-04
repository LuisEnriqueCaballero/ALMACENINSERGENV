<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoUsuario.php";
  $Usuario=new MetodoUsuario();
  

  echo json_encode($Usuario->GetUsuario($_POST['id']));