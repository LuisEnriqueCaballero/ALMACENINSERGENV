<?php
class Compra
{
    public function ObtenerdatoEmpresa($idempresa)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $sql = "SELECT RUC FROM proveedor WHERE ID_PROVEEDOR='$idempresa'";

        $query = mysqli_query($con, $sql);

        $ver = mysqli_fetch_row($query);

        $datos = array(
            'RUC' => $ver[0]
        );
        return $datos;
    }

    public function CrearCompra()
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();
        $fecha = date('Y-m-d');
        $id_entrada = self::Crearfolio();
        $datos = $_SESSION['listacompratemp'];
        $r = 0;
        for ($i = 0; $i < count($datos); $i++) {
            $d = explode('||', $datos[$i]);
            $sql = "INSERT  INTO compra(
                id_compra,
                id_proveedor,
                recibo,
                numero_serie,
                formpago,
                id_moneda,
                id_estado_pago,
                id_producto,
                precio_unitario,
                cantidad,
                MOTIVO,
                fecha)
                VALUES('$id_entrada',
                       '$d[0]',
                       '$d[1]',
                       '$d[2]',
                        0,
                       '$d[3]',
                        0,
                       '$d[4]',
                       '$d[6]',
                       '$d[7]',
                       '$d[8]',
                       '$fecha')";
            $r = $r + $query = mysqli_query($con, $sql);
            self::InsertarProducto($d[4], $d[7], $d[6], $d[3], $fecha);
        }
        return $r;
    }
    public function InsertarProducto($idproducto, $cantidad, $precio, $moneda, $fecha)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();
        $consulta = "INSERT INTO almacen(ID_PRODUCTO,CANTIDAD,PRECIO,ID_MONEDA,FECHA) VALUES('$idproducto','$cantidad','$precio','$moneda','$fecha')";
        $query = mysqli_query($con, $consulta);

    }

    public function Crearfolio()
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();
        $sql = 'SELECT id_compra FROM compra GROUP BY id_compra DESC';

        $query = mysqli_query($con, $sql);
        $id = mysqli_fetch_row($query)[0];

        if ($id == '' or $id == 'null' or $id == 0) {
            return 1;
        } else {
            return $id + 1;
        }
    }
    public function OBTENERDATOS($idcompra)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();
        $sql = "SELECT id_compra,formpago,id_estado_pago,fecha_cancelado FROM compra WHERE id_compra='$idcompra'";

        $query = mysqli_query($con, $sql);
        $ver = mysqli_fetch_row($query);

        $datos = array(
            'id_compra' => $ver[0],
            'formpago' => $ver[1],
            'id_estado_pago' => $ver[2],
            'fecha_cancelado' => $ver[3]
        );
        return $datos;
    }

    public function Actualizardatos($datos)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $sql = "UPDATE compra SET formpago='$datos[0]',id_estado_pago='$datos[1]',fecha_cancelado='$datos[2]' WHERE id_compra='$datos[3]'";

        return mysqli_query($con, $sql);
    }

    public function BuscarFecha($datos)
    {
        $conexion = new Conexion();
        $cnx = $conexion->Conectar();

        $sql = "SELECT TCO.id,TPRO.EMPRESA,TPROD.NOMBRE,TPROD.MARCAR,TCO.cantidad,CONCAT(TMONE.SIMBOLO,'',TCO.precio_unitario),
CONCAT(TMONE.SIMBOLO,'',TCO.cantidad*TCO.precio_unitario),DATE_FORMAT(TCO.fecha, '%d/%m/%Y') FROM compra AS TCO
LEFT JOIN proveedor AS TPRO ON TCO.id_proveedor=TPRO.ID_PROVEEDOR
LEFT JOIN producto AS TPROD ON TCO.id_producto=TPROD.ID_PRODUCTO
LEFT JOIN tipomoneda AS TMONE ON TCO.id_moneda=TMONE.id_moneda
WHERE TCO.fecha BETWEEN '$datos[0]' AND '$datos[1]'
ORDER BY TCO.fecha";
        $query = mysqli_query($cnx, $sql);
        $resulta = '<table class="table table-sm table-bordered" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">FECHA INGRESO</th>
                        <th scope="col" class="text-center">EMPRESA</th>
                        <th scope="col" class="text-center">PRODUCTO</th>
                        <th scope="col" class="text-center">MARCA</th>
                        <th scope="col" class="text-center">CANTIDAD</th>
                        <th scope="col" class="text-center">PRECIO</th>
                        <th scope="col" class="text-center">TOTAL</th>

                    </tr>
                </thead>
                <tbody>';
        while ($ver = mysqli_fetch_array($query)) {
            $resulta= $resulta.'<tr>
                            <td>'
                . $ver[7] .
                '</td>
                            <td>'
                . $ver[1] .
                '</td>
                            <td>'
                . $ver[2] .
                '</td>
                            <td>'
                . $ver[3] .
                '</td>
                            <td>'
                . $ver[4] .
                '</td>
                            <td>'
                . $ver[5] .
                '</td>
                            <td>'
                . $ver[6] .
                '</td>
                        </tr>';

        }
        return $resulta .'</tbody></table>';

    }

}