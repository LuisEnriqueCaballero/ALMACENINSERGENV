<?php
include_once '../metodo/MetodoTransformacion.php';
$metodotransformacion = new MetodoTransformacion();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $vehiculo=isset($_POST['vehiculo'])?$_POST['vehiculo']:'';
        $proceso=isset($_POST['proceso'])?$_POST['proceso']:'';
        $subpro=isset($_POST['subprocedimiento'])?$_POST['subprocedimiento']:'';
        $fech=isset($_POST['fecha_inicio'])?$_POST['fecha_inicio']:'';
        $resulta=$metodotransformacion->nuevoprocedimiento($vehiculo,$proceso,$subpro,$fech);
        echo $resulta;
        break;
    case '2':
        $vehiculo=$_POST['vehiculoU'];
        $proceso=$_POST['procesoU'];
        $subpro=$_POST['subprocedimientoU'];
        $fech=$_POST['fecha_inicioU'];
        $fech_fin=$_POST['fecha_finalU'];
        $id=$_POST['id'];
        $resulta=$metodotransformacion->actualizadatos($id,$vehiculo,$proceso,$subpro,$fech,$fech_fin);
        echo $resulta;
        break;
    case '3':
        $idtrans=isset($_POST['id'])?$_POST['id']:'';
        echo json_encode($metodotransformacion->obtenerdatos($idtrans));
        break;
    default:
        # code...
        break;
}
