<?php
include_once '../config/config.php';
Class MetodoModeloauto{
    public function insertaModelo($marca,$modelo){
        $conexion=new Conexion();
        $con=$conexion->Conectar();
        $query="INSERT INTO modeloauto(ID_MARCA,MODELO) VALUES('$marca','$modelo')";
        $consulta=mysqli_query($con,$query);
        return $consulta;
    }

    public function UpdateModelo($id,$marca,$modelo){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="UPDATE modeloauto SET ID_MARCA='$marca', MODELO='$modelo' WHERE ID_MODELO='$id'";
        $consulta=mysqli_query($con,$query);
        return $consulta;
    }

    public function ObtenerDatos($idModelo){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="SELECT ID_MODELO,ID_MARCA,MODELO FROM modeloauto WHERE ID_MODELO='$idModelo'";
        $consulta=mysqli_query($con,$query);
        $ver=mysqli_fetch_array($consulta);
        $datos=array(
            'ID_MODELO'=>$ver[0],
            'ID_MARCA'=>$ver[1],
            'MODELO'=>$ver[2],
        );
        return$datos;
    }
    public function Deletedato($id){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="DELETE FROM modeloauto  WHERE ID_MODELO='$id'";
        $consulta=mysqli_query($con,$query);
        return $consulta;
    }
}
?>