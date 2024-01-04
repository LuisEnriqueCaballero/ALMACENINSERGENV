<?php
require_once "../../config/config.php";
$conexion=new Conexion();
$cnx=$conexion->Conectar();
$sql="SELECT 
TEMP.FECHA_INGRESO,
TEMP.TIPO_DOCUMENTO,
TEMP.NUMERO_DOCUMENTO,
CONCAT(TEMP.APELLIDO,' ',TEMP.NOMBRE),
CONCAT(TIMESTAMPDIFF(YEAR,TEMP.FECHA_CUMPLEANIO,CURDATE()),' ','AÑOS') AS 'Edad',
TEMP.FECHA_CUMPLEANIO,
TEMP.CELULAR,
TEMP.TELEFONO,
TARE.DESCRIPCION,
CONCAT(TPROV.provincia,' - ',
TDIST.distrito),
TEMP.DIRECCION,
TBAN.nombre_banco,
TEMP.CUENTA
FROM trabajadore AS TEMP
LEFT JOIN area AS TARE ON TEMP.AREA_TRABAJO=TARE.ID_AREA
LEFT JOIN ubprovincia AS TPROV ON TEMP.ID_PROVINCIA=TPROV.idProv
LEFT JOIN ubdistrito AS TDIST ON TEMP.ID_DISTRITO=TDIST.idDist
LEFT JOIN banco AS TBAN ON TEMP.BANCO=TBAN.id_banco
ORDER BY TEMP.APELLIDO, TEMP.NOMBRE";
$query=mysqli_query($cnx,$sql);
?>

<div class="inf_inserngev mt-5">
    
    <div class="panel_proceso">
        
        <div class="basedato" >
            <table class="table table-sm table-bordered" id="example1" >
                <thead>
                    <tr>
                        <th scope="col" class="text-center">FECHA INGRESO</th>
                        <th scope="col" class="text-center">TIPO DOCUMENTO</th>
                        <th scope="col" class="text-center">N°DOCUMENTO</th>
                        <th scope="col" class="text-center">EMPLEADO</th>
                        <th scope="col" class="text-center">EDAD</th>
                        <th scope="col" class="text-center">A&nacute;io NACIMIENTO</th>
                        <th scope="col" class="text-center">CELULAR PERSONAL</th>
                        <th scope="col" class="text-center">N°TELEF FAMILIAR</th>
                        <th scope="col" class="text-center">AREA TRABAJO</th>
                        <th scope="col" class="text-center">UBICACION</th>
                        <th scope="col" class="text-center">DIRECCION</th>
                        
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
                        <td><?php echo $ver[8]?></td>
                        <td><?php echo $ver[9]?></td>
                        <td><?php echo $ver[10]?></td>
                        
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
        $('#example1').DataTable({
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