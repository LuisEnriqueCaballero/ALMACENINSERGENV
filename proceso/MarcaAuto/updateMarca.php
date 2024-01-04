<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoMarcaAuto.php";
  $marcaauto=new MetodoMarcaauto();
  $datos=array(
    $_POST['descripcionU'],
    $_POST['id']
  );
  echo $marcaauto->UpdateMarca($datos); 
?>