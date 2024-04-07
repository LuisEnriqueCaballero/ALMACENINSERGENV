<?php
include_once '../metodo/MetodoProcedimiento.php';
$MetodoProcedimiento = new SubProcesoMetodo();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $proceso=isset($_POST['proceso'])?$_POST['proceso']:'';
        $subproceso=isset($_POST['subproceso'])?$_POST['subproceso']:'';
        $resultado=$MetodoProcedimiento->InsertDatos($proceso,$subproceso);
        echo $resultado;
        break;
    case '2':
        $proceoso=$_POST['procesoU'];
        $subproceso=$_POST['subprocesoU'];
        $id=$_POST['id'];
        $resultado=$MetodoProcedimiento->Updatedatos($id,$proceoso,$subproceso);
        echo $resultado;
        break;
    case '3':
        $id=isset($_POST['idsubproceso'])?$_POST['idsubproceso']:'';
        echo json_encode($MetodoProcedimiento->Obtenerdatos($id));
        break;
    case '4':
        $id=$_POST['id'];
        echo $MetodoProcedimiento->Eliminardato($id);
        break;

    default:
        # code...
        break;
}
