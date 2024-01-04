<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoCategoria.php";
  $categoria=new MetodoCatgoria();
  
  echo json_encode($categoria->getCategoria($_POST['id']));