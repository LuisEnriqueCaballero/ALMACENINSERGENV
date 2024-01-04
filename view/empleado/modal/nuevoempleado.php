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
<div class="modal fade" id="nuevoempleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">nuevo empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>nombre</label>
                            <input type="text" class="form-control" id="NOMBRE" name="NOMBRE" placeholder="INGRESE NOMBRE">
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>apellido</label>
                            <input type="text" class="form-control" id="APELLIDO" name="APELLIDO" placeholder="INGRESE APELLIDO">
                             <span class="campo">campo obligatorio</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>tipo documento</label>
                            <select id="DOCUMENTO" class="form-control" name="DOCUMENTO">
                                <option value="0">SELECCIONE DOCUMENTO</option>
                                <option value="DNI">DNI</option>
                                <option value="PASPORTE">PASPORTE</option>
                                <option value="CEDULA">CEDULA</option>
                                <option value="CARNET EXTRANJERIA">CARNET EXTRANJERIA</option>
                                
                            </select>
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>numero</label>
                            <input type="text" class="form-control" id="NUMERO" name="NUMERO" placeholder="INGRESE NUMERO DOCUMENTO">
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>edad</label>
                            <input type="text" class="form-control" id="EDAD" name="EDAD" placeholder="INGRESE EDAD">
                            <span class="campo">campo obligatorio</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>genero</label>
                            <select id="SEXO" class="form-control" name="SEXO">
                                <option value="0">SELECCIONE EL PROCESO</option>
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMENINO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>telefono familia</label>
                            <input type="text" class="form-control" id="TELEFONO" name="TELEFONO" placeholder="INGRESE NUMERO TELEFONO">
                        </div>
                        <div class="form-group col-md-4">
                            <label>celular personal</label>
                            <input type="text" class="form-control" id="CELULAR" name="CELULAR" placeholder="INGRESE NUMERO CELULAR">
                            <span class="campo">campo obligatorio</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>departamento</label>
                            <select id="DEPARTAMENTO" class="form-control" name="DEPARTAMENTO">
                                <option value="0">SELECCIONE EL PROCESO</option>
                                <?php
                                while ($ver = mysqli_fetch_array($query)) {
                                    ?>
                                    <option value="<?php echo $ver[0] ?>"><?php echo $ver[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>provincia</label>
                            <select id="PROVINCIA" class="form-control" name="PROVINCIA">
                                
                            </select>
                            <span class="campo">campo obligatorio</span>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>distrito</label>
                            <select id="DISTRITO" class="form-control" name="DISTRITO">
                                
                                
                            </select>
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>direccion</label>
                            <input type="text" class="form-control" id="DIRECCION" name="DIRECCION" placeholder="INGRESE DIRECCION">
                            <span class="campo">campo obligatorio</span>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>numero hijo menores</label>
                            <input type="text" class="form-control" id="HIJO" name="HIJO" placeholder="INGRESE NUMERO DE HIJOS">
                        </div>
                        <div class="form-group col-md-4">
                            <label>planilla</label>
                            <select id="PLANILLA" class="form-control" name="PLANILLA">
                                <option value="0">SELECCIONE PLANILLA</option>
                                <option value="SI">PERTENECE</option>
                                <option value="NO">NO PERTENECE</option>
                            </select>
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>fecha nacimiento</label>
                            <input type="date" class="form-control" id="FECHA_CUMPLE" name="FECHA_CUMPLE">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>fecha ingreso</label>
                            <input type="date" class="form-control" id="FECHA_INGRESO" name="FECHA_INGRESO">
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>banco</label>
                            <select id="BANCO" class="form-control" name="BANCO">
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
                            <input type="text" class="form-control" id="CUENTA" name="CUENTA" placeholder="INGRESE NUMERO CUENTA">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>estado</label>
                            <select id="ESTADO" class="form-control" name="ESTADO">
                                <option value="0">SELECCIONE ESTADO</option>
                                <option value="A">ACTIVO</option>
                                <option value="I">INACTIVO</option>
                            </select>
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label>area</label>
                            <select id="AREA" class="form-control" name="AREA">
                                <option value="0">SELECCIONE AREA</option>
                                <?php
                                while ($ver4 = mysqli_fetch_array($query4)) {
                                    ?>
                                    <option value="<?php echo $ver4[0] ?>"><?php echo $ver4[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span class="campo">campo obligatorio</span>
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
    $('.campo').css({"color":"red"})
    $('input').css({"text-transform":"uppercase"})
    $('#TELEFONO').inputmask("999 999 999").css({"text-decoration":"none"});
    $('#CELULAR').inputmask("999 999 999");
    $('#HIJO').numeric();
    $('#EDAD').numeric(); 
    $('#NUMERO').numeric();
    // $('#').inputmask("");
   })
</script>
