<?php
class MetodoProducto{
    public function insertaProducto($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        
        $agotado=$datos[7];
        $minimo=$datos[8];
        $cantidad=$datos[6];
        if($cantidad<=$agotado){
            $estado='AGOTADO';
        }else if($cantidad<$minimo){
            $estado='MINIMO';
        }else{
            $estado='STOCK'; 
        }
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
                                   VALUE('$datos[0]',
                                         '$datos[1]',
                                         '$datos[2]',
                                         '$datos[3]',
                                         '$datos[4]',
                                         '$datos[5]',
                                         '$datos[6]',
                                         '$datos[7]',
                                         '$datos[8]',
                                         '$estado')";
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
    public function updateProducto($datos){
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        
        $agotado=$datos[7];
        $minimo=$datos[8];
        $cantidad=$datos[6];
        if($cantidad<$agotado){
            $estado='AGOTADO';
        }else if($cantidad<$minimo){
            $estado='MINIMO';
        }else{
            $estado='STOCK'; 
        }

        $sql="UPDATE producto SET 
        ID_CATEGORIA='$datos[0]',
        ID_MONEDA='$datos[1]',
        MARCAR='$datos[2]',
        NOMBRE='$datos[3]',
        PRECIO_UNITARIO='$datos[4]',
        UNIDAD_MEDIDA='$datos[5]',
        CANTIDAD_INICIAL='$datos[6]',
        SIN_STOCK='$datos[7]',
        STOCK_MINIMO='$datos[8]',
        ESTADO='$estado'
        WHERE ID_PRODUCTO='$datos[9]'";
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
