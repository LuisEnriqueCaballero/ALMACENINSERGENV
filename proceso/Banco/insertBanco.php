<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoBanco.php";
  $banco=new MetodoBanco();
  $datos=array(
    $_POST['descripcion']
  );
  echo $banco->insertaBanco($datos); 
?>