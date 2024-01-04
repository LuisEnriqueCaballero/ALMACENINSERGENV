<?php
$conexion = new Conexion();
$cnx = $conexion->Conectar();
$sql = "SELECT * FROM area";
$query = mysqli_query($cnx, $sql);
?>
<div class="modal fade" id="nuevousuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>correo electronico</label>
                            <input type="correo" class="form-control" id="EMAIL" name="EMAIL" placeholder="INGRESE TU CORREO ELECTRONICO">
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" id="PASSWORD" name="PASSWORD" placeholder="INGRESE PASSWORD">
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>nombre usuario</label>
                            <input type="text" class="form-control" id="NOMBRE" name="NOMBRE" placeholder="INGRESE NOMBRE COMPLETO">
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>apellido usuario</label>
                            <input type="text" class="form-control" id="APELLIDO" name="APELLIDO" placeholder="INGRESE APELLIDO COMPLETO">
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label>area</label>
                            <select id="AREA" class="form-control" name="AREA">
                                <option value="0">SELECCIONE AREA</option>
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
    
   })
</script>