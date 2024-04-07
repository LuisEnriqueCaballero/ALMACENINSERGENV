<?php
include_once '../metodo/MetodoUnidad.php';
$MetodoUnidad = new MetodoUnidad();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $description=isset($_POST['descripcion'])?$_POST['descripcion']:'';
        $resultado=$MetodoUnidad->InsertUnidad($description);
        echo $resultado;
        break;
    case '2':
        $description=$_POST['descripcionU'];
        $id=$_POST['id'];
        $resultado=$MetodoUnidad->UpdateUnidad($id,$description);
        echo $resultado;
        break;
    case '3':
        $id=isset($_POST['id'])?$_POST['id']:'';
        echo json_encode($MetodoUnidad->GetUnidad($id));
        break;
    case '4':
        $id=$_POST['idUnidad'];
        echo $MetodoUnidad->DeleteUnidad($id);
        break;

    default:
        # code...
        break;
}
