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
<div class="modal fade" id="nuevoproducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">proceso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_nuevo">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="label">categoria <span>*</span></label>
                            <select id="categoria" class="form-control" name="categoria">
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
                            <input type="text" class="form-control campo_danger" name="marca" id="marca">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">nombre producto <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="producto" id="producto">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="label">cantidad <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="cantidad" id="cantidad">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">precio <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="precio" id="precio">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">tipo moneda <span>*</span></label>
                            <select id="moneda" class="form-control" name="moneda">
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
                            <select id="medida" class="form-control" name="medida">
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
                            <input type="text" class="form-control campo_danger" name="agotado" id="agotado">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">cantidad minimo <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="minimo" id="minimo">
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="nuevo">Nuevo</button>
            </div>
        </div>
    </div>
</div>