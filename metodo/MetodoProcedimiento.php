<?php
Class SubProcesoMetodo{
    public function InsertDatos($datos){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="INSERT INTO subproceso_auto(ID_PROCESO,DESCRIPCION_SUBPROCESO)
               VALUES('$datos[0]','$datos[1]')";
        $consulta=mysqli_query($con,$query);
        return $consulta;     
    }

    public function Updatedatos($datos){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="UPDATE subproceso_auto SET ID_PROCESO='$datos[0]',DESCRIPCION_SUBPROCESO='$datos[1]' WHERE ID_SUBPROCESO='$datos[2]'";
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