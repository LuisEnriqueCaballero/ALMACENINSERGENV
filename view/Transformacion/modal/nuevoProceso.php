<?php
$conexion = new Conexion();
$cnx = $conexion->Conectar();
$sql = "SELECT * FROM proceso_auto";
$query = mysqli_query($cnx, $sql);
$sql1 = "SELECT ID_VEHICULO,NUMERO_PLACA FROM vehiculo";
$query1 = mysqli_query($cnx, $sql1)
    ?>
<div class="modal fade" id="nuevoetapa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">nueva etapa transformacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_nuevo">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Placa</label>
                            <select id="vehiculo" class="form-control" name="vehiculo">
                                <option value="0">SELECCIONE PLACA</option>
                                <?php
                                while ($ver1 = mysqli_fetch_array($query1)) {
                                    ?>
                                    <option value="<?php echo $ver1[0] ?>"><?php echo $ver1[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Proceso</label>
                            <select id="proceso" class="form-control" name="proceso">
                                <option value="0">SELECCIONE EL PROCESO</option>
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
                            <label>Procedimiento</label>
                            <select name="subprocedimiento" id="subprocedimiento" class="form-control">

                            </select>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>fecha inicio</label>
                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerra</button>
                <button type="button" class="btn btn-primary" id="nuevo">Agregar</button>
            </div>
        </div>
    </div>
</div>