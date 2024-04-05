<?php
// LLAMANDO LA CONFIGURACION
include_once('../config/config.php');
// METODOS
class MetodoUsuario{
    // QUERY DE INSERTAR DATOS BASE DE DATOS
    public function InserUsuario($area, $password, $email, $nomusuario, $apellido)
    {
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql = "INSERT INTO usuario(ID_AREA,CONTRASENIA,EMAIL,NOMBRE,APELLIDO) VALUES('$area', '$password', '$email', '$nomusuario', '$apellido')";
        $query = mysqli_query($cnx, $sql);
        $cnx->close();
        return $query;
    }
    // QUERY DE OBTENER DATOS
        public function GetUsuario($idusuario)
    {
        $conexion = new Conexion();
        $cnx = $conexion->Conectar();
        $sql = "SELECT TUSU.ID_USUARIO,
        TUSU.ID_AREA,
        TUSU.CONTRASENIA,
        TUSU.EMAIL,
        TUSU.NOMBRE,
        TUSU.APELLIDO,
        TARE.DESCRIPCION
        FROM usuario AS TUSU 
        INNER JOIN area AS TARE ON TUSU.ID_AREA=TARE.ID_AREA
        WHERE ID_USUARIO  ='$idusuario'";
        $query = mysqli_query($cnx, $sql);
        $ver = mysqli_fetch_array($query);
        $datos = array(
            'ID_USUARIO' => $ver[0],
            'ID_AREA' => $ver[1],
            'CONTRASENIA' => $ver[2],
            'EMAIL' => $ver[3],
            'NOMBRE' => $ver[4],
            'APELLIDO' => $ver[5],
            'AREA' => $ver[6]

        );
        $cnx->close();
        return $datos;
    }
    // QUERY DE UPDATE
    public function UpdateUsuario($area,$encryptado,$email,$usuario,$apellido,$id)
    {
        $conexion = new Conexion();
        $cnx = $conexion->Conectar();
        $sql = "UPDATE usuario SET
        ID_AREA='$area',
        CONTRASENIA='$encryptado',
        EMAIL='$email',
        NOMBRE='$usuario',
        APELLIDO='$apellido'
        WHERE ID_USUARIO ='$id'";

        $query = mysqli_query($cnx, $sql);
        $cnx->close();
        return $query;
    }
// QUERY DE DELETE
    public function DeleteUsuario($idUsuario)
    {
        $conexion = new Conexion();
        $cnx = $conexion->Conectar();
        $sql = "DELETE FROM usuario WHERE ID_USUARIO  ='$idUsuario'";
        $query = mysqli_query($cnx, $sql);
        $cnx->close();
        return $query;
    }
    // QUERY PARA VALIDAR DATOS
    public function validarUsuario($correo, $contrasenia)
    {
        $conexion = new Conexion();
        $cnx = $conexion->Conectar();
        $consulta = "SELECT * FROM usuario WHERE CONTRASENIA='$contrasenia' AND EMAIL='$correo'";
        $query = mysqli_query($cnx, $consulta);
        $num_fila = mysqli_num_rows($query);
        $cnx->close();
        if ($num_fila > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
