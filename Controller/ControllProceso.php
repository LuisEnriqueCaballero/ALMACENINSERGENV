<?php
include_once '../metodo/MetodoProcesoauto.php';
$metodoproceso=new MetodoProcesoauto();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $descripcion=isset($_POST['descripcion'])?$_POST['descripcion']:'';
        $result=$metodoproceso->nuevoproceso($descripcion);
        echo $result;
        break;
    case '2':
        $descripcion=$_POST['descripcionU'];
        $id=$_POST['id'];
        $result=$metodoproceso->actualizadatos($descripcion,$id);
        echo $result;
        break;
    case '3':
        $idproceso=isset($_POST['id'])?$_POST['id']:'';
        echo json_encode($metodoproceso->obtenerdatos($idproceso));
        break;
    case '4':
        $idproceso=$_POST['idproceso'];
        $resultado=$metodoproceso->Eliminar($idproceso);
        echo $resultado;
        break;

    default:
        # code...
        break;
}
