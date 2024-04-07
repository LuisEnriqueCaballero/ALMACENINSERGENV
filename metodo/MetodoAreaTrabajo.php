<?php
include_once '../config/config.php';
class MetodoAreaTrabajo{
    public function InsertArea($description){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql="INSERT INTO area(DESCRIPCION) VALUES('$description')";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }
    public function GetArea($idarea){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="SELECT ID_AREA,DESCRIPCION FROM area WHERE ID_AREA ='$idarea'";
        $query=mysqli_query($cnx,$sql);
        $ver=mysqli_fetch_array($query);
        $datos=array(
            'ID_AREA'=>$ver[0],
            'DESCRIPCION'=>$ver[1]
        );
        return $datos;
    }
    public function UpdateArea($id,$description){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE area SET DESCRIPCION='$description' WHERE ID_AREA ='$id'";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }

    public function DeleteArea($idarea){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="DELETE FROM area WHERE ID_AREA ='$idarea'";
        $query=mysqli_query($cnx,$sql);
        return $query;

    }
} 
?>