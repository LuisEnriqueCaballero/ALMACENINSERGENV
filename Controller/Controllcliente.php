<?php
include_once '../metodo/MetodoCliente.php';
$metodocliente = new MetodoCliente();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $tipo = $_POST['tipo'];
        $empresa = $_POST['empresa'];
        $ruc = $_POST['ruc'];
        $telefono = $_POST['telefono_empresa'];
        $nombre = $_POST['nombres'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];
        $celular = $_POST['telefono'];
        $email = $_POST['email'];
        $departamento = $_POST['departamento'];
        $provincia = $_POST['provincia'];
        $distrito = $_POST['distrito'];
        $direccion = $_POST['direccion'];
        $resulta = $metodocliente->InsertCliente($tipo, $empresa, $ruc, $telefono, $nombre, $apellido, $dni, $celular, $email, $departamento, $provincia, $distrito, $direccion);
        echo $resulta;
        break;
    case '2':
        $id = $_POST['id'];
        $tipo = $_POST['tipoU'];
        $empresa = $_POST['empresaU'];
        $ruc = $_POST['rucU'];
        $telefono = $_POST['telefono_empresaU'];
        $nombre = $_POST['nombresU'];
        $apellido = $_POST['apellidoU'];
        $dni = $_POST['dniU'];
        $celular = $_POST['telefonoU'];
        $email = $_POST['emailU'];
        $departamento = $_POST['departamentoU'];
        $provincia = $_POST['provinciaU'];
        $distrito = $_POST['distritoU'];
        $direccion = $_POST['direccionU'];
        $resulta = $metodocliente->UpdateCliente($id, $tipo, $empresa, $ruc, $telefono, $nombre, $apellido, $dni, $celular, $email, $departamento, $provincia, $distrito, $direccion);
        echo $resulta;
        break;
    case '3':
        $id = $_POST['id'];
        echo json_encode($metodocliente->GetCliente($id));
        break;
    case '4':
        echo $metodocliente->DeleteCliente($_POST['idCliente']);
        break;
    case '5':
        $id = $_POST['id'];
        echo json_encode($metodocliente->GetCliente($id));
        break;
    case '6':
        $iddepartamento=$_POST['iddepartamento'];
        echo $metodocliente->SeleccioneDepartamento($iddepartamento);
        break;
    case '7':
        $idprovincia=$_POST['idprovincia'];
        echo $metodocliente->SeleccioneProvincia($idprovincia);
        break;
    
    default:
        # code...
        break;
}
