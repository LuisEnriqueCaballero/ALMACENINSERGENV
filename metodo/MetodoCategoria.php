<?php
class MetodoCatgoria{
    public function insertaCategoria($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql="INSERT INTO categoria(NOMBRE_CATEGORIA) VALUE('$datos[0]')";
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
    public function updateCategoria($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE categoria SET NOMBRE_CATEGORIA='$datos[0]' WHERE ID_CATEGORIA ='$datos[1]'";
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