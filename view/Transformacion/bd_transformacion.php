<?php
include_once "../../config/config.php";
$conexion = new Conexion();
$cnx = $conexion->Conectar();

$sql = "SELECT DPR.ID_DETALLE_PROCESO,VEH.NUMERO_PLACA,CONCAT(MAV.MARCA,' ',MOV.MODELO),PV.DESCRIPCION_PROCESO,SPV.DESCRIPCION_SUBPROCESO,DPR.FECHA_INICIO,DPR.FECHA_FINAL
FROM detalle_proceso AS DPR
INNER JOIN vehiculo AS VEH ON DPR.ID_AUTO=VEH.ID_VEHICULO
INNER JOIN marcasauto AS MAV ON VEH.ID_MARCAR=MAV.ID_MARCA
INNER JOIN modeloauto AS MOV ON VEH.ID_MODELO=MOV.ID_MODELO
INNER JOIN proceso_auto AS PV ON DPR.ID_PROCESO=PV.ID_PROCESO
INNER JOIN subproceso_auto AS SPV ON  DPR.ID_SUBPROCESO=SPV.ID_SUBPROCESO";
$query = mysqli_query($cnx, $sql);
?>

<div class="inf_inserngev">
    <h1>transformacion de vehiculo</h1>
    <div class="panel_proceso">
        <div class="boton">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#nuevoetapa">
                <img src="../asset/add-file-12-svgrepo-com.svg" alt="">
                <span>Nuevo</span>
            </button>
        </div>
        <div class="basedato">
            <table class="table table-sm table-bordered" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">placa vehiculo</th>
                        <th scope="col" class="text-center">vehiculo</th>
                        <th scope="col" class="text-center">proceso</th>
                        <th scope="col" class="text-center">procedimiento</th>
                        <th scope="col" class="text-center">fecha inicio procedimiento</th>
                        <th scope="col" class="text-center">fecha finalizado</th>
                        <th scope="col" class="text-center">configuracion</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a = 0;
                    while ($ver = mysqli_fetch_array($query)) {
                        ++$a;
                        ?>
                        <tr>
                            <td>
                                <?php echo $a ?>
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
                            <td class="config_botones">
                                <nav class="navbar navbar-expand navbar-light bg-light">
                                    <div class="collapse navbar-collapse" id="navbarScroll">
                                        <ul class="navbar-nav mr-auto my-0 my-lg-0 navbar-nav-scroll"
                                            style="max-height: 100px;">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <img src="../asset/gear-svgrepo-com.svg" alt="">
                                                    <span>configuracion</span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" class="btn btn-outline-success"
                                                                data-toggle="modal" data-target="#updateetapa"
                                                                onclick="ObtenerTransformacion(<?php echo $ver[0] ?>)">
                                                                <img src="../asset/update-svgrepo-com.svg" alt="">
                                                                <span>Editar</span>
                                                            </button>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
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
        $('#example').DataTable({

        });
    });
</script>