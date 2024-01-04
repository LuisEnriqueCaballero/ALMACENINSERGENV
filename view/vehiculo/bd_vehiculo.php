<?php
include_once "../../config/config.php";
$conexion = new Conexion();
$cnx = $conexion->Conectar();

$sql = "SELECT TVH.ID_VEHICULO,
TVH.FECHA_INGRESO,
TVH.NUMERO_PLACA,
CONCAT(TMA.MARCA,' ',TMO.MODELO) AS MARCA_MODELO,
CONCAT(TCL.APELLIDO_PROPIETARIO,' ',TCL.NOMBRE_PROPIETARIO) AS PROPIETARIO,
TCL.TELEFONO_PERSONA,
TUDEPAR.departamento,
TUPROV.provincia,
TVH.ESTADO
FROM vehiculo AS TVH
LEFT JOIN cliente AS TCL ON TCL.ID_CLIENTE=TVH.ID_CLIENTE
LEFT JOIN ubdepartamento AS TUDEPAR ON TCL.ID_DEPARTAMENTO=TUDEPAR.idDepa
LEFT JOIN ubprovincia AS TUPROV ON TCL.ID_PROVINCIA=TUPROV.idProv
LEFT JOIN ubdistrito AS TUDIST ON TCL.ID_DISTRITO=TUDIST.idDist
LEFT JOIN marcasauto AS TMA ON TMA.ID_MARCA=TVH.ID_MARCAR
LEFT JOIN modeloauto AS TMO ON TMO.ID_MODELO=TVH.ID_MODELO
ORDER BY TVH.FECHA_INGRESO";
$query = mysqli_query($cnx, $sql);
?>

<div class="inf_inserngev">
    <h1>vehiculos en transformacion</h1>
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
                    <label for="inputEmail4">N°PLACA</label>
                    <input type="text" id="placa" class="form-control" placeholder="INGRESE PLACA">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">DEPARTAMENTO</label>
                    <input type="text" id="departamento" class="form-control" placeholder="DEPARTAMENTO">
                </div>
            </div>
            <div class="boton form-group col-md-3 d-flex align-items-end justify-content-end" style="display:flex;column-gap:20px;">
                
                <button type="button" class="btn btn-outline-primary d-flex align-items-center" data-toggle="modal" data-target="#nuevovehiculo">
                    <img src="../asset/add-file-12-svgrepo-com.svg" alt="">
                    <span>AGREGAR NUEVO</span>
                </button>
            </div>
        </div>

        <div class="basedato" id="basedatoDES">
            <table class="table table-sm table-bordered" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">fecha ingreso</th>
                        <th scope="col" class="text-center">placa</th>
                        <th scope="col" class="text-center">vehiculo</th>
                        <th scope="col" class="text-center">cliente</th>
                        <th scope="col" class="text-center">telefono cliente</th>
                        <th scope="col" class="text-center">departamento</th>
                        <th scope="col" class="text-center">provincia</th>
                        <th scope="col" class="text-center">proceso</th>
                        <th scope="col" class="text-center">configuracion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($ver = mysqli_fetch_array($query)) {
                        ?>
                        <tr>

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
                            <td>
                                <?php echo $ver[7] ?>
                            </td>
                            <td>
                                <?php echo $ver[8] ?>
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
                                                                data-toggle="modal" data-target="#updatevehiculo"
                                                                onclick="ObtenerVehiculo(<?php echo $ver[0] ?>)">
                                                                <img src="../asset/update-svgrepo-com.svg" alt="">
                                                                <span>Editar</span>
                                                            </button>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" class="btn btn-outline-danger"
                                                                onclick="DeleteVehiculo(<?php echo $ver[0] ?>)">
                                                                <img src="../asset/delete-svgrepo-com.svg" alt="">
                                                                <span>Eliminar</span>
                                                            </button>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" class="btn btn-outline-warning"
                                                                data-toggle="modal" data-target="#viewsvehiculo"
                                                                onclick="viewsVehiculo(<?php echo $ver[0] ?>)">
                                                                <img src="../asset/view-svgrepo-com.svg" alt="">
                                                                <span>Vista</span>
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
        $('#desde').change(function () {
            $.ajax({
                type: 'POST',
                data: 'idfechaincio=' + $('#desde').val() +
                    '&idfechafin=' + $('#hasta').val() +
                    '&iddepartamento=' + $('#departamento').val() +
                    '&idplaca=' + $('#placa').val(),
                url: '../proceso/Vehiculo/desde.php',
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
                    '&iddepartamento=' + $('#departamento').val() +
                    '&idplaca=' + $('#placa').val(),
                url: '../proceso/Vehiculo/desde.php',
                success: function (r) {
                    $('#basedatoDES').html(r)
                }
            })
        })
    })
    $(document).ready(function () {
        $('#departamento').keyup(function () {
            $.ajax({
                type: 'POST',
                data: 'idfechaincio=' + $('#desde').val() +
                    '&idfechafin=' + $('#hasta').val() +
                    '&iddepartamento=' + $('#departamento').val() +
                    '&idplaca=' + $('#placa').val(),
                url: '../proceso/Vehiculo/desde.php',
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
                    '&iddepartamento=' + $('#departamento').val() +
                    '&idplaca=' + $('#placa').val(),
                url: '../proceso/Vehiculo/desde.php',
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

        });
    });
</script>