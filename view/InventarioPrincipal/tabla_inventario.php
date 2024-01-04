<?php
include_once "../../config/config.php";
$conexion=new Conexion();
$cnx=$conexion->Conectar();

$sql="SELECT TPRO.NOMBRE,TPRO.MARCAR,SUM(TAL.CANTIDAD) FROM almacen AS TAL
INNER JOIN producto AS TPRO ON TAL.ID_PRODUCTO=TPRO.ID_PRODUCTO
INNER JOIN tipomoneda AS TMO ON TAL.ID_MONEDA=TMO.id_moneda
GROUP BY TPRO.NOMBRE,TPRO.MARCAR";
$query=mysqli_query($cnx,$sql);
?>

<div class="inf_inserngev">
    <h1>Almacen principal</h1>
    <div class="panel_proceso">
        <div class="basedato">
            <table class="table table-sm table-bordered" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#orden</th>
                        <th scope="col" class="text-center">nombre</th>
                        <th scope="col" class="text-center">marca</th>
                        <th scope="col" class="text-center">cantidad</th>
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
                        <td><?php echo $ver[0]?></td>
                        <td><?php echo $ver[1]?></td>
                        <td><?php echo $ver[2]?></td>
                        
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