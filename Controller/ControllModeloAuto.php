<?php
include_once '../metodo/MetodoModeloAuto.php';
$MetodoModeloAuto = new MetodoModeloauto();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $marca=isset($_POST['marca'])?$_POST['marca']:'';
        $modelo=isset($_POST['modelo'])?$_POST['modelo']:'';
        $resultado=$MetodoModeloAuto->insertaModelo($marca,$modelo);
        echo $resultado;
        break;
    case '2':
        $marca=$_POST['marcaU'];
        $modelo=$_POST['modeloU'];
        $id=$_POST['id'];
        $resultado=$MetodoModeloAuto->UpdateModelo($id,$marca,$modelo);
        echo $resultado;
        break;
    case '3':
        $id=isset($_POST['idmodelo'])?$_POST['idmodelo']:'';
        echo json_encode($MetodoModeloAuto->ObtenerDatos($id)); 
        break;
    case '4':
        $id=$_POST['id'];
        echo $MetodoModeloAuto->Deletedato($id); 
        break;

    default:
        # code...
        break;
}
