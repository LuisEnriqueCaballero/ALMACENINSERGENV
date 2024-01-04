<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoModeloAuto.php";
  $modeloauto=new MetodoModeloauto();
  $datos=array(
    $_POST['marcaU'],
    $_POST['modeloU'],
    $_POST['id']
  );
  echo $modeloauto->UpdateModelo($datos); 
?>