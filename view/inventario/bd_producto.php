<?php
include_once "../../config/config.php";
$conexion=new Conexion();
$cnx=$conexion->Conectar();

$sql="SELECT 
PRO.ID_PRODUCTO,
CAT.NOMBRE_CATEGORIA,
TPM.descripcion_moneda,
PRO.MARCAR,PRO.NOMBRE,
PRO.PRECIO_UNITARIO,
CONCAT(PRO.CANTIDAD_INICIAL,' ',UMD.nombre_unidadmedida) AS STOCK,
PRO.ESTADO
FROM producto AS PRO
LEFT JOIN categoria AS CAT ON PRO.ID_CATEGORIA=CAT.ID_CATEGORIA
LEFT JOIN unidad_medida AS UMD ON PRO.UNIDAD_MEDIDA=UMD.id_unidadmedida
LEFT JOIN tipomoneda AS TPM ON PRO.ID_MONEDA=TPM.id_moneda";
$query=mysqli_query($cnx,$sql);
?>

<div class="inf_inserngev">
    <h1>lista producto</h1>
    <div class="panel_proceso">
        <div class="boton">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#nuevoproducto">
            <img src="../asset/add-file-12-svgrepo-com.svg" alt="">
                <span>Nuevo</span>
            </button>
        </div>
        <div class="basedato">
            <table class="table table-sm table-bordered" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#orden</th>
                        <th scope="col" class="text-center">categoria</th>
                        <th scope="col" class="text-center">moneda</th>
                        <th scope="col" class="text-center">marca</th>
                        <th scope="col" class="text-center">descripcion</th>
                        <th scope="col" class="text-center">precio unitario</th>
                        <th scope="col" class="text-center">stock</th>
                        <th scope="col" class="text-center">estado</th>
                        <th scope="col" class="text-center">configuracion</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $a=0;
                    while($ver=mysqli_fetch_array($query)){
                    ++$a;
                    ?>
                    <tr>
                        <td><?php echo $a?></td>
                        <td><?php echo $ver[1]?></td>
                        <td><?php echo $ver[2]?></td>
                        <td><?php echo $ver[3]?></td>
                        <td><?php echo $ver[4]?></td>
                        <td><?php echo $ver[5]?></td>
                        <td><?php echo $ver[6]?></td>
                        <td><?php echo $ver[7]?></td>
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
                                                                data-toggle="modal" data-target="#updateproducto" onclick="ObtenerDato(<?php echo $ver[0]?>)">
                                                                <img src="../asset/update-svgrepo-com.svg" alt="">
                                                                <span>Editar</span>
                                                            </button>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" class="btn btn-outline-danger"
                                                            onclick="deletedato(<?php echo $ver[0]?>)">
                                                                <img src="../asset/delete-svgrepo-com.svg" alt="">
                                                                <span>Eliminar</span>
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