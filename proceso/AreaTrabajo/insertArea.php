<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoAreaTrabajo.php";
  $area=new MetodoAreaTrabajo();
  $dato=array($_POST['descripcion']);

  echo $area->InsertArea($dato);