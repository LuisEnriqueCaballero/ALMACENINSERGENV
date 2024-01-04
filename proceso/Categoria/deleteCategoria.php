<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoCategoria.php";
  $categoria=new MetodoCatgoria();
  
  echo $categoria->deleteCategoria($_POST['idcategoria']);