<?php
session_start();

$index=$_POST['ind'];
unset($_SESSION['listacompratemp'][$index]);
$datos=array_values($_SESSION['listacompratemp']);
unset($_SESSION['listacompratemp']);
$_SESSION['listacompratemp']=$datos;