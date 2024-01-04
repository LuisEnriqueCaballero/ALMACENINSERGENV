<?php
session_start();

$index=$_POST['ind'];
unset($_SESSION['listaproductotemp'][$index]);
$datos=array_values($_SESSION['listaproductotemp']);
unset($_SESSION['listaproductotemp']);
$_SESSION['listaproductotemp']=$datos;