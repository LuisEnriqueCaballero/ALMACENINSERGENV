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
<div class="modal fade" id="nuevocliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">nuevo cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_nuevo">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="label">TIPO PERSONA<span>*</span></label>
                            <select name="tipo" id="tipo" class="form-control" onchange="getval(this);">
                                <option value="0">SELECCIONE TIPO CLIENTE</option>
                                <option value="PERSONA_NATURAL">PERSONA NATURAL</option>
                                <option value="PERSONA_JURIDICA">PERSONA JURIDICA</option>
                            </select>
                            <span class="campo">campo obligatorio</span>
                        </div>
                        
                        <div class="form-group col-md-8" id="empresaS" style="display:none">
                            <label class="label">empresa <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="empresa" id="empresa" placeholder="INGRESE NOMBRE EMPRESA">
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-6" id="rucS" style="display:none">
                            <label class="label">r.u.c <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="ruc" id="ruc" placeholder="R.U.C">
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-6" id="telefoS" style="display:none">
                            <label class="label">telefono empresa <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="telefono_empresa" id="telefono_empresa" placeholder="999-999-999">
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">nombres propietario <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="nombres" id="nombres" placeholder="INGRESA NOMBRES">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">apellido propietario <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="apellido" id="apellido" placeholder="INGRESA APELLIDOS">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">DNI <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="dni" id="dni" placeholder="INGRESE NUMERO DNI">
                            <span class="campo">campo obligatorio</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="label">telefono <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="telefono" id="telefono" placeholder="999-999-999">
                            
                        </div>
                        <div class="form-group col-md-8">
                            <label class="label">email <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="email" id="email" placeholder="INGRESA EL CORREO ELECTRONICO">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="label">departamento <span>*</span></label>
                            <select class="form-control" name="departamento" id="departamento">
                                <option value="0">SELECCIONE DEPARTAMENTO</option>
                                <?php
                                while($ver=mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $ver[0]?>"><?php echo $ver[1]?></option>
                                <?php 
                                }
                                ?>
                            </select>
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">provincia <span>*</span></label>
                            <select class="form-control" name="provincia" id="provincia">
                                
                            </select>
                            <span class="campo">campo obligatorio</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="label">distrito <span>*</span></label>
                            <select class="form-control" name="distrito" id="distrito">
                                
                                
                            </select>
                            <span class="campo">campo obligatorio</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="label">direccion <span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="direccion" id="direccion" placeholder="INGRESE LA DIRECCION">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="nuevo">Nuevo</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#telefono_empresa').inputmask("999-999-999");
    $('#telefono').inputmask("999-999-999");
    $('#dni').inputmask("999 999 99");
    $('#email').inputmask("email");
    $(".campo").css({"color":"red"})
   
    $('input').css({"text-transform":"uppercase"})
    
})
</script>


<script type="text/javascript">
    function getval(sel){
        if(sel.value=='0'){
            $('#empresaS').hide(1000);
            $('#rucS').hide(1000);
            $('#telefoS').hide(1000);
        }else if(sel.value=='PERSONA_NATURAL'){
            $('#empresaS').show(1000);
            $('#rucS').show(1000);
            $('#telefoS').show(1000);
        }else if(sel.value=='PERSONA_JURIDICA'){
            $('#empresaS').hide(1000);
            $('#rucS').hide(1000);
            $('#telefoS').hide(1000);
        }
    }
</script>