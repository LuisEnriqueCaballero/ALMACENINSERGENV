<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoProcesoauto.php";
  $proceso=new MetodoProcesoauto();
  $datos=array(
    $_POST['descripcion']
  );
  echo $proceso->nuevoproceso($datos);