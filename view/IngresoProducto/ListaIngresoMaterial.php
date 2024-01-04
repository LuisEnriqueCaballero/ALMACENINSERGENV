<?php
include_once "../../config/config.php";
$conexion = new Conexion();
$cnx = $conexion->Conectar();

$sql = "SELECT TCO.id,TPRO.EMPRESA,TPROD.NOMBRE,TPROD.MARCAR,TCO.cantidad,CONCAT(TMONE.SIMBOLO,'',TCO.precio_unitario),
CONCAT(TMONE.SIMBOLO,'',TCO.cantidad*TCO.precio_unitario),DATE_FORMAT(TCO.fecha, '%d/%m/%Y') FROM compra AS TCO
LEFT JOIN proveedor AS TPRO ON TCO.id_proveedor=TPRO.ID_PROVEEDOR
LEFT JOIN producto AS TPROD ON TCO.id_producto=TPROD.ID_PRODUCTO
LEFT JOIN tipomoneda AS TMONE ON TCO.id_moneda=TMONE.id_moneda
ORDER BY TCO.fecha";
$query = mysqli_query($cnx, $sql);
?>

<div class="inf_inserngev">
    <h1>INGRESO MATERIALES</h1>
    <div class="panel_proceso">
        <div class="form-row d-flex justify-content-between">
            <div class="col-md-9  d-flex">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">desde</label>
                    <input type="date" class="form-control" id="desde">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">hasta</label>
                    <input type="date" class="form-control" id="hasta">
                </div>
            </div>
            <div class="boton form-group col-md-3 d-flex align-items-end justify-content-end">
                <a href="formularioEntradaProducto.php" type="button" class="btn btn-outline-primary">
                    <img src="../asset/add-file-12-svgrepo-com.svg" alt="">
                    <span>Nuevo Compra</span>
                </a>
            </div>
        </div>

        <div class="basedato" id="basedatoIN">
            <table class="table table-sm table-bordered" id="example">
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
                <tbody>
                    <?php

                    while ($ver = mysqli_fetch_array($query)) {

                        ?>
                        <tr>
                            <td>
                                <?php echo $ver[7] ?>
                            </td>
                            <td>
                                <?php echo $ver[1] ?>
                            </td>
                            <td>
                                <?php echo $ver[2] ?>
                            </td>
                            <td>
                                <?php echo $ver[3] ?>
                            </td>
                            <td>
                                <?php echo $ver[4] ?>
                            </td>
                            <td>
                                <?php echo $ver[5] ?>
                            </td>
                            <td>
                                <?php echo $ver[6] ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#desde').change(function () {
            $.ajax({
                type: 'POST',
                data: 'idfechaincio=' + $('#desde').val() +
                    '&idfechafin=' + $('#hasta').val(),
                url: '../proceso/CompraMateriales/desde.php',
                success: function (r) {
                    $('#basedatoIN').html(r)
                }
            })
        })
    })
    $(document).ready(function () {
        $('#hasta').change(function () {
            $.ajax({
                type: 'POST',
                data: 'idfechaincio=' + $('#desde').val() +
                    '&idfechafin=' + $('#hasta').val(),
                url: '../proceso/CompraMateriales/desde.php',
                success: function (r) {
                    $('#basedatoIN').html(r)
                }
            })
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({

        });
    });
</script>