<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoUsuario.php";
  $Usuario=new MetodoUsuario();
  $dato=array(
    $_POST['AREAU'],
    $_POST['PASSWORDU'],
    $_POST['EMAILU'],
    $_POST['NOMBREU'],
    $_POST['APELLIDOU'],
    $_POST['ID']
  );

  echo $Usuario->UpdateUsuario($dato);