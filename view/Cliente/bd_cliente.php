<?php
include_once "../../config/config.php";
$conexion = new Conexion();
$cnx = $conexion->Conectar();

$sql = "SELECT TCL.ID_CLIENTE,
IF(TCL.TIPO_CLIENTE='PERSONA_JURIDICA',TCL.RUC,TCL.DNI),
TCL.EMPRESA,
CONCAT(TCL.APELLIDO_PROPIETARIO ,',',TCL.NOMBRE_PROPIETARIO),
TCL.TELEFONO,
TCL.TELEFONO_PERSONA,
TCL.EMAIL,
CONCAT(TUPR.provincia,'-',TUDIS.distrito,'-',TCL.DIRECCION)
FROM cliente AS TCL
LEFT JOIN ubdepartamento AS TUBD ON TCL.ID_DEPARTAMENTO=TUBD.idDepa
LEFT JOIN ubprovincia AS TUPR ON TCL.ID_PROVINCIA=TUPR.idProv
LEFT JOIN ubdistrito AS TUDIS ON TCL.ID_DISTRITO=TUDIS.idDist";
$query = mysqli_query($cnx, $sql);
?>

<div class="inf_inserngev">
    <h1>lista cliente</h1>
    <div class="panel_proceso">
        <div class="form-row">
            <div class="col">
                <input type="text" id="buscarempresa" class="form-control" placeholder="First name">
            </div>
            <div class="col">
                <input type="text" id="buscarpersona" class="form-control" placeholder="Last name">
            </div>
        </div>
        <div class="boton">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#nuevocliente">
                <img src="../asset/add-file-12-svgrepo-com.svg" alt="">
                <span>Nuevo</span>
            </button>
        </div>
        <div class="basedato">
            <table class="table table-sm table-bordered" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center w-10%">ruc/dni</th>
                        <th scope="col" class="text-center w-10%">empresa</th>
                        <th scope="col" class="text-center w-10%">cliente</th>
                        <th scope="col" class="text-center w-10%">tel.empresa</th>
                        <th scope="col" class="text-center w-10%">celular</th>
                        <th scope="col" class="text-center w-10%">email</th>
                        <th scope="col" class="text-center w-10%">ubicacion</th>
                        <th scope="col" class="text-center w-10%">configuracion</th>
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
                                                                data-toggle="modal" data-target="#updatecliente"
                                                                onclick="ObtenerCliente(<?php echo $ver[0] ?>)">
                                                                <img src="../asset/update-svgrepo-com.svg" alt="">
                                                                <span>Editar</span>
                                                            </button>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" class="btn btn-outline-danger"
                                                                onclick="DeleteCliente(<?php echo $ver[0] ?>)">
                                                                <img src="../asset/delete-svgrepo-com.svg" alt="">
                                                                <span>Eliminar</span>
                                                            </button>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" class="btn btn-outline-warning"
                                                                data-toggle="modal" data-target="#viewscliente"
                                                                onclick="viewsCliente(<?php echo $ver[0] ?>)">
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
        $('#example').DataTable({

        });
    });
</script>
