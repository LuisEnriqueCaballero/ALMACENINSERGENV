<?php
class MetodoTransformacion{
    public function nuevoprocedimiento($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql="INSERT INTO detalle_proceso(ID_AUTO,ID_PROCESO,ID_SUBPROCESO,FECHA_INICIO) 
              VALUE('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";
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
    public function actualizadatos($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE detalle_proceso 
             SET ID_AUTO='$datos[0]',
                 ID_PROCESO='$datos[1]',
                 ID_SUBPROCESO='$datos[2]',
                 FECHA_INICIO='$datos[3]',
                 FECHA_FINAL='$datos[4]'
             WHERE ID_DETALLE_PROCESO ='$datos[5]'";
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