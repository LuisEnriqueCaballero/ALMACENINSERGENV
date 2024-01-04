<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoCliente.php";
  $Cliente=new MetodoCliente();
  $datos=array(
    $_POST['tipo'],
    $_POST['empresa'],
    $_POST['ruc'],
    $_POST['telefono_empresa'],
    $_POST['nombres'],
    $_POST['apellido'],
    $_POST['dni'],
    $_POST['telefono'],
    $_POST['email'],
    $_POST['departamento'],
    $_POST['provincia'],
    $_POST['distrito'],
    $_POST['direccion'],
  );
  echo $Cliente->InsertCliente($datos);