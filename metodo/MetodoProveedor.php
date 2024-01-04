<?php
class MetodoProveedor{
    public function InsertProveedor($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql="INSERT INTO proveedor(EMPRESA,
                                  RUC,
                                  TELEFONO_EMPRESA,
                                  NOMBRE_PROVEEDOR,
                                  APELLIDO_PROVEEDOR,
                                  TELEFONO_PROVEEDOR,
                                  TELEFONO_PROVEEDOR2,
                                  DISTRITO,
                                  DIRECCION,
                                  BANCO,
                                  TIPO_CUENTA,
                                  NUMERO_CUENTA,
                                  BANCO1,
                                  TIPO_CUENTA1,
                                  NUMERO_CUENTA1,
                                  BANCO2,
                                  TIPO_CUENTA2,
                                  NUMERO_CUENTA2,
                                  BANCO3,
                                  TIPO_CUENTA3,
                                  NUMERO_CUENTA3
                                  ) 
                                  VALUE('$datos[0]',
                                        '$datos[1]',
                                        '$datos[2]',
                                        '$datos[3]',
                                        '$datos[4]',
                                        '$datos[5]',
                                        '$datos[6]',
                                        '$datos[7]',
                                        '$datos[8]',
                                        '$datos[9]',
                                        '$datos[10]',
                                        '$datos[11]',
                                        '$datos[12]',
                                        '$datos[13]',
                                        '$datos[14]',
                                        '$datos[15]',
                                        '$datos[16]',
                                        '$datos[17]',
                                        '$datos[18]',
                                        '$datos[19]',
                                        '$datos[20]')";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }
    public function GetProveedor($idProveedor){

        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql="SELECT PROV.ID_PROVEEDOR, 
        PROV.EMPRESA,
        PROV.RUC,
        PROV.TELEFONO_EMPRESA,
        PROV.NOMBRE_PROVEEDOR,
        PROV.APELLIDO_PROVEEDOR,
        PROV.TELEFONO_PROVEEDOR,
        PROV.TELEFONO_PROVEEDOR2,
        PROV.DISTRITO,
        PROV.DIRECCION,
        PROV.BANCO,
        PROV.TIPO_CUENTA,
        PROV.NUMERO_CUENTA,
        PROV.BANCO1,
        PROV.TIPO_CUENTA1,
        PROV.NUMERO_CUENTA1,
        PROv.BANCO2,
        PROV.TIPO_CUENTA2,
        PROV.NUMERO_CUENTA2,
        PROV.BANCO3,
        PROV.TIPO_CUENTA3, 
        PROV.NUMERO_CUENTA3
         FROM proveedor AS PROV
         INNER JOIN  ubdistrito AS TUBD ON PROV.DISTRITO=TUBD.idDist
         INNER JOIN banco AS TBA ON PROV.BANCO=TBA.id_banco
         INNER JOIN banco AS TBB ON PROV.BANCO=TBB.id_banco
         INNER JOIN banco AS TBC ON PROV.BANCO=TBC.id_banco
         INNER JOIN banco AS TBD ON PROV.BANCO=TBD.id_banco
        WHERE PROV.ID_PROVEEDOR ='$idProveedor'";
        $query=mysqli_query($cnx,$sql);
        $ver=mysqli_fetch_array($query);
        $datos=array(
            'ID_PROVEEDOR'=>$ver[0],
            'EMPRESA'=>$ver[1],
            'RUC'=>$ver[2],
            'TELEFONO_EMPRESA'=>$ver[3],
            'NOMBRE_PROVEEDOR'=>$ver[4],
            'APELLIDO_PROVEEDOR'=>$ver[5],
            'TELEFONO_PROVEEDOR'=>$ver[6],
            'TELEFONO_PROVEEDOR2'=>$ver[7],
            'DISTRITO'=>$ver[8],
            'DIRECCION'=>$ver[9],
            'BANCO'=>$ver[10],
            'TIPO_CUENTA'=>$ver[11],
            'NUMERO_CUENTA'=>$ver[12],
            'BANCO1'=>$ver[13],
            'TIPO_CUENTA1'=>$ver[14],
            'NUMERO_CUENTA1'=>$ver[15],
            'BANCO2'=>$ver[16],
            'TIPO_CUENTA2'=>$ver[17],
            'NUMERO_CUENTA2'=>$ver[18],
            'BANCO3'=>$ver[19],
            'TIPO_CUENTA3'=>$ver[20] ,
            'NUMERO_CUENTA3'=>$ver[21],
            
        );
        return $datos;
    }
    public function UpdateProveedor($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE proveedor SET 
                     EMPRESA='$datos[0]',
                     RUC='$datos[1]',
                     TELEFONO_EMPRESA='$datos[2]',
                     NOMBRE_PROVEEDOR='$datos[3]',
                     APELLIDO_PROVEEDOR='$datos[4]',
                     TELEFONO_PROVEEDOR='$datos[5]',
                     TELEFONO_PROVEEDOR2='$datos[6]',
                     DISTRITO='$datos[7]',
                     DIRECCION='$datos[8]',
                     BANCO='$datos[9]',
                     TIPO_CUENTA='$datos[10]',
                     NUMERO_CUENTA='$datos[11]',
                     BANCO1='$datos[12]',
                     TIPO_CUENTA1='$datos[13]',
                     NUMERO_CUENTA1='$datos[14]',
                     BANCO2='$datos[15]',
                     TIPO_CUENTA2='$datos[16]',
                     NUMERO_CUENTA2='$datos[17]',
                     BANCO3='$datos[18]',
                     TIPO_CUENTA3='$datos[19]', 
                     NUMERO_CUENTA3='$datos[20]'
                      WHERE ID_PROVEEDOR ='$datos[21]'";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }

    public function DeleteProveedor($idPrProveedor){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="DELETE FROM proveedor WHERE ID_PROVEEDOR ='$idPrProveedor'";
        $query=mysqli_query($cnx,$sql);
        return $query;

    }
} 
?>