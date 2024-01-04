<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoCategoria.php";
  $categoria=new MetodoCatgoria();
  $datos=array(
    $_POST['descripcion']
  );
  echo $categoria->insertaCategoria($datos);