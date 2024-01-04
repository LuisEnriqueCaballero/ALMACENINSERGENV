<?php
session_start();
include_once '../../config/config.php';
$conexion=new Conexion();
$cnx=$conexion->Conectar();
$id=$_POST['id'];
$idmoneda=$_POST['idmoneda'];
$id_producto=$_POST['idproducto'];
$preciounitario=$_POST['PRECIO'];
$cantidad=$_POST['CANTIDAD'];

$sql1="SELECT ID_PRODUCTO , CONCAT(MARCAR,' ',NOMBRE) FROM producto WHERE ID_PRODUCTO='$id_producto'";
$query1=mysqli_query($cnx,$sql1);
$producto=mysqli_fetch_row($query1)[1];

$datos=$id.'||'.
       $id_producto.'||'.
       $idmoneda.'||'.
       $producto.'||'.
       $preciounitario.'||'.
       $cantidad;

       $_SESSION['listaproductotemp'][]=$datos;
?>

