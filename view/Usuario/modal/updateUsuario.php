<?php
$conexion = new Conexion();
$cnx = $conexion->Conectar();
$sql = "SELECT * FROM area";
$query = mysqli_query($cnx, $sql);
?>
<div class="modal fade" id="updateUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">actualizar usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_update">
                    <div class="form-row">
                        <input type="text" name="ID" id="ID" hidden>
                        <div class="form-group col-md-6">
                            <label>correo electronico</label>
                            <input type="text" class="form-control" id="EMAILU" name="EMAILU">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" id="PASSWORDU" name="PASSWORDU">
                        </div>
                        <div class="form-group col-md-6">
                            <label>nombre usuario</label>
                            <input type="text" class="form-control" id="NOMBREU" name="NOMBREU">
                        </div>
                        <div class="form-group col-md-6">
                            <label>apellido usuario</label>
                            <input type="text" class="form-control" id="APELLIDOU" name="APELLIDOU">
                        </div>
                        <div class="form-group col-md-6">
                            <label>area</label>
                            <select id="AREAU" class="form-control" name="AREAU">
                                <option value="0">SELECCIONE AREA</option>
                                <?php
                                while ($ver = mysqli_fetch_array($query)) {
                                    ?>
                                    <option value="<?php echo $ver[0] ?>"><?php echo $ver[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
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