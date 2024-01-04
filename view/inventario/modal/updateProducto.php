<?php
$conexion = new Conexion();
$cnx = $conexion->Conectar();
$sql = "SELECT * FROM categoria";
$query = mysqli_query($cnx, $sql);
$sql1 = "SELECT * FROM unidad_medida";
$query1 = mysqli_query($cnx, $sql1);
$sql2 = "SELECT * FROM tipomoneda";
$query2 = mysqli_query($cnx, $sql2);
?>
<!-- Modal -->
<div class="modal fade" id="updateproducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">proceso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_update">
                    <div class="form-row">
                        <input type="text" name="id" id="id" hidden>
                        <div class="form-group col-md-4">
                            <label class="label">categoria <span>*</span></label>
                            <select id="categoriaU" class="form-control" name="categoriaU">
                                <option value="0">SELECCIONE CATEGORIA</option>
                                <?php
                                while ($ver = mysqli_fetch_array($query)) {
                                    ?>
                                    <option value="<?php echo $ver[0] ?>"><?php echo $ver[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">marca producto <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="marcaU" id="marcaU">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">nombre producto <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="productoU" id="productoU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="label">cantidad <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="cantidadU" id="cantidadU">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">precio <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="precioU" id="precioU">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">tipo moneda <span>*</span></label>
                            <select id="monedaU" class="form-control" name="monedaU">
                                <option value="0">SELECCIONE MONEDA</option>
                                <?php
                                while ($ver1 = mysqli_fetch_array($query2)) {
                                    ?>
                                    <option value="<?php echo $ver1[0] ?>"><?php echo $ver1[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="label">unidad medida <span>*</span></label>
                            <select id="medidaU" class="form-control" name="medidaU">
                                <option value="0">SELECCIONE MEDIDA</option>
                                <?php
                                while ($ver2 = mysqli_fetch_array($query1)) {
                                    ?>
                                    <option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">cantidad agotado <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="agotadoU" id="agotadoU">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">cantidad minimo <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="minimoU" id="minimoU">
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="update">Actualizar</button>
            </div>
        </div>
    </div>
</div>