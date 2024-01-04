<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoCliente.php";
  $Cliente=new MetodoCliente();
  
  echo json_encode($Cliente->GetCliente( $_POST['id']));