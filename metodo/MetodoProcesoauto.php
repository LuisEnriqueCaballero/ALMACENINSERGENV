<?php
class MetodoProcesoauto{
    public function nuevoproceso($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql="INSERT INTO proceso_auto(DESCRIPCION_PROCESO) VALUE('$datos[0]')";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }
    public function obtenerdatos($idproceso){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="SELECT ID_PROCESO,DESCRIPCION_PROCESO FROM proceso_auto WHERE ID_PROCESO ='$idproceso'";
        $query=mysqli_query($cnx,$sql);
        $ver=mysqli_fetch_array($query);
        $datos=array(
            'ID_PROCESO'=>$ver[0],
            'DESCRIPCION_PROCESO'=>$ver[1]
        );
        return $datos;
    }
    public function actualizadatos($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE proceso_auto SET DESCRIPCION_PROCESO='$datos[0]' WHERE ID_PROCESO ='$datos[1]'";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }

    public function Eliminar($idproceso){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="DELETE FROM proceso_auto WHERE ID_PROCESO ='$idproceso'";
        $query=mysqli_query($cnx,$sql);
        return $query;

    }
} 
?>