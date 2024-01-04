<?php
session_start();
require_once '../../config/config.php';
$conectar=new Conexion();
$cnx=$conectar->Conectar(); 

$id_empresa=$_POST['EMPRESA'];
$recibo=$_POST['RECIBO'];
$serie=$_POST['NUMERO'];
$moneda=$_POST['MONEDA'];
$producto=$_POST['PRODUCTO'];
$precio=$_POST['PRECIO'];
$cantidad=$_POST['CANTIDAD'];
$motivo=$_POST['descripcion'];
$fecha_vencimiento=$_POST['fecha_vencimento'];

$sql5 = "SELECT ID_PRODUCTO,CONCAT(MARCAR,' ',NOMBRE) FROM producto WHERE ID_PRODUCTO='$producto'";
$query5 = mysqli_query($cnx, $sql5);
$nombreproducto=mysqli_fetch_row($query5)[1];

$sql6 = "SELECT ID_PROVEEDOR,EMPRESA FROM proveedor WHERE ID_PROVEEDOR='$id_empresa'";
$query6 = mysqli_query($cnx, $sql6);
$nombreempresa=mysqli_fetch_row($query6)[1];

$datos=$id_empresa.'||'.
       $recibo.'||'.
       $serie.'||'.
       $moneda.'||'. 
       $producto.'||'.
       $nombreproducto.'||'.
       $precio.'||'. 
       $cantidad.'||'.
       $motivo.'||'.
       $fecha_vencimiento;
       
   $_SESSION['listacompratemp'][]=$datos;    
   ?>