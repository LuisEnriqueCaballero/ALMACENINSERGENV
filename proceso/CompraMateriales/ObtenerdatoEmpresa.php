<?php
require_once '../../config/config.php';
require_once '../../Metodo/MetodoCompra.php';

$comprar =new Compra();

$idEmpresa=$_POST['idpempre'];

echo json_encode($comprar->ObtenerdatoEmpresa($idEmpresa));