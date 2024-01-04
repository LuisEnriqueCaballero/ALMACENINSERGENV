<?php
$conexion = new Conexion();
$cnx = $conexion->Conectar();
$sql = "SELECT * FROM ubdepartamento";
$query = mysqli_query($cnx, $sql);
$sql1 = "SELECT * FROM ubprovincia";
$query1 = mysqli_query($cnx, $sql1);
$sql2 = "SELECT * FROM ubdistrito";
$query2 = mysqli_query($cnx, $sql2);
$sql3 = "SELECT * FROM banco";
$query3 = mysqli_query($cnx, $sql3);
$sql4 = "SELECT * FROM area";
$query4 = mysqli_query($cnx, $sql4);

?>
<div class="modal fade" id="updateempleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">actualizar empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_update">
                    <input type="text" name="id" id="id" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>nombre</label>
                            <input type="text" class="form-control" id="NOMBREU" name="NOMBREU">
                        </div>
                        <div class="form-group col-md-6">
                            <label>apellido</label>
                            <input type="text" class="form-control" id="APELLIDOU" name="APELLIDOU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>tipo documento</label>
                            <select id="DOCUMENTOU" class="form-control" name="DOCUMENTOU">
                                <option value="0">SELECCIONE DOCUMENTO</option>
                                <option value="DNI">DNI</option>
                                <option value="PASPORTE">PASPORTE</option>
                                <option value="CEDULA">CEDULA</option>
                                <option value="CARNET EXTRANJERIA">CARNET EXTRANJERIA</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>numero documento</label>
                            <input type="text" class="form-control" id="NUMEROU" name="NUMEROU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>edad</label>
                            <input type="text" class="form-control" id="EDADU" name="EDADU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>genero</label>
                            <select id="SEXOU" class="form-control" name="SEXOU">
                                <option value="0">SELECCIONE EL PROCESO</option>
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMENINO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>telefono familia</label>
                            <input type="text" class="form-control" id="TELEFONOU" name="TELEFONOU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>celular personal</label>
                            <input type="text" class="form-control" id="CELULARU" name="CELULARU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>departamento</label>
                            <select id="DEPARTAMENTOU" class="form-control" name="DEPARTAMENTOU">
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
                        <div class="form-group col-md-6">
                            <label>provincia</label>
                            <select id="PROVINCIAU" class="form-control" name="PROVINCIAU">
                                <option value="0">SELECCIONE PROVINCIA</option>
                                <?php
                                while ($ver1 = mysqli_fetch_array($query1)) {
                                    ?>
                                    <option value="<?php echo $ver1[0] ?>"><?php echo $ver1[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>distrito</label>
                            <select id="DISTRITOU" class="form-control" name="DISTRITOU">
                                <option value="0">SELECCIONE DISTRITO</option>
                                <?php
                                while ($ver2 = mysqli_fetch_array($query2)) {
                                    ?>
                                    <option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>direccion</label>
                            <input type="text" class="form-control" id="DIRECCIONU" name="DIRECCIONU">
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>numero hijo menores</label>
                            <input type="text" class="form-control" id="HIJOU" name="HIJOU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>planilla</label>
                            <select id="PLANILLAU" class="form-control" name="PLANILLAU">
                                <option value="0">SELECCIONE PLANILLA</option>
                                <option value="SI">PERTENECE</option>
                                <option value="NO">NO PERTENECE</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>fecha cumplea&ntilde;io</label>
                            <input type="date" class="form-control" id="FECHA_CUMPLEU" name="FECHA_CUMPLEU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>fecha ingreso</label>
                            <input type="date" class="form-control" id="FECHA_INGRESOU" name="FECHA_INGRESOU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>banco</label>
                            <select id="BANCOU" class="form-control" name="BANCOU">
                                <option value="0">SELECCIONE EL BANCO</option>
                                <?php
                                while ($ver3 = mysqli_fetch_array($query3)) {
                                    ?>
                                    <option value="<?php echo $ver3[0] ?>"><?php echo $ver3[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>nuemro cuenta</label>
                            <input type="text" class="form-control" id="CUENTAU" name="CUENTAU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>estado</label>
                            <select id="ESTADOU" class="form-control" name="ESTADOU">
                                <option value="0">SELECCIONE ESTADO</option>
                                <option value="A">ACTIVO</option>
                                <option value="I">INACTIVO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>area</label>
                            <select id="AREAU" class="form-control" name="AREAU">
                                <option value="0">SELECCIONE AREA</option>
                                <?php
                                while ($ver4 = mysqli_fetch_array($query4)) {
                                    ?>
                                    <option value="<?php echo $ver4[0] ?>"><?php echo $ver4[1] ?></option>
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

