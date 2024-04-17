<?php
session_start();
include_once('../metodo/MetodoUsuario.php');
$conexion=new Conexion();
$cnx=$conexion->Conectar();
$modelusuario = new MetodoUsuario();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';

switch ($ope) {
    case '1':
        $area = isset($_POST['AREA']) ? $_POST['AREA'] : '0';
        $password = isset($_POST['PASSWORD']) ? $_POST['PASSWORD'] : '';
        $encryptado = sha1($password);
        $correo = isset($_POST['EMAIL']) ? $_POST['EMAIL'] : '';
        $usuario = isset($_POST['NOMBRE']) ? $_POST['NOMBRE'] : '';
        $apellido = isset($_POST['APELLIDO']) ? $_POST['APELLIDO'] : '';
        $resultado = $modelusuario->InserUsuario($area, $encryptado, $correo, $usuario, $apellido);
        echo $resultado;
        break;
    case '2':
        $area = $_POST['AREAU'];
        $password = $_POST['PASSWORDU'];
        $encryptado = sha1($password);
        $email = $_POST['EMAILU'];
        $usuario = $_POST['NOMBREU'];
        $apellido = $_POST['APELLIDOU'];
        $id = $_POST['ID'];
        $resultado = $modelusuario->UpdateUsuario($area, $encryptado, $email, $usuario, $apellido, $id);
        echo $resultado;
        break;
    case '3':
        echo json_encode($modelusuario->GetUsuario($_POST['id']));
        break;
    case '4':
        echo $modelusuario->DeleteUsuario($_POST['idUsuario']);
        break;
    case '5':
        echo json_encode($modelusuario->GetUsuario($_POST['id']));
        break;
    case '6':
        $correo=isset($_POST['correo'])?mysqli_real_escape_string($cnx,$_POST['correo']):'';
        $password=isset($_POST['contrasenia'])?$_POST['contrasenia']:'';
        $encryptado=sha1($password);
        $_SESSION['usuario'] = $correo;
        echo $modelusuario->validarUsuario($correo,  $encryptado);
        break;

    default:
        # code...
        break;
}
