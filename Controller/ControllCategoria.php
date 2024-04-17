<?php
include_once '../metodo/MetodoCategoria.php';
$metodocategoria = new MetodoCatgoria();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $categoria=isset($_POST['descripcion'])?$_POST['descripcion']:'null';
        $resul=$metodocategoria->insertaCategoria($categoria);
        echo 1;
        break;
    case '2':
        $id=isset($_POST['id'])?$_POST['id']:'null';
        $categoria=isset($_POST['descripcionU'])?$_POST['descripcionU']:'null';
        $resul=$metodocategoria->updateCategoria($id,$categoria);
        echo $resul;
        break;
    case '3':
        $id=isset($_POST['id'])?$_POST['id']:'null';
        echo json_encode($metodocategoria->getCategoria($id));
        break;
    case '4':
        $id=$_POST['idcategoria'];
        $result=$metodocategoria->deleteCategoria($id);
        echo $result;
        break;

    default:
        # code...
        break;
}
