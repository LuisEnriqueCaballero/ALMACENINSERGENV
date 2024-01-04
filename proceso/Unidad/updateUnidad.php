<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoUnidad.php";
  $Unidad=new MetodoUnidad();
  $dato=array($_POST['descripcionU'],
  $_POST['id']);

  echo $Unidad->UpdateUnidad($dato);