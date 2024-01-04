<?php
session_start();
require_once '../../config/config.php';
require_once '../../Metodo/MetodoCompra.php';

$crearCompra=new Compra();

if(count($_SESSION['listacompratemp'])===0){
    echo 0;
}else{
    $resulta=$crearCompra->CrearCompra();
    unset($_SESSION['listacompratemp']);
    echo $resulta;
    
}
