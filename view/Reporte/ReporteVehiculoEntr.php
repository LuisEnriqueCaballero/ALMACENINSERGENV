<?php
require_once "../../config/config.php";
$conexion=new Conexion();
$cnx=$conexion->Conectar();
$sql="SELECT TVEH.NUMERO_PLACA,
TMA.MARCA,
TMO.MODELO,
IF(TCLI.TIPO_CLIENTE='PERSONA_JURIDICA',TCLI.EMPRESA,CONCAT(TCLI.APELLIDO_PROPIETARIO,' ',TCLI.NOMBRE_PROPIETARIO)) AS PROPIETARIO,
TDEP.departamento,
CONCAT(TPROV.provincia,' - ',TDIST.distrito),
TVEH.NUMERO_MOTOR,
TVEH.SERIE_VIN,
TVEH.CHASIS,
TVEH.TIPO_COMBUTIBLE,
CONCAT(TVEH.ANIO_FABRICACION,'-',
TVEH.ANIO_MODELO) AS FABRICACION_ANIO
FROM vehiculo AS TVEH 
LEFT JOIN cliente AS TCLI ON TVEH.ID_CLIENTE=TCLI.ID_CLIENTE
LEFT JOIN marcasauto AS TMA ON TVEH.ID_MARCAR=TMA.ID_MARCA
LEFT JOIN modeloauto AS TMO ON TVEH.ID_MODELO=TMO.ID_MODELO
LEFT JOIN ubdepartamento AS TDEP ON TCLI.ID_DEPARTAMENTO=TDEP.idDepa
LEFT JOIN ubprovincia AS TPROV ON TCLI.ID_PROVINCIA=TPROV.idProv
LEFT JOIN ubdistrito AS TDIST ON TCLI.ID_DISTRITO=TDIST.idDist
WHERE TVEH.ESTADO='ENTREGADO'
ORDER BY TVEH.NUMERO_PLACA";
$query=mysqli_query($cnx,$sql);
?>

<div class="inf_inserngev mt-5">
    
    <div class="panel_proceso">
        
        <div class="basedato">
            <table class="table table-sm table-bordered" id="example6">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">N°PLACA</th>
                        <th scope="col" class="text-center">MARCA</th>
                        <th scope="col" class="text-center">MODELO</th>
                        <th scope="col" class="text-center">CLIENTE</th>
                        <th scope="col" class="text-center">DEPARTAMENTO</th>
                        <th scope="col" class="text-center">UBICACION</th>
                        <th scope="col" class="text-center">SERIE-VIN</th></th>
                        <th scope="col" class="text-center">CHASIS</th>
                        <th scope="col" class="text-center">TIPO COMBUSTIBLE</th>
                        <th scope="col" class="text-center">FABIRCACION-A&Nacute;IO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($ver=mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $ver[0]?></td>
                        <td><?php echo $ver[1]?></td>
                        <td><?php echo $ver[2]?></td>
                        <td><?php echo $ver[3]?></td>
                        <td><?php echo $ver[4]?></td>
                        <td><?php echo $ver[5]?></td>
                        <td><?php echo $ver[6]?></td>
                        <td><?php echo $ver[7]?></td>
                        <td><?php echo $ver[9]?></td>
                        <td><?php echo $ver[11]?></td>
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
        $('#example6').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
    buttons: [
        'copy', 'excel', 'pdf'
    ]
        });
    });
</script>