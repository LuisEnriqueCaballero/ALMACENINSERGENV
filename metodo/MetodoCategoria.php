<?php
include_once '../config/config.php';
class MetodoCatgoria{
    public function insertaCategoria($categoria){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql="INSERT INTO categoria(NOMBRE_CATEGORIA) VALUE('$categoria')";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }
    public function getCategoria($idproceso){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="SELECT ID_CATEGORIA,NOMBRE_CATEGORIA FROM categoria WHERE ID_CATEGORIA ='$idproceso'";
        $query=mysqli_query($cnx,$sql);
        $ver=mysqli_fetch_array($query);
        $datos=array(
            'ID_CATEGORIA'=>$ver[0],
            'NOMBRE_CATEGORIA'=>$ver[1]
        );
        return $datos;
    }
    public function updateCategoria($id,$categoria){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE categoria SET NOMBRE_CATEGORIA='$categoria' WHERE ID_CATEGORIA ='$id'";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }

    public function deleteCategoria($idproceso){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="DELETE FROM categoria WHERE ID_CATEGORIA ='$idproceso'";
        $query=mysqli_query($cnx,$sql);
        return $query;

    }
} 
?>