<?php
include_once "../../config/config.php";
include_once "../../metodo/MetodoBanco.php";
  $banco=new MetodoBanco();
  
  echo $banco->Deletedato($_POST['idbanco']); 
?>