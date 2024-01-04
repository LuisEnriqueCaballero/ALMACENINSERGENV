<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoMarcaAuto.php";
  $marcaauto=new MetodoMarcaauto();
 
  echo $marcaauto->Deletedato($_POST['id']); 
?>