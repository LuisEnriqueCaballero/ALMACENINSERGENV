<?php
Class MetodoMarcaauto{
    public function insertaMarca($datos){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="INSERT INTO marcasauto(MARCA) VALUES('$datos[0]')";
        $consulta=mysqli_query($con,$query);
        return $consulta;
    }

    public function UpdateMarca($datos){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="UPDATE marcasauto SET MARCA='$datos[0]' WHERE ID_MARCA='$datos[1]'";
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