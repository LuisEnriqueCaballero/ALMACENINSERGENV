<?php
require_once "../../config/config.php";
$conexion=new Conexion();
$cnx=$conexion->Conectar();
$sql="SELECT TPRO.ID_PROVEEDOR,
TPRO.EMPRESA,
TPRO.RUC,
TPRO.TELEFONO_EMPRESA,
CONCAT(TPRO.APELLIDO_PROVEEDOR,' , ',TPRO.NOMBRE_PROVEEDOR),
CONCAT(TPRO.TELEFONO_PROVEEDOR, ' / ' ,TPRO.TELEFONO_PROVEEDOR2),
CONCAT(TUBDIS.distrito,' - ',TPRO.DIRECCION)
FROM proveedor AS TPRO 
LEFT JOIN ubdistrito AS TUBDIS ON TPRO.DISTRITO=TUBDIS.idDist";
$query=mysqli_query($cnx,$sql);
?>

<div class="inf_inserngev">
    <h1>lista proveedor</h1>
    <div class="panel_proceso">
        <div class="boton">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#nuevoproveedor">
            <img src="../asset/add-file-12-svgrepo-com.svg" alt="">
                <span>Nuevo</span>
            </button>
        </div>
        <div class="basedato">
            <table class="table table-sm table-bordered" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">EMPRESA</th>
                        <th scope="col" class="text-center">RUC</th>
                        <th scope="col" class="text-center">TELFONO EMPRESA</th>
                        <th scope="col" class="text-center">PROVEEDOR</th>
                        <th scope="col" class="text-center">TELEFONO PROVEEDOR</th>
                        <th scope="col" class="text-center">UBICACION</th>
                        <th scope="col" class="text-center">configuracion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($ver=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $ver[1]?></td>
                        <td><?php echo $ver[2]?></td>
                        <td><?php echo $ver[3]?></td>
                        <td><?php echo $ver[4]?></td>
                        <td><?php echo $ver[5]?></td>
                        <td><?php echo $ver[6]?></td>
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
                                                                data-toggle="modal" data-target="#updateproveedor" onclick="ObtenerProveedor(<?php echo $ver[0]?>)">
                                                                <img src="../asset/update-svgrepo-com.svg" alt="">
                                                                <span>Editar</span>
                                                            </button>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" class="btn btn-outline-danger"
                                                            onclick="DeleteCliente(<?php echo $ver[0]?>)">
                                                                <img src="../asset/delete-svgrepo-com.svg" alt="">
                                                                <span>Eliminar</span>
                                                            </button>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                        <button type="button" class="btn btn-outline-warning" 
                                                            data-toggle="modal" data-target="#viewsproveedor"
                                                            onclick="viewsProveedor(<?php echo $ver[0] ?>)">
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