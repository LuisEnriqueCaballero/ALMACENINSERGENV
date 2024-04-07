<?php
include_once '../config/config.php';
Class MetodoBanco{
    public function insertaBanco($banco){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="INSERT INTO banco(nombre_banco) VALUES('$banco')";
        $consulta=mysqli_query($con,$query);
        return $consulta;
    }

    public function UpdateBanco($idbanco,$banco){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="UPDATE banco SET nombre_banco='$banco' WHERE id_banco='$idbanco'";
        $consulta=mysqli_query($con,$query);
        return $consulta;
    }

    public function ObtenerDatos($idbanco){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="SELECT id_banco,nombre_banco FROM banco WHERE id_banco='$idbanco'";
        $consulta=mysqli_query($con,$query);
        $ver=mysqli_fetch_array($consulta);
        $datos=array(
            'id_banco'=>$ver[0],
            'nombre_banco'=>$ver[1],
        );
        return$datos;
    }
    public function Deletedato($id){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="DELETE FROM banco  WHERE id_banco='$id'";
        $consulta=mysqli_query($con,$query);
        return $consulta;
    }
}
?>