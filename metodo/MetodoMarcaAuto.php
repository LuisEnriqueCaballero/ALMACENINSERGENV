<?php
include_once '../config/config.php';
Class MetodoMarcaauto{
    public function insertaMarca($marca){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="INSERT INTO marcasauto(MARCA) VALUES('$marca')";
        $consulta=mysqli_query($con,$query);
        return $consulta;
    }

    public function UpdateMarca($id,$marca){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="UPDATE marcasauto SET MARCA='$marca' WHERE ID_MARCA='$id'";
        $consulta=mysqli_query($con,$query);
        return $consulta;
    }

    public function ObtenerDatos($idMarca){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="SELECT ID_MARCA,MARCA FROM marcasauto WHERE ID_MARCA='$idMarca'";
        $consulta=mysqli_query($con,$query);
        $ver=mysqli_fetch_array($consulta);
        $datos=array(
            'ID_MARCA'=>$ver[0],
            'MARCA'=>$ver[1],
        );
        return$datos;
    }
    public function Deletedato($id){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="DELETE FROM marcasauto  WHERE ID_MARCA='$id'";
        $consulta=mysqli_query($con,$query);
        return $consulta;
    }
}
?>