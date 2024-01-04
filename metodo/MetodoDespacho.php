<?php
class Despacho
{
    public function SelcProducto($id)
    {
        $conexion = new Conexion();
        $cnx = $conexion->Conectar();

        $consulta = "SELECT PRECIO_UNITARIO,CANTIDAD_INICIAL FROM producto WHERE ID_PRODUCTO='$id'";
        $QUERY = mysqli_query($cnx, $consulta);

        $ver = mysqli_fetch_array($QUERY);
        $datos = array(
            'PRECIO_UNITARIO' => $ver[0],
            'CANTIDAD_INICIAL' => $ver[1],
        );
        return $datos;
    }
    public function CrearSalida()
    {
        $conexion = new Conexion();
        $cnx = $conexion->Conectar();
        $fecha = date('Y-m-d');
        $idsalida = self::crearFolio();
        $datos = $_SESSION['listaproductotemp'];
        $r = 0;
        for ($i = 0; $i < count($datos); $i++) {
            $d = explode('||', $datos[$i]);
            $sql = "INSERT INTO salida_material(ID_VENTA,
                                              ID_TRABAJADOR,
                                              ID_VEHICULO,
                                              ID_PRODUCTO,
                                              CANTIDAD,
                                              PRECIO_UNITARIO,
                                              ID_PROCESO,
                                              MATENIMIENTO,
                                              COMENTARIO,
                                              FECHA_SALIDA)
                                        VALUE('$idsalida',
                                              '$d[1]',
                                              '$d[2]',
                                              '$d[0]',
                                              '$d[4]',
                                              '$d[3]',
                                              '$d[6]',
                                              '$d[7]',
                                              '$d[8]',
                                              '$fecha'
                                              )";
            $r = $r + $query = mysqli_query($cnx, $sql);

            self::descuentoproducto($d[0], $d[4]);
        }
        return $r;
    }
    public function crearFolio()
    {
        $conexion = new Conexion();
        $cnx = $conexion->Conectar();

        $sql = "SELECT ID_VENTA FROM salida_material GROUP BY ID_VENTA DESC";
        $query = mysqli_query($cnx, $sql);
        $id = mysqli_fetch_row($query)[0];

        if ($id == '' or $id == 'null' or $id == 0) {
            return 1;
        } else {
            return $id + 1;
        }
    }
    public function descuentoproducto($idproducto, $cantidadresta)
    {
        $conexion = new Conexion();
        $cnx = $conexion->Conectar();

        $sql = "SELECT CANTIDAD_INICIAL FROM producto WHERE ID_PRODUCTO='$idproducto'";

        $query = mysqli_query($cnx, $sql);
        $stock = mysqli_fetch_array($query)['0'];
        $nuevostock = abs($stock - $cantidadresta);
        $sql1 = "UPDATE producto SET CANTIDAD_INICIAL='$nuevostock' WHERE ID_PRODUCTO='$idproducto'";
        // mysqli_query($cnx, $sql1);
        if (mysqli_query($cnx, $sql1)) {
            $sql2 = "SELECT SIN_STOCK,STOCK_MINIMO,CANTIDAD_INICIAL FROM producto WHERE ID_PRODUCTO='$idproducto'";
            $query1 = mysqli_query($cnx, $sql2);
            while ($row = mysqli_fetch_row($query1)) {
                $sin_stock = $row[0];
                $minimo = $row[1];
                $cantidad = $row[2];
            }
            if ($cantidad <= $sin_stock) {
                $estado = 'AGOTADO';
            } else if ($cantidad <= $minimo) {
                $estado = 'MEDIO';
            } else {
                $estado = 'STOCK';
            }
            $sql3 = "UPDATE producto SET ESTADO='$estado' WHERE ID_PRODUCTO='$idproducto'";
            mysqli_query($cnx, $sql3);
        }
    }

    public function BuscarConsulta($datos)
    {
        $conexion = new Conexion();
        $cnx = $conexion->Conectar();

        $sql = "SELECT TA.DESCRIPCION,TVE.NUMERO_PLACA,CONCAT(TMA.MARCA,' ',TMO.MODELO),CONCAT(TPRO.NOMBRE,' ',TPRO.MARCAR),
               CONCAT(TMONE.SIMBOLO,'',TSM.PRECIO_UNITARIO),TSM.CANTIDAD,
               (TSM.PRECIO_UNITARIO*TSM.CANTIDAD) AS TOTAL,TMONE.id_moneda
               FROM salida_material AS TSM
               INNER JOIN trabajadore AS TEM ON TSM.ID_TRABAJADOR=TEM.ID_TRABAJADOR
               INNER JOIN area as TA on TA.ID_AREA=TEM.AREA_TRABAJO
INNER JOIN producto AS TPRO ON TSM.ID_PRODUCTO=TPRO.ID_PRODUCTO
INNER JOIN tipomoneda AS TMONE ON TPRO.ID_MONEDA=TMONE.id_moneda
INNER JOIN proceso_auto AS TPROA ON TSM.ID_PROCESO=TPROA.ID_PROCESO
INNER JOIN vehiculo AS TVE ON TSM.ID_VEHICULO=TVE.ID_VEHICULO
INNER JOIN marcasauto AS TMA ON TVE.ID_MARCAR=TMA.ID_MARCA
INNER JOIN modeloauto AS TMO ON TVE.ID_MODELO=TMO.ID_MODELO
WHERE TVE.NUMERO_PLACA LIKE '$datos[3]%' AND TPRO.NOMBRE LIKE '$datos[2]%'  AND (TSM.FECHA_SALIDA BETWEEN '$datos[0]' AND '$datos[1]')
group by CONCAT(TPRO.NOMBRE,' ',TPRO.MARCAR),CONCAT(TMONE.SIMBOLO,'',TSM.PRECIO_UNITARIO), TVE.NUMERO_PLACA,TA.DESCRIPCION";

        $query = mysqli_query($cnx, $sql);

        $resultado = '<table class="table table-sm table-bordered" id="example">
<thead>
    <tr>
       
        <th scope="col" class="text-center">AREA TRABAJO</th>
        <th scope="col" class="text-center">PLACA</th>
        <th scope="col" class="text-center">VEHICULO</th>
        <th scope="col" class="text-center">PRODUCTO</th>
        <th scope="col" class="text-center">PRECIO UNITARIO</th>
        <th scope="col" class="text-center">CANTIDAD</th>
        <th scope="col" class="text-center">TOTAL</th>
    </tr>
</thead>
<tbody>';
       $totalSoles=0.0;
       $totalDolares=0.0;
        while ($ver = mysqli_fetch_row($query)) {
            $resultado = $resultado . '<tr>
    <td>' . $ver[0] . '</td>
    <td>' . $ver[1] . '</td>
    <td>' . $ver[2] . '</td>
    <td>' . $ver[3] . '</td>
    <td>' . $ver[4] . '</td>
    <td>' . $ver[5] . '</td>
    <td>' . $ver[6] . '</td>
    </tr>';
    if($ver[7]==1){
        $totalSoles+=$ver[6];
    }else if($ver[7]==2){
        $totalDolares+=$ver[6];
    }
        }
        return $resultado.'<tr>
        <td> TOTAL EN DOLARES $/.' .$totalDolares.' </td>
        <td> </td>
        <td> </td>
        <td> TOTAL EN SOLES S/.' . $totalSoles .'</td>
        <td> </td>
        <td> </td>
        <td> </td>
    </tr>
        </tbody></table>';
    }

}
?>