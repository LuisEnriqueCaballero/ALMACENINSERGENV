<?php
session_start();
include_once '../../config/config.php';
$conexion=new Conexion();
$cnx=$conexion->Conectar();

$id_trabajador=$_POST['EMPLEADO'];
$id_vehiculo=$_POST['VEHICULO'];
$tipoTrabajo=$_POST['TRABAJO'];
$proceso=$_POST['PROCESO'];
$procesoMa=$_POST['PROCESOM'];
$descripcServ=$_POST['DESCRIPCION_SERVICIO'];
$id_producto=$_POST['PRODUCTO'];
$preciounitario=$_POST['PRECIO'];
$cantidad=$_POST['CANTIDAD'];

$sql1="SELECT ID_PRODUCTO , CONCAT(MARCAR,' ',NOMBRE) FROM producto WHERE ID_PRODUCTO='$id_producto'";
$query1=mysqli_query($cnx,$sql1);
$producto=mysqli_fetch_row($query1)[1];

$datos=$id_producto.'||'.
       $id_trabajador.'||'.
       $id_vehiculo.'||'.
       $preciounitario.'||'.
       $cantidad.'||'.
       $producto.'||'.
       $proceso.'||'.
       $procesoMa.'||'.
       $descripcServ;

       $_SESSION['listaproductotemp'][]=$datos;
?>