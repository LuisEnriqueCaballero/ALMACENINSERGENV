<?php 
include_once "../../config/config.php";
include_once "../../metodo/MetodoCliente.php";
  $Cliente=new MetodoCliente();
  $datos=array(
    $_POST['tipoU'],
    $_POST['empresaU'],
    $_POST['rucU'],
    $_POST['telefono_empresaU'],
    $_POST['nombresU'],
    $_POST['apellidoU'],
    $_POST['dniU'],
    $_POST['telefonoU'],
    $_POST['emailU'],
    $_POST['departamentoU'],
    $_POST['provinciaU'],
    $_POST['distritoU'],
    $_POST['direccionU'],
    $_POST['id']
  );
  echo $Cliente->UpdateCliente($datos);