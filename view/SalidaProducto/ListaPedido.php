<?php
include_once "../../config/config.php";
$conexion = new Conexion();
$cnx = $conexion->Conectar();

$sql = "SELECT TA.DESCRIPCION,
TVE.NUMERO_PLACA,
CONCAT(TMA.MARCA,' ',TMO.MODELO),
CONCAT(TPRO.NOMBRE,' ',TPRO.MARCAR), 
CONCAT(TMONE.SIMBOLO,'',TSM.PRECIO_UNITARIO),
SUM(TSM.CANTIDAD),
(TSM.PRECIO_UNITARIO*SUM(TSM.CANTIDAD)) AS TOTAL,
TMONE.id_moneda FROM salida_material
 AS TSM INNER JOIN trabajadore AS TEM ON TSM.ID_TRABAJADOR=TEM.ID_TRABAJADOR 
 INNER JOIN area as TA on TA.ID_AREA=TEM.AREA_TRABAJO 
 INNER JOIN producto AS TPRO ON TSM.ID_PRODUCTO=TPRO.ID_PRODUCTO 
 INNER JOIN tipomoneda AS TMONE ON TPRO.ID_MONEDA=TMONE.id_moneda 
 INNER JOIN proceso_auto AS TPROA ON TSM.ID_PROCESO=TPROA.ID_PROCESO
  INNER JOIN vehiculo AS TVE ON TSM.ID_VEHICULO=TVE.ID_VEHICULO 
  INNER JOIN marcasauto AS TMA ON TVE.ID_MARCAR=TMA.ID_MARCA 
  INNER JOIN modeloauto AS TMO ON TVE.ID_MODELO=TMO.ID_MODELO 
  group by CONCAT(TPRO.NOMBRE,' ',TPRO.MARCAR),CONCAT(TMONE.SIMBOLO,'',TSM.PRECIO_UNITARIO),
  TVE.NUMERO_PLACA,TA.DESCRIPCION";
$query = mysqli_query($cnx, $sql);

?>

<div class="inf_inserngev">
    <h1>Pedido de materiales</h1>
    <div class="panel_proceso">
        <div class="form-row d-flex ">
            <div class="col-md-9 d-flex">
                <div class="form-group col-md-2">
                    <label for="inputEmail4">DESDE</label>
                    <input type="date" class="form-control" id="desde">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputEmail4">HASTA</label>
                    <input type="date" class="form-control" id="hasta">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">N° PLACA</label>
                    <input type="text" id="placa" class="form-control" placeholder="INGRESE PLACA">

                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">AREA</label>
                    <input type="text" id="producto" class="form-control" placeholder="INGRESE AREA">

                </div>
            </div>
            <div class="boton form-group col-md-3 d-flex align-items-end justify-content-end">
                <a href="formularioSalidaProducto.php" type="button" class="btn btn-outline-primary">
                    <img src="../asset/add-file-12-svgrepo-com.svg" alt="">
                    <span>Nuevo Despacho</span>
                </a>
            </div>
        </div>
        <div class="basedato" id="basedatoDES">
            <table class="table table-sm table-bordered" id="example">
                <thead>
                    <tr>
                        <!-- <th scope="col" class="text-center">FECHA SALIDA</th> -->
                        <th scope="col" class="text-center">AREA TRABAJO</th>
                        <th scope="col" class="text-center">PLACA</th>
                        <th scope="col" class="text-center">VEHICULO</th>
                        <th scope="col" class="text-center">PRODUCTO</th>
                        <th scope="col" class="text-center">PRECIO UNITARIO</th>
                        <th scope="col" class="text-center">CANTIDAD</th>
                        <th scope="col" class="text-center">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                     
                    <?php
                    $totalSoles=0.0;
                    $totalDolares=0.0;
                    while ($ver = mysqli_fetch_array($query)) {
                        
                        ?>
                        <tr>
                            
                            <td>
                                <?php echo $ver[0] ?>
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
                        if($ver[7]==1){
                            $totalSoles+=$ver[6];
                        }else if($ver[7]==2){
                            $totalDolares+=$ver[6];
                        }
                    }
                    ?>
                     <tr>
                        <!-- <th scope="col" class="text-center">FECHA SALIDA</th> -->
                        <td  class="text-center">total dolares</td>
                        <td  class="text-center"><?php echo '$.'.$totalDolares?></td>
                        <td  class="text-center"></td>
                        <td class="text-center"></td>
                        <td   class="text-center">total soles</td>
                        <td  class="text-center"><?php echo 'S/.'.$totalSoles?></td>
                        <td colspan="1" class="text-center"></td>
                    </tr>
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
                    '&idfechafin=' + $('#hasta').val() +
                    '&idproducto=' + $('#producto').val() +
                    '&idplaca=' + $('#placa').val(),
                url: '../proceso/DespachoMaterial/desde.php',
                success: function (r) {
                    $('#basedatoDES').html(r)
                }
            })
        })
    })
    $(document).ready(function () {
        $('#hasta').change(function () {
            $.ajax({
                type: 'POST',
                data: 'idfechaincio=' + $('#desde').val() +
                    '&idfechafin=' + $('#hasta').val() +
                    '&idproducto=' + $('#producto').val() +
                    '&idplaca=' + $('#placa').val(),
                url: '../proceso/DespachoMaterial/desde.php',
                success: function (r) {
                    $('#basedatoDES').html(r)
                }
            })
        })
    })
    $(document).ready(function () {
        $('#producto').keyup(function () {
            $.ajax({
                type: 'POST',
                data: 'idfechaincio=' + $('#desde').val() +
                    '&idfechafin=' + $('#hasta').val() +
                    '&idproducto=' + $('#producto').val() +
                    '&idplaca=' + $('#placa').val(),
                url: '../proceso/DespachoMaterial/desde.php',
                success: function (r) {
                    $('#basedatoDES').html(r)
                }
            })
        })
    })
    $(document).ready(function () {
        $('#placa').keyup(function () {
            $.ajax({
                type: 'POST',
                data: 'idfechaincio=' + $('#desde').val() +
                    '&idfechafin=' + $('#hasta').val() +
                    '&idproducto=' + $('#producto').val() +
                    '&idplaca=' + $('#placa').val(),
                url: '../proceso/DespachoMaterial/desde.php',
                success: function (r) {
                    $('#basedatoDES').html(r)
                }
            })
        })
    })
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            lengthMenu: [
        [100000, 500, -1],
        ['All', 500,'All']
    ],
    
            dom: 'Bfrtip',
    buttons: [
        'copy', 'excel', 'pdf'
    ]
        });
    });
</script>