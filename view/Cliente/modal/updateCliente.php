<?php 
$conexion=new Conexion();
$cnx=$conexion->Conectar();
$sql="SELECT * FROM ubdepartamento";
$query=mysqli_query($cnx,$sql);
$sql1="SELECT * FROM ubprovincia";
$query1=mysqli_query($cnx,$sql1);
$sql2="SELECT * FROM ubdistrito";
$query2=mysqli_query($cnx,$sql2);
?>
<!-- Modal -->
<div class="modal fade" id="updatecliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">nuevo cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_update">
                    <input type="text" hidden name="id" id="id">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="label">TIPO PERSONA<span>*</span></label>
                            <select name="tipoU" id="tipoU" class="form-control">
                                <option value="0">SELECCIONE TIPO CLIENTE</option>
                                <option value="PERSONA_NATURAL">PERSONA NATURAL</option>
                                <option value="PERSONA_JURIDICA">PERSONA JURIDICA</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-8">
                            <label class="label">empresa <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="empresaU" id="empresaU">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label">r.u.c <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="rucU" id="rucU">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label">telefono empresa <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="telefono_empresaU" id="telefono_empresaU">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">nombres propietario <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="nombresU" id="nombresU">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">apellido propietario <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="apellidoU" id="apellidoU">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">DNI <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="dniU" id="dniU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="label">telefono <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="telefonoU" id="telefonoU">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="label">email <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="emailU" id="emailU">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="label">departamento <span>*</span></label>
                            <select class="form-control" name="departamentoU" id="departamentoU">
                                <option value="0">SELECCIONE DEPARTAMENTO</option>
                                <?php
                                while($ver=mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $ver[0]?>"><?php echo $ver[1]?></option>
                                <?php 
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">provincia <span>*</span></label>
                            <select class="form-control" name="provinciaU" id="provinciaU">
                                <option value="0">SELECCIONE PROVINCIA</option>
                                <?php
                                while($ver1=mysqli_fetch_array($query1)){
                                ?>
                                <option value="<?php echo $ver1[0]?>"><?php echo $ver1[1]?></option>
                                <?php 
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">distrito <span>*</span></label>
                            <select class="form-control" name="distritoU" id="distritoU">
                                <option value="0">SELECCIONE DISTRITO</option>
                                <?php
                                while($ver2=mysqli_fetch_array($query2)){
                                ?>
                                <option value="<?php echo $ver2[0]?>"><?php echo $ver2[1]?></option>
                                <?php 
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="label">direccion <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="direccionU" id="direccionU">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="update">Actualizar</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#telefono_empresaU').inputmask("999-999-999");
    $('#telefonoU').inputmask("999-999-999");
    $('#dniU').inputmask("999 999 99");
    $('#emailU').inputmask("email");
    $(".campoU").css({"color":"red"})
   
    $('input').css({"text-transform":"uppercase"})
    
})
</script>