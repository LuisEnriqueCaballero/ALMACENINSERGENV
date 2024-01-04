<?php
include_once "../config/config.php";
$conexion = new Conexion();
$cnx = $conexion->Conectar();

$sql = "SELECT TAL.ID_ALMACEN,CONCAT(TPRO.NOMBRE,' ',TPRO.MARCAR),TAL.PRECIO,TAL.CANTIDAD,TMO.descripcion_moneda,DATE_FORMAT(TAL.FECHA, '%d %m %Y') FROM almacen AS TAL
INNER JOIN producto AS TPRO ON TAL.ID_PRODUCTO=TPRO.ID_PRODUCTO
INNER JOIN tipomoneda AS TMO ON TAL.ID_MONEDA=TMO.id_moneda
ORDER BY TAL.FECHA";
$query = mysqli_query($cnx, $sql);
?>
<div class="modal fade" id="elegirProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Producto Almacen Principal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-bordered" id="example">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">#orden</th>
                            <th scope="col" class="text-center">descripcion</th>
                            <th scope="col" class="text-center">precio unitario</th>
                            <th scope="col" class="text-center">cantidad</th>
                            <th scope="col" class="text-center">moneda</th>
                            
                            <th scope="col" class="text-center" >Seleccionar</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $a = 0;
                        while ($ver = mysqli_fetch_array($query)) {
                            ++$a;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $a ?>
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
                                
                                <td class="config_botones text-center" >
                                <button type="button" class="btn btn-outline-secondary"
                                onclick="Elegir(<?php echo $ver[0]?>)" data-dismiss="modal">
                                <img src="../asset/select-object-svgrepo-com.svg" alt="" id="seleccion">
                                </button>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>