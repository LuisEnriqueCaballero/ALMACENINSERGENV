<?php
include_once '../metodo/MetodoMarcaAuto.php';
$MetodoMarcaAuto = new MetodoMarcaauto();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $marca=isset($_POST['descripcion'])?$_POST['descripcion']:'';
        $resultado=$MetodoMarcaAuto->insertaMarca($marca);
        echo $resultado;
        break;
    case '2':
        $descripcion=$_POST['descripcionU'];
        $id=$_POST['id'];
        $resultado=$MetodoMarcaAuto->UpdateMarca($id,$descripcion);
        echo $resultado;
        break;
    case '3':
        $id=isset($_POST['idmarca'])?$_POST['idmarca']:'';
        echo json_encode($MetodoMarcaAuto->ObtenerDatos($id)); 
        break;
    case '4':
        $id=$_POST['id'];
        echo $MetodoMarcaAuto->Deletedato($_POST['id']);
        break;

    default:
        # code...
        break;
}
