<?php
class Almacenprincipal{
    public function GetProducto($id)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $consulta = "SELECT TAL.ID_ALMACEN,CONCAT(TPRO.NOMBRE,' ',TPRO.MARCAR),
        TAL.PRECIO,TAL.CANTIDAD,TMO.descripcion_moneda,
        TPRO.ID_PRODUCTO,
        TMO.id_moneda
        ,DATE_FORMAT(TAL.FECHA, '%d %m %Y') FROM almacen AS TAL
        INNER JOIN producto AS TPRO ON TAL.ID_PRODUCTO=TPRO.ID_PRODUCTO
        INNER JOIN tipomoneda AS TMO ON TAL.ID_MONEDA=TMO.id_moneda
        WHERE TAL.ID_ALMACEN='$id'";
        $QUERY = mysqli_query($con, $consulta);
        $ver = mysqli_fetch_array($QUERY);
        $datos = array(
            'IDALMACEN' => $ver[0],
            'IDPRODUCTO' => $ver[5],
            'IDMONEDA' => $ver[6],
            'PRODUCTO' => $ver[1],
            'CANTIDAD' => $ver[3],
            'PRECIO' => $ver[2],
        );
        return $datos;
    }
    public function CrearSalida()
    {
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();
        $fecha = date('Y-m-d');
        $idsalida = self::crearFolio();
        $datos = $_SESSION['listaproductotemp'];
        $r = 0;
        for ($i = 0; $i < count($datos); $i++) {
            $d = explode('||', $datos[$i]);
            $sql = "INSERT INTO salidaalmacenprincipal
            (ID_SALIDA,
            ID_ALMACE,
            ID_MONEDA,
            ID_PRODUCTO,
            CANTIDAD,
            PRECIO,
            FECHA_SALIDA)
            VALUES('$idsalida',
                   '$d[0]',
                   '$d[2]',
                   '$d[1]',
                   '$d[5]',
                   '$d[4]',
                   '$fecha')";
            $r = $r + $query = mysqli_query($cnx, $sql);

            self::descuentoproducto($d[0],$d[1],$d[4],$d[5]);
           
        }
        return $r;
    }
    public function crearFolio()
    {
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql = "SELECT ID_SALIDA FROM salidaalmacenprincipal ORDER BY ID_SALIDA DESC";
        $query = mysqli_query($cnx, $sql);
        $id = mysqli_fetch_row($query)[0];

        if ($id == '' or $id == 'null' or $id == 0) {
            return 1;
        } else {
            return $id + 1;
        }
    }
    public function descuentoproducto($idalmacen,$idproducto,$precio,$cantidad)
    {
        $conexion=new Conexion();
        $cnx=$conexion->Conectar();

        $sql = "SELECT CANTIDAD FROM almacen WHERE ID_ALMACEN='$idalmacen'";
        $query = mysqli_query($cnx, $sql);
        $stock=mysqli_fetch_array($query)['0'];
        $nuevostock = abs($stock - $cantidad);
        $sql1 = "UPDATE almacen SET CANTIDAD='$nuevostock' WHERE ID_ALMACEN='$idalmacen'";
        if(mysqli_query($cnx, $sql1)){
            $sql2="SELECT SIN_STOCK,STOCK_MINIMO,CANTIDAD_INICIAL FROM producto WHERE ID_PRODUCTO='$idproducto'";
            $query1 = mysqli_query($cnx, $sql2);
            while($row=mysqli_fetch_row($query1)){
            $sin_stock=$row[0];
            $minimo=$row[1];
            $cantidadP=$row[2];
           }
           $nuevaCantidad=abs($cantidadP + $cantidad);
           if( $nuevaCantidad<=$sin_stock){
            $estado='AGOTADO';
           }else if($nuevaCantidad<=$minimo){
            $estado='MEDIO';
           }else{
            $estado='STOCK';
           }
           $sql3="UPDATE producto SET ESTADO='$estado',PRECIO_UNITARIO='$precio',CANTIDAD_INICIAL='$nuevaCantidad' WHERE ID_PRODUCTO='$idproducto'";
           mysqli_query($cnx, $sql3);
        }
    } 
}
?>