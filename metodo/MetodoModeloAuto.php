<?php
Class MetodoModeloauto{
    public function insertaModelo($datos){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="INSERT INTO modeloauto(ID_MARCA,MODELO) VALUES('$datos[0]','$datos[1]')";
        $consulta=mysqli_query($con,$query);
        return $consulta;
    }

    public function UpdateModelo($datos){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="UPDATE modeloauto SET ID_MARCA='$datos[0]', MODELO='$datos[1]' WHERE ID_MODELO='$datos[2]'";
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