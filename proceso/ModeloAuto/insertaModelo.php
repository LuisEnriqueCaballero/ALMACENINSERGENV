<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoModeloAuto.php";
  $modeloauto=new MetodoModeloauto();
  $datos=array(
    $_POST['marca'],
    $_POST['modelo']
  );
  echo $modeloauto->insertaModelo($datos); 
?>