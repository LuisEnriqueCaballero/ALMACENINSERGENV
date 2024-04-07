<?php
include_once '../config/config.php';
Class SubProcesoMetodo{
    public function InsertDatos($proceso,$subproceso){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="INSERT INTO subproceso_auto(ID_PROCESO,DESCRIPCION_SUBPROCESO)
               VALUES('$proceso','$subproceso')";
        $consulta=mysqli_query($con,$query);
        return $consulta;     
    }

    public function Updatedatos($id,$proceso,$subproceso){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="UPDATE subproceso_auto SET ID_PROCESO='$proceso',DESCRIPCION_SUBPROCESO='$subproceso' WHERE ID_SUBPROCESO='$id'";
        $consulta=mysqli_query($con,$query);
        return $consulta; 
    }

    public function Obtenerdatos($idsubproceso){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="SELECT ID_SUBPROCESO,ID_PROCESO,DESCRIPCION_SUBPROCESO FROM subproceso_auto WHERE ID_SUBPROCESO='$idsubproceso'";
        $consulta=mysqli_query($con,$query);
        $datos=mysqli_fetch_array($consulta);
        $arrayAsoccitiva=array(
            'ID_SUBPROCESO'=>$datos[0],
            'ID_PROCESO'=>$datos[1],
            'DESCRIPCION_SUBPROCESO'=>$datos[2]
        );

        return $arrayAsoccitiva;
    }
    public function Eliminardato($id){
        $conexion=new Conexion();
        $con=$conexion->Conectar();
        $query="DELETE FROM subproceso_auto WHERE ID_SUBPROCESO='$id'";
        $consulta=mysqli_query($con,$query);
        return $consulta; 
    }
}
?>