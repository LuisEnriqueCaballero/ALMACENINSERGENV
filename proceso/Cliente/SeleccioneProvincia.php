<?php
include_once '../../config/config.php';
include_once '../../metodo/MetodoCliente.php';

$Cliente=new MetodoCliente();


echo $Cliente->SeleccioneProvincia($_POST['idprovincia']);
?>