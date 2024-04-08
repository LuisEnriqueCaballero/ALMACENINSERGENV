<?php
include_once '../config/config.php';
class MetodoTransformacion{
    public function nuevoprocedimiento($vehiculo,$proceso,$subpro,$fech){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql="INSERT INTO detalle_proceso(ID_AUTO,ID_PROCESO,ID_SUBPROCESO,FECHA_INICIO) 
              VALUE('$vehiculo','$proceso','$subpro','$fech')";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }
    public function obtenerdatos($idproceso){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="SELECT ID_DETALLE_PROCESO,ID_AUTO,ID_PROCESO,ID_SUBPROCESO,FECHA_INICIO,FECHA_FINAL
              FROM detalle_proceso
              WHERE ID_DETALLE_PROCESO ='$idproceso'";
              $query=mysqli_query($cnx,$sql);
              $ver=mysqli_fetch_array($query);
              $datos=array(
                'ID_DETALLE_PROCESO'=>$ver[0],
                'ID_AUTO'=>$ver[1],
                'ID_PROCESO'=>$ver[2],
                'ID_SUBPROCESO'=>$ver[3],
                'FECHA_INICIO'=>$ver[4],
                'FECHA_FINAL'=>$ver[5]
        );
        return $datos;
    }
    public function actualizadatos($id,$vehiculo,$proceso,$subpro,$fech,$fec_fin){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE detalle_proceso 
             SET ID_AUTO='$vehiculo',
                 ID_PROCESO='$proceso',
                 ID_SUBPROCESO='$subpro',
                 FECHA_INICIO='$fech',
                 FECHA_FINAL='$fec_fin'
             WHERE ID_DETALLE_PROCESO ='$id'";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }

    public function SelecProceso($idproceso){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="SELECT ID_SUBPROCESO,DESCRIPCION_SUBPROCESO FROM subproceso_auto WHERE ID_PROCESO='$idproceso'";
        $consulta=mysqli_query($con,$query);
       

        $cadena="<option value='0'>SELECCIONE PROCEDIMINETO</option>";
        while($ver2=mysqli_fetch_row($consulta)){
            $cadena=$cadena.'<option value='.$ver2[0].'>'.utf8_decode($ver2[1]).'</option>';
        }
        return $cadena;
    }
} 
?>