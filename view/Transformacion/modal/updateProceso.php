<?php
$conexion = new Conexion();
$cnx = $conexion->Conectar();
$sql = "SELECT * FROM proceso_auto";
$query = mysqli_query($cnx, $sql);
$sql1 = "SELECT ID_VEHICULO,NUMERO_PLACA FROM vehiculo";
$query1 = mysqli_query($cnx, $sql1);
$sql2 = "SELECT * FROM subproceso_auto";
$query2 = mysqli_query($cnx, $sql2);
    ?>
<div class="modal fade" id="updateetapa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">actualizar etapa transformacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_update">
                    <input type="text" name="id" id="id" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Placa vehiculo</label>
                            <select id="vehiculoU" class="form-control" name="vehiculoU">
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
                            <select id="procesoU" class="form-control" name="procesoU">
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
                            <select name="subprocedimientoU" id="subprocedimientoU"  class="form-control">
                            <option value="0">SELECCIONE SUBPROCESO</option>
                                <?php
                                while ($ver2 = mysqli_fetch_array($query2)) {
                                    ?>
                                    <option value="<?php echo $ver2[0] ?>"><?php echo $ver2[2] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        
                        <div class="form-group col-md-4">
                            <label>fecha inicio</label>
                            <input type="date" name="fecha_inicioU" id="fecha_inicioU" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label>fecha culminado</label>
                            <input type="date" name="fecha_finalU" id="fecha_finalU" class="form-control">
                        </div>
                    </div>
                   
                        
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerra</button>
                <button type="button" class="btn btn-primary" id="update">Actualizar</button>
            </div>
        </div>
    </div>
</div>