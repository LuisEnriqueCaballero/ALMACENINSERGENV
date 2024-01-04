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
<div class="modal fade" id="nuevovehiculo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">nuevo vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>n°placa</label>
                            <input type="text" class="form-control" id="PLACA" name="PLACA"  placeholder="INGRESE LA PLACA">
                            <span class='campo'>campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>marca</label>
                            <select id="MARCA" class="form-control" name="MARCA">
                                <option value="0">SELECCIONE MARCA</option>
                                <?php
                                while ($ver = mysqli_fetch_array($query)) {
                                    ?>
                                    <option value="<?php echo $ver[0] ?>"><?php echo $ver[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span class='campo'>campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>modelo</label>
                            <select id="MODELO" class="form-control" name="MODELO">
                                
                            </select>
                            <span class='campo'>campo obligatorio</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>color ingreso</label>
                            <input type="text" class="form-control" id="COLOR" name="COLOR" placeholder="INGRESE COLOR ACTUAL">
                        </div>
                        <div class="form-group col-md-4">
                            <label>numero  motor</label>
                            <input type="text" class="form-control" id="MOTOR" name="MOTOR" placeholder="INGRESE N° MOTOR">
                        </div>
                        <div class="form-group col-md-4">
                            <label>numero serie/vin</label>
                            <input type="text" class="form-control" id="VIN" name="VIN" placeholder="INGRESE N° VIN">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>numero chasis</label>
                            <input type="text" class="form-control" id="CHASIS" name="CHASIS" placeholder="INGRESE N° CHASIS">
                        </div>
                        <div class="form-group col-md-4">
                            <label>tipo combustible</label>
                            <select id="COMBUSTIBLE" class="form-control" name="COMBUSTIBLE">
                                <option value="0">SELECCIONE COMBUSTIBLE</option>
                                <option value="GASOLINA">GASOLINA</option>
                                <option value="PETROLEO">PETROLEO</option>
                                <option value="GAS">GAS</option>
                                <option value="ELECTRICO">ELECTRICO</option>
                            </select>
                            <span class='campo'>campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>tipo vehiculo</label>
                            <input type="text" class="form-control" id="VEHICULO" name="VEHICULO" placeholder="TIPO VEHICULO">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>fecha ingreso</label>
                            <input type="date" class="form-control" id="INGRESO" name="INGRESO" placeholder="INGRESE FECHA INGRESO">
                            <span class='campo'>campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>a&ntilde;o fabricacion</label>
                            <input type="text" class="form-control" id="FABRICACION" name="FABRICACION" placeholder="INGRESE AÑO FABRICACION">
                        </div>
                        <div class="form-group col-md-4">
                            <label>a&ntilde;o modelo</label>
                            <input type="text" class="form-control" id="ANIO_MODELO" name="ANIO_MODELO" placeholder="INGRESE AÑO MODELO">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>PROCESO</label>
                            <select id="ESTADO" class="form-control" name="ESTADO">
                                <option value="0">SELECCIONE PROCESO</option>
                                <option value="TRANSFORMACION">TRANSFORMACION</option>
                                <option value="ENTREGADO">ENTREGADO</option>
                            </select>
                            <span class='campo'>campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-8">
                            <label>cliente/empresa</label>
                            <select id="CLIENTE" class="form-control" name="CLIENTE">
                                <option value="0">SELECCIONE CLIENTE/EMPRESA</option>
                                <?php
                                while ($ver2 = mysqli_fetch_array($query2)) {
                                    ?>
                                    <option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span class='campo'>campo obligatorio</span>
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
<script>
    $(document).ready(function(){
        $("#PLACA").inputmask("***-***")
        $("#FABRICACION").numeric()
        $("#ANIO_MODELO").numeric()
        $('.campo').css({"color":"red"})
        $('input').css({"text-transform":"uppercase"})
    })
</script>
