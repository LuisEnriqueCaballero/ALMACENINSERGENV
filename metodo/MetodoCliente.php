<?php
include_once '../config/config.php';
class MetodoCliente{
    public function InsertCliente($tipo,$empresa,$ruc,$telefono,$nombre,$apellido,$dni,$celular,$mail,$departamento,$provincia,$distrito,$direccion){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql="INSERT INTO cliente(TIPO_CLIENTE,
                                  EMPRESA,
                                  RUC,
                                  TELEFONO,
                                  DNI,
                                  NOMBRE_PROPIETARIO,
                                  APELLIDO_PROPIETARIO,
                                  TELEFONO_PERSONA,
                                  EMAIL,
                                  ID_DEPARTAMENTO,
                                  ID_PROVINCIA,
                                  ID_DISTRITO,
                                  DIRECCION) 
                                  VALUE('$tipo','$empresa','$ruc','$telefono','$nombre','$apellido','$dni','$celular','$mail','$departamento','$provincia','$distrito','$direccion')";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }
    public function GetCliente($idcliente){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="SELECT  TCLI.ID_CLIENTE,
        TCLI.TIPO_CLIENTE,
        TCLI.EMPRESA,
        TCLI.RUC,
        TCLI.TELEFONO,
        TCLI.DNI,
        TCLI.NOMBRE_PROPIETARIO,
        TCLI.APELLIDO_PROPIETARIO,
        TCLI.TELEFONO_PERSONA,
        TCLI.EMAIL,
        TCLI.ID_DEPARTAMENTO,
        TCLI.ID_PROVINCIA,
        TCLI.ID_DISTRITO,
        TCLI.DIRECCION,
        UBDEP.departamento,
        UBPRO.provincia,
        UBDIS.distrito
        FROM cliente AS TCLI
        INNER JOIN ubdepartamento AS UBDEP ON TCLI.ID_DEPARTAMENTO=UBDEP.idDepa
        INNER JOIN ubprovincia AS UBPRO ON TCLI.ID_PROVINCIA = UBPRO.idProv
        INNER JOIN ubdistrito AS UBDIS ON TCLI.ID_DISTRITO=UBDIS.idDist
        WHERE TCLI.ID_CLIENTE ='$idcliente'";
        $query=mysqli_query($cnx,$sql);
        $ver=mysqli_fetch_array($query);
        $datos=array(
                     'ID_CLIENTE'=>$ver[0],
                     'TIPO_CLIENTE'=>$ver[1],
                     'EMPRESA'=>$ver[2],
                     'RUC'=>$ver[3],
                     'TELEFONO'=>$ver[4],
                     'DNI'=>$ver[5],
                     'NOMBRE_PROPIETARIO'=>$ver[6],
                     'APELLIDO_PROPIETARIO'=>$ver[7],
                     'TELEFONO_PERSONA'=>$ver[8],
                     'EMAIL'=>$ver[9],
                     'ID_DEPARTAMENTO'=>$ver[10],
                     'ID_PROVINCIA'=>$ver[11],
                     'ID_DISTRITO'=>$ver[12],
                     'DIRECCION'=>$ver[13],
                     'DEPARTAMENTO'=>$ver[14],
                     'PROVINCIA'=>$ver[15], 
                     'DISTRITO'=>$ver[16],  
        );
        return $datos;
    }
    public function UpdateCliente($id,$tipo,$empresa,$ruc,$telefono,$nombre,$apellido,$dni,$celular,$mail,$departamento,$provincia,$distrito,$direccion){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE cliente SET 
                     TIPO_CLIENTE='$tipo',
                     EMPRESA='$empresa',
                     RUC='$ruc',
                     TELEFONO='$telefono',
                     DNI='$dni',
                     NOMBRE_PROPIETARIO='$nombre',
                     APELLIDO_PROPIETARIO='$apellido',
                     TELEFONO_PERSONA='$celular',
                     EMAIL='$mail',
                     ID_DEPARTAMENTO='$departamento',
                     ID_PROVINCIA='$provincia',
                     ID_DISTRITO='$distrito',
                     DIRECCION='$direccion'
                      WHERE ID_CLIENTE ='$id'";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }

    public function DeleteCliente($idcliente){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="DELETE FROM cliente WHERE ID_CLIENTE ='$idcliente'";
        $query=mysqli_query($cnx,$sql);
        return $query;

    }
    public function SeleccioneDepartamento($iddepartamento){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="SELECT idProv,provincia FROM ubprovincia WHERE idDepa='$iddepartamento'";
        $consulta=mysqli_query($con,$query);

        $cadena="<option value='0'>SELECCIONE PROVINCIA</option>";

        while($ver=mysqli_fetch_array($consulta)){
            $cadena=$cadena.'<option value='.$ver[0].'>'.$ver[1].'</option>';
        }
        return $cadena;
    }
    public function SeleccioneProvincia($idprovincia){
        $conexion=new Conexion();
        $con=$conexion->Conectar();

        $query="SELECT idDist,distrito FROM ubdistrito WHERE idProv='$idprovincia'";
        $consulta=mysqli_query($con,$query);

        $cadena="<option value='0'>SELECCIONE DISTRITO</option>";

        while($ver1=mysqli_fetch_array($consulta)){
            $cadena=$cadena.'<option value='.$ver1[0].'>'.$ver1[1].'</option>';
        }
        return $cadena;
    }
} 
?>