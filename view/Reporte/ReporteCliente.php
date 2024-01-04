
<?php
require_once "../../config/config.php";
$conexion = new Conexion();
$cnx = $conexion->Conectar();
$sql = "SELECT
IF(TCL.TIPO_CLIENTE='PERSONA_JURIDICA',TCL.RUC,TCL.DNI),
IF(TCL.TIPO_CLIENTE='PERSONA_JURIDICA',TCL.EMPRESA,CONCAT(TCL.APELLIDO_PROPIETARIO ,',',TCL.NOMBRE_PROPIETARIO)),
TCL.TELEFONO,
TCL.TELEFONO_PERSONA,
TCL.EMAIL,
TUPR.provincia,
TUDIS.distrito,
TCL.DIRECCION
FROM cliente AS TCL
LEFT JOIN ubdepartamento AS TUBD ON TCL.ID_DEPARTAMENTO=TUBD.idDepa
LEFT JOIN ubprovincia AS TUPR ON TCL.ID_PROVINCIA=TUPR.idProv
LEFT JOIN ubdistrito AS TUDIS ON TCL.ID_DISTRITO=TUDIS.idDist";
$query = mysqli_query($cnx, $sql);
?>

<div class="inf_inserngev mt-5">

    <div class="panel_proceso">

        <div class="basedato">
            <table class="table table-sm table-bordered" id="example3">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">RUC/DNI</th>
                        <th scope="col" class="text-center">EMPRESA/CLIENTE</th>
                        <th scope="col" class="text-center">TELFONO EMPRESA</th>
                        <th scope="col" class="text-center">CELULAR</th>
                        <th scope="col" class="text-center">CORREO</th>
                        <th scope="col" class="text-center">PROVINCIA</th>
                        <th scope="col" class="text-center">DISTRITO</th>
                        <th scope="col" class="text-center">DIRECCION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
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
                            <td>
                                <?php echo $ver[7] ?>
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
        $('#example3').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
    buttons: [
        'copy', 'excel', 'pdf'
    ]
        })
    });
</script>
