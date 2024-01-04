<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoMarcaAuto.php";
  $marcaauto=new MetodoMarcaauto();
  $datos=array(
    $_POST['descripcion']
  );
  echo $marcaauto->insertaMarca($datos); 
?>