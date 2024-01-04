<?php
class MetodoUnidad{
    public function InsertUnidad($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql="INSERT INTO unidad_medida(nombre_unidadmedida) VALUES('$datos[0]')";
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
    public function UpdateUnidad($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE unidad_medida SET nombre_unidadmedida='$datos[0]' WHERE id_unidadmedida  ='$datos[1]'";
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