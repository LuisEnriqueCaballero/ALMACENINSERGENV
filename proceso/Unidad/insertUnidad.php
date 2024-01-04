<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoUnidad.php";
  $Unidad=new MetodoUnidad();
  $dato=array($_POST['descripcion']);

  echo $Unidad->InsertUnidad($dato);