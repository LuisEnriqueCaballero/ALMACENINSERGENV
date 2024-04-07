<?php
include_once '../config/config.php';
class MetodoProcesoauto{
    public function nuevoproceso($descriptcion){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="INSERT INTO proceso_auto(DESCRIPCION_PROCESO) VALUE('$descriptcion')";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }
    public function obtenerdatos($idproceso){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="SELECT ID_PROCESO,DESCRIPCION_PROCESO FROM proceso_auto WHERE ID_PROCESO ='$idproceso'";
        $query=mysqli_query($cnx,$sql);
        $ver=mysqli_fetch_array($query);
        $datos=array(
            'ID_PROCESO'=>$ver[0],
            'DESCRIPCION_PROCESO'=>$ver[1]
        );
        return $datos;
    }
    public function actualizadatos($descripcion,$id){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE proceso_auto SET DESCRIPCION_PROCESO='$descripcion' WHERE ID_PROCESO ='$id'";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }

    public function Eliminar($idproceso){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="DELETE FROM proceso_auto WHERE ID_PROCESO ='$idproceso'";
        $query=mysqli_query($cnx,$sql);
        return $query;

    }
} 
?>