<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoUsuario.php";
  $Usuario=new MetodoUsuario();
  

  echo $Usuario->DeleteUsuario($_POST['idUsuario']);