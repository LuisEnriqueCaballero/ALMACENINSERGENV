<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoAlmacenPrincipal.php";
  $Producto=new Almacenprincipal();
  
  echo json_encode($Producto->GetProducto( $_POST['idelegri']));