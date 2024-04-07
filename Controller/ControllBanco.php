<?php
include_once '../metodo/MetodoBanco.php';
$MetodoBanco = new MetodoBanco();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $banco=isset($_POST['descripcion'])?$_POST['descripcion']:'';
        $resultado=$MetodoBanco->insertaBanco($banco);
        echo $resultado;
        break;
    case '2':
        $banco=$_POST['descripcionU'];
        $id=$_POST['id'];
        $resultado=$MetodoBanco->UpdateBanco($id,$banco);
        echo $resultado;
        break;
    case '3':
        $id=isset($_POST['id'])?$_POST['id']:'';
        echo json_encode($MetodoBanco->ObtenerDatos($id)); 
        break;
    case '4':
        $id=$_POST['idbanco'];
        echo $MetodoBanco->Deletedato($id);
        break;
    default:
        # code...
        break;
}
