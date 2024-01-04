<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoUsuario.php";
  $Usuario=new MetodoUsuario();
  $datos=array($_POST['AREA'],
    $_POST['PASSWORD'],
    $_POST['EMAIL'],
    $_POST['NOMBRE'],
    $_POST['APELLIDO']
  );

  echo $Usuario->InsertUsuario($datos);