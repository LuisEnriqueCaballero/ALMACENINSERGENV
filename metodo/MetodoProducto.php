<?php
include_once '../config/config.php';
class MetodoProducto{
    public function insertaProducto($categoria,$moneda,$marca,$producto,$precio,$medida,$cantidad,$agotado,$minimo,$estado){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="INSERT INTO producto(ID_CATEGORIA,
                                   ID_MONEDA,
                                   MARCAR,
                                   NOMBRE,
                                   PRECIO_UNITARIO,
                                   UNIDAD_MEDIDA,
                                   CANTIDAD_INICIAL,
                                   SIN_STOCK,
                                   STOCK_MINIMO,
                                   ESTADO)
                                   VALUE('$categoria','$moneda','$marca','$producto','$precio','$medida','$cantidad','$agotado','$minimo','$estado')";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }
    public function getProducto($idproducto){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="SELECT ID_PRODUCTO,
                     ID_CATEGORIA,
                     ID_MONEDA,
                     MARCAR,
                     NOMBRE,
                     PRECIO_UNITARIO,
                     UNIDAD_MEDIDA,
                     CANTIDAD_INICIAL,
                     SIN_STOCK,
                     STOCK_MINIMO,
                     ESTADO
                      FROM producto WHERE ID_PRODUCTO ='$idproducto'";
        $query=mysqli_query($cnx,$sql);
        $ver=mysqli_fetch_array($query);
        $datos=array(
            'ID_PRODUCTO'=>$ver[0],
            'ID_CATEGORIA'=>$ver[1],
            'ID_MONEDA'=>$ver[2],
            'MARCAR'=>$ver[3],
            'NOMBRE'=>$ver[4],
            'PRECIO_UNITARIO'=>$ver[5],
            'UNIDAD_MEDIDA'=>$ver[6],
            'CANTIDAD_INICIAL'=>$ver[7],
            'SIN_STOCK'=>$ver[8],
            'STOCK_MINIMO'=>$ver[9],
            'ESTADO'=>$ver[10]
        );
        return $datos;
    }
    public function updateProducto($id,$categoria,$moneda,$marca,$producto,$precio,$medida,$cantidad,$agotado,$minimo,$estado){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="UPDATE producto SET 
        ID_CATEGORIA='$categoria',
        ID_MONEDA='$moneda',
        MARCAR='$marca',
        NOMBRE='$producto',
        PRECIO_UNITARIO='$precio',
        UNIDAD_MEDIDA='$medida',
        CANTIDAD_INICIAL='$cantidad',
        SIN_STOCK='$agotado',
        STOCK_MINIMO='$minimo',
        ESTADO='$estado'
        WHERE ID_PRODUCTO='$id'";
        $query=mysqli_query($cnx,$sql);
        return $query;
    }

    public function deleteProducto($idproducto){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $sql="DELETE FROM producto WHERE ID_PRODUCTO ='$idproducto'";
        $query=mysqli_query($cnx,$sql);
        return $query;

    }
} 
?>
