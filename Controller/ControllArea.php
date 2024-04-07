<?php
include_once '../metodo/MetodoAreaTrabajo.php';
$MetodoArea = new MetodoAreaTrabajo();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $description=isset($_POST['descripcion'])?$_POST['descripcion']:'';
        $resultado=$MetodoArea->InsertArea($description);
        echo $resultado;
        break;
    case '2':
        $description=$_POST['descripcionU'];
        $id=$_POST['ID'];
        $resultado=$MetodoArea->UpdateArea($id,$description);
        echo $resultado;
        break;
    case '3':
        $id=isset($_POST['id'])?$_POST['id']:'';
        echo json_encode($MetodoArea->GetArea($id));
        break;
    case '4':
        $id=$_POST['idarea'];
        echo $MetodoArea->DeleteArea($id);
        break;

    default:
        # code...
        break;
}
