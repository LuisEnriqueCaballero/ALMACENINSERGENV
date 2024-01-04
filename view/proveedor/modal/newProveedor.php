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
<div class="modal fade" id="nuevoproveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">nuevo proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>empresa</label>
                            <input type="text" class="form-control" id="empresa" name="empresa" placeholder="INGRESE EMPRESA">
                        
                        </div>
                        <div class="form-group col-md-3">
                            <label>R.U.C</label>
                            <input type="text" class="form-control" id="ruc" name="ruc" placeholder="INGRESE R.U.C">
                        </div>
                        <div class="form-group col-md-3">
                            <label>telfono empresa</label>
                            <input type="text" class="form-control" id="telfono" name="telefono" placeholder="999-999-999">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="NOMBRE PROVEEDOR">
                        </div>
                        <div class="form-group col-md-4">
                            <label>apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="APELLIDO PROVEEDOR">
                        </div>
                        <div class="form-group col-md-4">
                            <label>telfono personal</label>
                            <input type="text" class="form-control" id="celular" name="celular" placeholder="999 999 999">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>telfono personal1</label>
                            <input type="text" class="form-control" id="celular1" name="celular1" placeholder="999 999 999">
                        </div>
                        <div class="form-group col-md-8">
                            <label>Proceso</label>
                            <select id="distrito" class="form-control" name="distrito">
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
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="INGRESE DIRECCION">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>banco</label>
                            <select id="banco" class="form-control" name="banco">
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
                            <input type="text" class="form-control" id="cuenta" name="cuenta" placeholder="$/ 00011">
                        </div>
                        <div class="form-group col-md-4">
                            <label>nuemero de cuenta S/.</label>
                            <input type="text" class="form-control" id="cuentas" name="cuentas" placeholder="S/ 00011">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>banco</label>
                            <select id="banco1" class="form-control" name="banco1">
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
                            <input type="text" class="form-control" id="cuenta1" name="cuenta1" placeholder="$/ 00011">
                        </div>
                        <div class="form-group col-md-4">
                            <label>nuemero de cuenta S/.</label>
                            <input type="text" class="form-control" id="cuentas1" name="cuentas1" placeholder="S/ 00011">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>banco</label>
                            <select id="banco2" class="form-control" name="banco2">
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
                            <input type="text" class="form-control" id="cuenta2" name="cuenta2" placeholder="$/ 00011">
                        </div>
                        <div class="form-group col-md-4">
                            <label>nuemero de cuenta S/.</label>
                            <input type="text" class="form-control" id="cuentas2" name="cuentas2" placeholder="S/ 00011">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>banco</label>
                            <select id="banco3" class="form-control" name="banco3">
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
                            <input type="text" class="form-control" id="cuenta3" name="cuenta3" placeholder="$/ 00011">
                        </div>
                        <div class="form-group col-md-4">
                            <label>nuemero de cuenta S/.</label>
                            <input type="text" class="form-control" id="cuentas3" name="cuentas3" placeholder="S/ 00011">
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
    $('#ruc').numeric();
    $('#telfono').inputmask("999 999 999");
    $('#celular').inputmask("999 999 999");
    $('#celular1').inputmask("999 999 999");
    $('#cuenta').numeric();
    $('#cuentas').numeric();
    $('#cuenta1').numeric();
    $('#cuentas1').numeric();
    $('#cuenta2').numeric();
    $('#cuentas2').numeric();
    $('#cuenta3').numeric();
    $('#cuentas3').numeric();
   
    $('input').css({"text-transform":"uppercase"})
    
})
</script>