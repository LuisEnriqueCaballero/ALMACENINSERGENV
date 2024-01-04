<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoCategoria.php";
  $categoria=new MetodoCatgoria();
  $datos=array(
    $_POST['descripcionU'],
    $_POST['id']
  );
  echo $categoria->updateCategoria($datos);