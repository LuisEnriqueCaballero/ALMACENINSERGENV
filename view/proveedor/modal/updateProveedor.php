<?php
$conexion = new Conexion();
$cnx = $conexion->Conectar();
$sql = "SELECT * FROM ubdistrito where idProv='128'";
$query = mysqli_query($cnx, $sql);
$sql1 = "SELECT * FROM banco";
$query1 = mysqli_query($cnx, $sql1);
$sql2 = "SELECT * FROM banco";
$query2 = mysqli_query($cnx, $sql2);
$sql3 = "SELECT * FROM banco";
$query3 = mysqli_query($cnx, $sql3);
$sql4 = "SELECT * FROM banco";
$query4 = mysqli_query($cnx, $sql4);
?>
<div class="modal fade" id="updateproveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">nuevo proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_udpdate">
                <input type="text"  name="idproveedor" id="idproveedor" >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>empresa</label>
                            <input type="text" class="form-control" id="empresaU" name="empresaU">
                        </div>
                        <div class="form-group col-md-3">
                            <label>R.U.C</label>
                            <input type="text" class="form-control" id="rucU" name="rucU">
                        </div>
                        <div class="form-group col-md-3">
                            <label>telfono empresa</label>
                            <input type="text" class="form-control" id="telefonoU" name="telefonoU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>nombre</label>
                            <input type="text" class="form-control" id="nombreU" name="nombreU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>apellido</label>
                            <input type="text" class="form-control" id="apellidoU" name="apellidoU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>telfono personal</label>
                            <input type="text" class="form-control" id="celularU" name="celularU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>telfono personal1</label>
                            <input type="text" class="form-control" id="celular1U" name="celular1U">
                        </div>
                        <div class="form-group col-md-8">
                            <label>Proceso</label>
                            <select id="distritoU" class="form-control" name="distritoU">
                                <option value="0">SELECCIONE DISTRITO</option>
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
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>direccion</label>
                            <input type="text" class="form-control" id="direccionU" name="direccionU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>banco</label>
                            <select id="bancoU" class="form-control" name="bancoU">
                                <option value="0">SELECCIONE BANCO</option>
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
                            <label>nuemero de cuenta $</label>
                            <input type="text" class="form-control" id="cuentaU" name="cuentaU">
                        </div>
                        <div class="form-group col-md-4">
                            <label>nuemero de cuenta S/.</label>
                            <input type="text" class="form-control" id="cuentasU" name="cuentasU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>banco</label>
                            <select id="banco1U" class="form-control" name="banco1U">
                                <option value="0">SELECCIONE BANCO</option>
                                <?php
                                while ($ver2 = mysqli_fetch_array($query2)) {
                                    ?>
                                    <option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>nuemero de cuenta $</label>
                            <input type="text" class="form-control" id="cuenta1U" name="cuenta1U">
                        </div>
                        <div class="form-group col-md-4">
                            <label>nuemero de cuenta S/.</label>
                            <input type="text" class="form-control" id="cuentas1U" name="cuentas1U">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>banco</label>
                            <select id="banco2U" class="form-control" name="banco2U">
                                <option value="0">SELECCIONE BANCO</option>
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
                            <label>nuemero de cuenta $</label>
                            <input type="text" class="form-control" id="cuenta2U" name="cuenta2U">
                        </div>
                        <div class="form-group col-md-4">
                            <label>nuemero de cuenta S/.</label>
                            <input type="text" class="form-control" id="cuentas2U" name="cuentas2U">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>banco</label>
                            <select id="banco3U" class="form-control" name="banco3U">
                                <option value="0">SELECCIONE BANCO</option>
                                <?php
                                while ($ver4 = mysqli_fetch_array($query4)) {
                                    ?>
                                    <option value="<?php echo $ver4[0] ?>"><?php echo $ver4[1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>nuemero de cuenta $</label>
                            <input type="text" class="form-control" id="cuenta3U" name="cuenta3U">
                        </div>
                        <div class="form-group col-md-4">
                            <label>nuemero de cuenta S/.</label>
                            <input type="text" class="form-control" id="cuentas3U" name="cuentas3U">
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
<script>
$(document).ready(function(){
    $('#rucU').numeric();
    $('#telefonoU').inputmask("999 999 999");
    $('#celularU').inputmask("999 999 999");
    $('#celular1U').inputmask("999 999 999");
    $('#cuentaU').numeric();
    $('#cuentasU').numeric();
    $('#cuenta1U').numeric();
    $('#cuentas1U').numeric();
    $('#cuenta2U').numeric();
    $('#cuentas2U').numeric();
    $('#cuenta3U').numeric();
    $('#cuentas3U').numeric();
   
    $('input').css({"text-transform":"uppercase"})
    
})
</script>