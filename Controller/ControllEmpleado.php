<?php
include_once '../metodo/MetodoEmpleado.php';
$metodoempleado = new MetodoEmpleado();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $document=isset($_POST['DOCUMENTO'])?$_POST['DOCUMENTO']:'';
        $numero=isset($_POST['NUMERO'])?$_POST['NUMERO']:'';
        $nombre=isset($_POST['NOMBRE'])?$_POST['NOMBRE']:'';
        $apellido=isset($_POST['APELLIDO'])?$_POST['APELLIDO']:'';
        $edad=isset($_POST['EDAD'])?$_POST['EDAD']:'';
        $sexo=isset($_POST['SEXO'])?$_POST['SEXO']:'';
        $telefono=isset($_POST['TELEFONO'])?$_POST['TELEFONO']:'';
        $celular=isset($_POST['CELULAR'])?$_POST['CELULAR']:'';
        $area=isset($_POST['AREA'])?$_POST['AREA']:'';
        $departamento=isset($_POST['DEPARTAMENTO'])?$_POST['DEPARTAMENTO']:'';
        $provincia=isset($_POST['PROVINCIA'])?$_POST['PROVINCIA']:'';
        $distrito=isset($_POST['DISTRITO'])?$_POST['DISTRITO']:'';
        $direccion=isset($_POST['DIRECCION'])?$_POST['DIRECCION']:'';
        $hijo=isset($_POST['HIJO'])?$_POST['HIJO']:'';
        $planilla=isset($_POST['PLANILLA'])?$_POST['PLANILLA']:'';
        $fecha_nacim=isset($_POST['FECHA_CUMPLE'])?$_POST['FECHA_CUMPLE']:'';
        $fehc_ingre=isset($_POST['FECHA_INGRESO'])?$_POST['FECHA_INGRESO']:'';
        $banco=isset($_POST['BANCO'])?$_POST['BANCO']:'';
        $cuenta=isset($_POST['CUENTA'])?$_POST['CUENTA']:'';
        $estado=isset($_POST['ESTADO'])?$_POST['ESTADO']:'';
        $resulta=$metodoempleado->InsertEmpleado($document,$numero,$nombre,$apellido,$edad,$sexo,$telefono,$celular,$area,$departamento,$provincia,$distrito,$direccion,$hijo,$planilla,$fecha_nacim,$fehc_ingre,$banco,$cuenta,$estado);
        echo $resulta;
        break;
    case '2':
        $document=$_POST['DOCUMENTOU'];
        $numero=$_POST['NUMEROU'];
        $nombre=$_POST['NOMBREU'];
        $apellido=$_POST['APELLIDOU'];
        $edad=$_POST['EDADU'];
        $sexo=$_POST['SEXOU'];
        $telefono=$_POST['TELEFONOU'];
        $celular=$_POST['CELULARU'];
        $area=$_POST['AREAU'];
        $departamento=$_POST['DEPARTAMENTOU'];
        $provincia=$_POST['PROVINCIAU'];
        $distrito=$_POST['DISTRITOU'];
        $direccion=$_POST['DIRECCIONU'];
        $hijo=$_POST['HIJOU'];
        $planilla=$_POST['PLANILLAU'];
        $fecha_nacim=$_POST['FECHA_CUMPLEU'];
        $fehc_ingre=$_POST['FECHA_INGRESOU'];
        $banco=$_POST['BANCOU'];
        $cuenta=$_POST['CUENTAU'];
        $estado=$_POST['ESTADOU'];
        $id=$_POST['id'];
        $resulta=$metodoempleado->UpdateEmpleado($id,$document,$numero,$nombre,$apellido,$edad,$sexo,$telefono,$celular,$area,$departamento,$provincia,$distrito,$direccion,$hijo,$planilla,$fecha_nacim,$fehc_ingre,$banco,$cuenta,$estado);
        echo $resulta;
        break;
    case '3':
        $idempleado=isset($_POST['id'])?$_POST['id']:'';
        echo json_encode($metodoempleado->GetEmpleado($idempleado));
        break;
    case '4':
        $idempleado=$_POST['idEmpleado'];
        echo $metodoempleado->DeleteEmpleado($idempleado);
        break;
    case '5':
        $idempleado=isset($_POST['id'])?$_POST['id']:'';
        echo json_encode($metodoempleado->GetEmpleado($idempleado));
        break;

    default:
        # code...
        break;
}
