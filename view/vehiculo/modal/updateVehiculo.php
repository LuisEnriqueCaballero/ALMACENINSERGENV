<?php
$conexion = new Conexion();
$cnx = $conexion->Conectar();
$sql = "SELECT * FROM marcasauto";
$query = mysqli_query($cnx, $sql);
$sql1 = "SELECT * FROM modeloauto";
$query1 = mysqli_query($cnx, $sql1);
$sql2 = "SELECT ID_CLIENTE, CONCAT(APELLIDO_PROPIETARIO,'-',NOMBRE_PROPIETARIO,',',EMPRESA) FROM cliente";
$query2 = mysqli_query($cnx, $sql2);

?>
<div class="modal fade" id="updatevehiculo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">actualizar vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_update">
                    <input type="text" name="ID" id="ID" hidden>
                    <div class="form-row">
                        
                        <div class="form-group col-md-4">
                            <label>n°placa</label>
                            <input type="text" class="form-control" id="PLACAU" name="PLACAU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>marca</label>
                            <select id="MARCAU" class="form-control" name="MARCAU">
                                <option value="0">SELECCIONE MARCA</option>
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
                            <label>modelo</label>
                            <select id="MODELOU" class="form-control" name="MODELOU">
                                <option value="0">SELECCIONE MODELO</option>
                                <?php
                                while ($ver1 = mysqli_fetch_array($query1)) {
                                    ?>
                                    <option value="<?php echo $ver1[1] ?>"><?php echo $ver1[2] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>color ingreso</label>
                            <input type="text" class="form-control" id="COLORU" name="COLORU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>numero  motor</label>
                            <input type="text" class="form-control" id="MOTORU" name="MOTORU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>numero serie/vin</label>
                            <input type="text" class="form-control" id="VINU" name="VINU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>numero chasis</label>
                            <input type="text" class="form-control" id="CHASISU" name="CHASISU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>tipo combustible</label>
                            <select id="COMBUSTIBLEU" class="form-control" name="COMBUSTIBLEU">
                                <option value="0">SELECCIONE COMBUSTIBLE</option>
                                <option value="GASOLINA">GASOLINA</option>
                                <option value="PETROLEO">PETROLEO</option>
                                <option value="GAS">GAS</option>
                                <option value="ELECTRICO">ELECTRICO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>tipo vehiculo</label>
                            <input type="text" class="form-control" id="VEHICULOU" name="VEHICULOU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>fecha ingreso</label>
                            <input type="date" class="form-control" id="INGRESOU" name="INGRESOU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>anio fabricacion</label>
                            <input type="text" class="form-control" id="FABRICACIONU" name="FABRICACIONU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>anio modelo</label>
                            <input type="text" class="form-control" id="ANIO_MODELOU" name="ANIO_MODELOU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>PROCESO</label>
                            <select id="ESTADOU" class="form-control" name="ESTADOU">
                                <option value="0">SELECCIONE PROCESO</option>
                                <option value="TRANSFORMACION">TRANSFORMACION</option>
                                <option value="ENTREGADO">ENTREGADO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label>cliente/empresa</label>
                            <select id="CLIENTEU" class="form-control" name="CLIENTEU">
                                <option value="0">SELECCIONE CLIENTE/EMPRESA</option>
                                <?php
                                while ($ver2 = mysqli_fetch_array($query2)) {
                                    ?>
                                    <option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1] ?></option>
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