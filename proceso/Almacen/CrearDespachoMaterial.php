<?php
session_start();
include_once "../../config/config.php";
include_once "../../metodo/MetodoAlmacenPrincipal.php";

$creasalida=new Almacenprincipal();

if(count($_SESSION['listaproductotemp'])===0){
    echo 0;
}else{
    $resulta=$creasalida->CrearSalida();
    unset($_SESSION['listaproductotemp']);
    echo $resulta;
}