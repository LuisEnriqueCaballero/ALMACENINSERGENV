<?php
include_once '../config/config.php';
class MetodoUnidad{
    public function InsertUnidad($description){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql="INSERT INTO unidad_medida(nombre_unidadmedida) VALUES('$description')";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }
    public function GetUnidad($idunidad){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="SELECT id_unidadmedida,nombre_unidadmedida FROM unidad_medida WHERE id_unidadmedida  ='$idunidad'";
        $query=mysqli_query($cnx,$sql);
        $ver=mysqli_fetch_array($query);
        $datos=array(
            'id_unidadmedida'=>$ver[0],
            'nombre_unidadmedida'=>$ver[1]
        );
        return $datos;
    }
    public function UpdateUnidad($id,$description){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE unidad_medida SET nombre_unidadmedida='$description' WHERE id_unidadmedida  ='$id'";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }

    public function DeleteUnidad($idunidad){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="DELETE FROM unidad_medida WHERE id_unidadmedida  ='$idunidad'";
        $query=mysqli_query($cnx,$sql);
        return $query;

    }
} 
?>