<?php
include_once "../../config/config.php";
$conexion = new Conexion();
$cnx = $conexion->Conectar();

$sql = "SELECT TE.ID_TRABAJADOR, 
TE.FECHA_INGRESO, 
CONCAT(TE.APELLIDO, ' ',TE.NOMBRE), 
TE.NUMERO_DOCUMENTO, 
CONCAT(TIMESTAMPDIFF(YEAR,TE.FECHA_CUMPLEANIO,CURDATE()),' ','AÑOS') AS 'Edad', 
CONCAT(DAY(TE.FECHA_CUMPLEANIO),'/',MONTHNAME(TE.FECHA_CUMPLEANIO)) AS CUMPLE, 
TA.DESCRIPCION, 
TE.CELULAR, 
CONCAT(TB.nombre_banco,' : ',TE.CUENTA), 
TE.Estado FROM trabajadore AS TE 
INNER JOIN banco AS TB ON TE.BANCO=TB.id_banco 
LEFT JOIN area AS TA ON TE.AREA_TRABAJO=TA.ID_AREA";
$query = mysqli_query($cnx, $sql);
?>

<div class="inf_inserngev">
    <h1>lista trabajadores</h1>

    <div class="panel_proceso">
        <div class="boton d-flex justify-content-between align-items-center ">
            <div class="d-flex justify-content-between col-4">
                <div class="form-group">
                    <label for="">Buscar N° Documento</label>
                    <input type="search" id="busDocumento" class="form-control">
                </div>
                <div class="form-group mr">
                    <label for="">Provincia</label>
                    <input type="text" name="provincia" id="provincia" class="form-control">
                </div>
            </div>
            <button type="button" class="btn btn-outline-primary " data-toggle="modal" data-target="#nuevoempleado">
                <img src="../asset/add-file-12-svgrepo-com.svg" alt="">
                <span>Nuevo</span>
            </button>
        </div>
        <div class="basedato" id="tablaempleado">
        <table class="table table-sm table-bordered" >
   <thead>
       <tr>
           <th scope="col" class="text-center">FECHA INGRESO</th>
           <th scope="col" class="text-center">empleado</th>
           <th scope="col" class="text-center">n° documento</th>
           <th scope="col" class="text-center">edad</th>
           <th scope="col" class="text-center">fecha naciemiento</th>
           <th scope="col" class="text-center">area</th>
           <th scope="col" class="text-center">n°celular</th>
           <th scope="col" class="text-center">n°cuenta</th>
           <th scope="col" class="text-center">estado</th>
           <th scope="col" class="text-center">configuracion</th>
       </tr>
</thead>
<tbody>
        <?php 
        while ($ver = mysqli_fetch_row($query)) {
            ?>
            <tr>
                <td>
                       <?php echo  $ver[1] ?>
                </td>
                       <td>
                       <?php echo  $ver[2] ?>
                </td>
                       <td>
                       <?php echo  $ver[3] ?>
                </td>
                       <td>
                       <?php echo  $ver[4] ?>
                </td>
                       <td>
                       <?php echo  $ver[5] ?>
                </td>
                       <td>
                <?php echo  $ver[6] ?>
                </td>
                <td>
                <?php echo  $ver[7] ?>
                </td>
                <td>
                <?php echo  $ver[8] ?>

                </td>
                <td>
                <?php echo  $ver[9] ?>
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
                                                           data-toggle="modal" data-target="#updateempleado"
                                                           onclick="ObtenerEmpleado(<?php echo $ver[0]?>)">
                                                           <img src="../asset/update-svgrepo-com.svg" alt="">
                                                           <span>Editar</span>
                                                       </button>
                                                   </a>
                                               </li>
                                               <li>
                                                   <a class="dropdown-item" href="#">
                                                       <button type="button" class="btn btn-outline-danger"
                                                           onclick="DeleteEmpleado(<?php echo $ver[0]?>)">
                                                           <img src="../asset/delete-svgrepo-com.svg" alt="">
                                                           <span>Eliminar</span>
                                                       </button>
                                                   </a>
                                               </li>
                                               <li>
                                                   <a class="dropdown-item" href="#">
                                                       <button type="button" class="btn btn-outline-warning"
                                                           data-toggle="modal" data-target="#viewsempleado"
                                                           onclick="ViewsEmpleado(<?php echo $ver[0]?>)">
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
        $("#busDocumento").keyup(function () {
            var iddocumento = $(this).val();
            $.ajax({
                method: "POST",
                data: { name: iddocumento },
                url: "../proceso/Empleado/BuscarDocumento.php",
                success: function (dato) {
                    $('#tablaempleado').html(dato)
                }
            })
        })
    })
</script>