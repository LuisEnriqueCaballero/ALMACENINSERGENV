<?php
session_start();
class MetodoUsuario{
    public function InsertUsuario($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $consulta="SELECT * FROM usuario WHERE EMAIL='$datos[2]'";
        $query1=mysqli_query($cnx,$consulta);
        $numrow=mysqli_num_rows($query1);

        if($numrow>0){
            return 2;
        }else{
            $sql="INSERT INTO usuario(ID_AREA,CONTRASENIA,EMAIL,NOMBRE,APELLIDO) 
            VALUES('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]')";
            $query=mysqli_query($cnx,$sql);
            return $query; 
        }
        
      
        
    }
    public function GetUsuario($idusuario){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="SELECT TUSU.ID_USUARIO,
        TUSU.ID_AREA,
        TUSU.CONTRASENIA,
        TUSU.EMAIL,
        TUSU.NOMBRE,
        TUSU.APELLIDO,
        TARE.DESCRIPCION
        FROM usuario AS TUSU 
        INNER JOIN area AS TARE ON TUSU.ID_AREA=TARE.ID_AREA
        WHERE ID_USUARIO  ='$idusuario'";
        $query=mysqli_query($cnx,$sql);
        $ver=mysqli_fetch_array($query);
        $datos=array(
            'ID_USUARIO'=>$ver[0],
            'ID_AREA'=>$ver[1],
            'CONTRASENIA'=>$ver[2],
            'EMAIL'=>$ver[3],
            'NOMBRE'=>$ver[4],
            'APELLIDO'=>$ver[5],
            'AREA'=>$ver[6]
            
        );
        return $datos;
    }
    public function UpdateUsuario($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE usuario SET 
        ID_AREA='$datos[0]',
        CONTRASENIA='$datos[1]',
        EMAIL='$datos[2]',
        NOMBRE='$datos[3]',
        APELLIDO='$datos[4]'
        WHERE ID_USUARIO ='$datos[5]'";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }

    public function DeleteUsuario($idUsuario){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="DELETE FROM usuario WHERE ID_USUARIO  ='$idUsuario'";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }
    public function validarUsuario($correo,$contrasenia){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $_SESSION['usuario']=$correo;
        $consulta="SELECT * FROM usuario WHERE CONTRASENIA='$contrasenia' AND EMAIL='$_SESSION[usuario]'";
        $query=mysqli_query($cnx,$consulta);
        $num_fila = mysqli_num_rows($query);
        if($num_fila>0){
            return 1;
        }else{
            return 0;
        }

    }
} 
?>