<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoModeloAuto.php";
  $modeloauto=new MetodoModeloauto;
 
  echo $modeloauto->Deletedato($_POST['id']); 
?>