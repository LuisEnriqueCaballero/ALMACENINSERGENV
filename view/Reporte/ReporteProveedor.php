<?php
require_once "../../config/config.php";
$conexion=new Conexion();
$cnx=$conexion->Conectar();
$sql="SELECT 
TPRO.EMPRESA,
TPRO.RUC,
TPRO.TELEFONO_EMPRESA,
CONCAT(TPRO.APELLIDO_PROVEEDOR,' , ',TPRO.NOMBRE_PROVEEDOR),
CONCAT(TPRO.TELEFONO_PROVEEDOR, ' - ' ,TPRO.TELEFONO_PROVEEDOR2),
TUBDIS.distrito,
TPRO.DIRECCION
FROM proveedor AS TPRO 
LEFT JOIN ubdistrito AS TUBDIS ON TPRO.DISTRITO=TUBDIS.idDist";
$query=mysqli_query($cnx,$sql);
?>

<div class="inf_inserngev mt-5">
    
    <div class="panel_proceso">
        
        <div class="basedato">
            <table class="table table-sm table-bordered" id="example2">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">EMPRESA</th>
                        <th scope="col" class="text-center">RUC</th>
                        <th scope="col" class="text-center">TELFONO EMPRESA</th>
                        <th scope="col" class="text-center">PROVEEDOR</th>
                        <th scope="col" class="text-center">TELEFONO PROVEEDOR</th>
                        <th scope="col" class="text-center">DISTRITO</th>
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
        $('#example2').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            lengthMenu: [
        [200],
        [200]
    ],
            dom: 'Bfrtip',
    buttons: [
        'copy', 'excel', 'pdf'
    ]
        });
    });
</script>