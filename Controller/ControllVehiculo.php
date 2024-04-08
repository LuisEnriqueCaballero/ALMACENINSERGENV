<?php
include_once '../metodo/MetodoVehiculo.php';
$metodovehiculo = new MetodoVehiculo();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $id_cliente=isset($_POST['CLIENTE'])?$_POST['CLIENTE']:'';
        $placa=isset($_POST['PLACA'])?$_POST['PLACA']:'';
        $marca=isset($_POST['MARCA'])?$_POST['MARCA']:'';
        $modelo=isset($_POST['MODELO'])?$_POST['MODELO']:'';
        $color=isset($_POST['COLOR'])?$_POST['COLOR']:'';
        $motor=isset($_POST['MOTOR'])?$_POST['MOTOR']:'';
        $vin=isset($_POST['VIN'])?$_POST['VIN']:'';
        $chasis=isset($_POST['CHASIS'])?$_POST['CHASIS']:'';
        $combustible=isset($_POST['COMBUSTIBLE'])?$_POST['COMBUSTIBLE']:'';
        $vehiculo=isset($_POST['VEHICULO'])?$_POST['VEHICULO']:'';
        $ingreso=isset($_POST['INGRESO'])?$_POST['INGRESO']:'';
        $fabricacion=isset($_POST['FABRICACION'])?$_POST['FABRICACION']:'';
        $anio=isset($_POST['ANIO_MODELO'])?$_POST['ANIO_MODELO']:'';
        $estado=isset($_POST['ESTADO'])?$_POST['ESTADO']:'';
        $resultado=$metodovehiculo->InsertVehiculo($id_cliente,$placa,$marca,$modelo,$color,$motor,$vin,$chasis,$combustible,$vehiculo,$ingreso,$fabricacion,$anio,$estado);
        echo $resultado;
        break;
    case '2':
        $id_cliente=$_POST['CLIENTEU'];
        $placa=$_POST['PLACAU'];
        $marca=$_POST['MARCAU'];
        $modelo=$_POST['MODELOU'];
        $color=$_POST['COLORU'];
        $motor=$_POST['MOTORU'];
        $vin=$_POST['VINU'];
        $chasis=$_POST['CHASISU'];
        $combustible=$_POST['COMBUSTIBLEU'];
        $vehiculo=$_POST['VEHICULOU'];
        $ingreso=$_POST['INGRESOU'];
        $fabricacion=$_POST['FABRICACIONU'];
        $anio=$_POST['ANIO_MODELOU'];
        $estado=$_POST['ESTADOU'];
        $id=$_POST['ID'];
        $resultado=$metodovehiculo->UpdateVehiculo($id,$id_cliente,$placa,$marca,$modelo,$color,$motor,$vin,$chasis,$combustible,$vehiculo,$ingreso,$fabricacion,$anio,$estado);
        echo $resultado;
        break;
    case '3':
        $id=isset($_POST['id'])?$_POST['id']:'';
        echo json_encode($metodovehiculo->GetVehiculo($id));
        break;
    case '4':
        $id=$_POST['idVehiculo'];
        echo $metodovehiculo->DeleteVehiculo($id);
        break;
    case '5':
        $id=isset($_POST['id'])?$_POST['id']:'';
        echo json_encode($metodovehiculo->GetVehiculo($id));
        break;

    default:
        # code...
        break;
}
