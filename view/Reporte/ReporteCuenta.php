<?php
require_once "../../config/config.php";
$conexion=new Conexion();
$cnx=$conexion->Conectar();
$sql="SELECT 
TPRO.EMPRESA,
TPRO.RUC,
TPRO.TELEFONO_EMPRESA,
CONCAT(TBAN.nombre_banco,'<br> $.',TPRO.NUMERO_CUENTA,' <br>S/.',TPRO.TIPO_CUENTA),
CONCAT(TBAN1.nombre_banco,' <br>$.',TPRO.NUMERO_CUENTA1,' <br>S/.',TPRO.TIPO_CUENTA1),
CONCAT(TBAN2.nombre_banco,' <br>$.',TPRO.NUMERO_CUENTA2,' <br>S/.',TPRO.TIPO_CUENTA2),
CONCAT(TBAN3.nombre_banco,' <br>$.',TPRO.NUMERO_CUENTA3,' <br>S/.',TPRO.TIPO_CUENTA3)
FROM proveedor AS TPRO 
LEFT JOIN BANCO AS TBAN ON TPRO.BANCO=TBAN.id_banco
LEFT JOIN BANCO AS TBAN1 ON TPRO.BANCO1=TBAN1.id_banco
LEFT JOIN BANCO AS TBAN2 ON TPRO.BANCO2=TBAN2.id_banco
LEFT JOIN BANCO AS TBAN3 ON TPRO.BANCO3=TBAN3.id_banco";
$query=mysqli_query($cnx,$sql);
?>

<div class="inf_inserngev mt-5">
    
    <div class="panel_proceso">
        
        <div class="basedato">
            <table class="table table-sm table-bordered" id="example5">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">EMPRESA</th>
                        <th scope="col" class="text-center">RUC</th>
                        <th scope="col" class="text-center">TELEFONO</th>
                        <th scope="col" class="text-center">BANCO</th>
                        <th scope="col" class="text-center">BANCO</th>
                        <th scope="col" class="text-center">BANCO</th>
                        <th scope="col" class="text-center">BANCO</th>
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
        $('#example5').DataTable({
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