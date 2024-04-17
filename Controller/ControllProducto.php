<?php
include_once '../metodo/MetodoProducto.php';
$metodoProducto = new MetodoProducto();
$ope = isset($_GET['ope']) ? $_GET['ope'] : '';
switch ($ope) {
    case '1':
        $categoria=isset($_POST['categoria'])?$_POST['categoria']:'';
        $moneda=isset($_POST['moneda'])?$_POST['moneda']:'';
        $marca=isset($_POST['marca'])?$_POST['marca']:'';
        $producto=isset($_POST['producto'])?$_POST['producto']:'';
        $precio=isset($_POST['precio'])?number_format($_POST['precio'],2,'.',','):'0.00';
        $medida=isset($_POST['medida'])?$_POST['medida']:'';
        $cantidad=isset($_POST['cantidad'])?$_POST['cantidad']:'';
        $agotado=isset($_POST['agotado'])?$_POST['agotado']:'';
        $minimo=isset($_POST['minimo'])?$_POST['minimo']:'';
        if($agotado<$cantidad && $minimo<$cantidad){
            $estado='stock'; 
        }
        else if($cantidad<$minimo && $agotado<$cantidad){
            $estado='minimo';
        }
        else if($cantidad<$agotado){
            $estado='minimo';
        }
        $resultado=$metodoProducto->insertaProducto($categoria,$moneda,$marca,$producto,$precio,$medida,$cantidad,$agotado,$minimo,$estado);
        echo $resultado;

        break;
    case '2':
        $categoria=isset($_POST['categoriaU'])?$_POST['categoriaU']:'';
        $moneda=isset($_POST['monedaU'])?$_POST['monedaU']:'';
        $marca=isset($_POST['marcaU'])?$_POST['marcaU']:'';
        $producto=isset($_POST['productoU'])?$_POST['productoU']:'';
        $precio=isset($_POST['precioU'])?number_format($_POST['precioU'],2,'.',','):'0.00';
        $medida=isset($_POST['medidaU'])?$_POST['medidaU']:'';
        $cantidad=isset($_POST['cantidadU'])?$_POST['cantidadU']:'';
        $agotado=isset($_POST['agotadoU'])?$_POST['agotadoU']:'';
        $minimo=isset($_POST['minimoU'])?$_POST['minimoU']:'';
        $id=isset( $_POST['id'])? $_POST['id']:'';
        if($agotado<$cantidad && $minimo<$cantidad){
            $estado='stock'; 
        }
        else if($cantidad<$minimo && $agotado<$cantidad){
            $estado='minimo';
        }
        else if($cantidad<$agotado){
            $estado='minimo';
        }
        $resultado=$metodoProducto->updateProducto($id,$categoria,$moneda,$marca,$producto,$precio,$medida,$cantidad,$agotado,$minimo,$estado);
        echo $resultado;
        break;
    case '3':
        $id=isset($_POST['id'])?$_POST['id']:'';
        echo json_encode($metodoProducto->getProducto($id));
        break;
    case '4':
        $id=$_POST['idproducto'];
        echo $metodoProducto->deleteProducto($id);
        break;

    default:
        # code...
        break;
}
