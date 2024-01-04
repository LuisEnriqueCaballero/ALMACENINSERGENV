<?php

include '../../config/config.php';
$conexion=new Conexion();
$cnx=$conexion->Conectar();

$consulta="SELECT ID_TRABAJADOR,CONCAT(APELLIDO,' ',NOMBRE) FROM trabajadore";
$QUERY=mysqli_query($cnx,$consulta);
$consulta1="SELECT TVE.ID_VEHICULO,CONCAT(TVE.NUMERO_PLACA,' ',TMA.MARCA,' ',TMO.MODELO) FROM vehiculo AS TVE
            INNER JOIN marcasauto AS TMA ON TVE.ID_MARCAR=TMA.ID_MARCA
            INNER JOIN modeloauto AS TMO ON TVE.ID_MODELO=TMO.ID_MODELO";
$QUERY1=mysqli_query($cnx,$consulta1);

$consulta2="SELECT * FROM `proceso_auto`";
$QUERY2=mysqli_query($cnx,$consulta2);

$consulta3="SELECT ID_PRODUCTO,CONCAT(MARCAR,' ',NOMBRE) FROM producto";
$QUERY3=mysqli_query($cnx,$consulta3);
?>


<form id="despacho">
    <div class="form-row">
        <div class="col-md-4">
            <label for="">Trabajador</label>
            <select name="EMPLEADO" id="EMPLEADO" class="form-control">
                <option value="0">SELECCIONE TRABAJADOR</option>
            <?php 
            while($ver=mysqli_fetch_array($QUERY)){
                ?>
                <option value="<?php echo $ver[0]?>"><?php  echo $ver[1]?></option>
                <?php   
            }
            ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Vehiculo</label>
            <select name="VEHICULO" id="VEHICULO" class="form-control">
                <option value="0">SELECCIONE VEHICULO</option>
                <?php 
                while($ver1=mysqli_fetch_array($QUERY1)){
                ?>
                <option value="<?php echo $ver1[0]?>"><?php  echo $ver1[1]?></option>
                <?php   
            }
            ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Tipo trabajo</label>
            <select name="TRABAJO" id="TRABAJO" class="form-control" onchange="getval(this);">
                <option value="0">SELECCIONE TIPO DE TRABAJO</option>
                <option value="MATENIMIENTO">MATENIMIENTO</option>
                <option value="TRANSFORMACION">TRANSFORMACION</option>
            </select>
        </div>
        <div class="col-md-4" id="PROCESOW" style="display:none">
            <label for="">Proceso</label>
            <select name="PROCESO" id="PROCESO" class="form-control">
                <option value="0">SELECCIONE EL PROCESO</option>
                <?php 
                while($ver2=mysqli_fetch_array($QUERY2)){
                ?>
                <option value="<?php echo $ver2[0]?>"><?php  echo $ver2[1]?></option>
                <?php   
            }
            ?>
            </select>
        </div>
        <div class="col-md-4"  id="Mantenimiento" style="display:none;">
            <label for="">Proceso Mantenimiento</label>
            <select name="PROCESOM" id="PROCESOM" class="form-control">
                <option value="0">PROCESO MANTENIMIENTO</option>
                <option value="REPACION">REPACION</option>
                <option value="PLANCHADO">PLANCHADO</option>
                <option value="PINTADO_GENERAL">PINTADO GENERAL</option>
                <option value="CAMBIO_COLOR">CAMBIO COLOR</option>
                <option value="SERVICIO_GENERAL">SERVICIO GENERAL</option>
            </select>
        </div>
        <div class="col-md-12" id="DESCRIPC_SERVIC" style="display:none;">
            <label for="">DESCRIPTCIN SERVICIO</label>
            <textarea class="form-control" id="DESCRIPCION_SERVICIO" name="DESCRIPCION_SERVICIO" rows="3"></textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-4">
            <label for="">Producto</label>
            <select name="PRODUCTO" id="PRODUCTO" class="form-control">
                <option value="">SELECCIONE EL PRODUCTO</option>
                <?php 
                while($ver3=mysqli_fetch_array($QUERY3)){
                ?>
                <option value="<?php echo $ver3[0]?>"><?php  echo $ver3[1]?></option>
                <?php   
            }
            ?>
            </select>
        </div>
        <div class="col-md-2">
            <label for="">Precio Unitario</label>
            <input type="text" name="PRECIO" id="PRECIO" class="form-control" readonly>
        </div>
        <div class="col-md-2">
            <label for="">cantidad</label>
            <input type="text" name="CANTIDAD" id="CANTIDAD" class="form-control" value=0>
        </div>
        <div class="col-md-2">
            <label for="">stock producto</label>
            <input type="text" name="STOCK" id="STOCK" class="form-control" readonly>
        </div>
        <div class="col-md-2">
            <label for="">Queda</label>
            <input type="text" name="QUEDA" id="QUEDA" class="form-control" readonly>
        </div>
    </div>

</form>
<div class="form-row botones">
    <div>
        <button type="button" class="btn btn-success" id="aniadir">Agregar Producto</button>
    </div>
    <div>
        <button type="button" class="btn btn-danger" id="limpiar">Vaciar Pedido</button>
    </div>
</div>

<script type="text/javascript">
    function getval(sel){
        if(sel.value=='0'){
            $('#Mantenimiento').hide(1000);
            $('#DESCRIPC_SERVIC').hide(1000);
            $('#PROCESOW').hide(1000);
        }else if(sel.value=='MATENIMIENTO'){
            $('#Mantenimiento').show(1000);
            $('#DESCRIPC_SERVIC').show(1000);
            $('#PROCESOW').hide(1000);
            $('#PROCESO').val(13);
        }else if(sel.value=='TRANSFORMACION'){
            $('#Mantenimiento').hide(1000);
            $('#DESCRIPC_SERVIC').hide(1000);
            $('#PROCESOW').show(1000);
        }
        
    }

    $(document).ready(function(){
    $('#PRODUCTO').change(function() {
        $.ajax({
          type: 'POST',
          data: 'idproducto=' + $('#PRODUCTO').val(),
          url: '../proceso/DespachoMaterial/getObtenerProduct.php',
          success: function(r) {
            datos = jQuery.parseJSON(r);
            $('#PRECIO').val(datos['PRECIO_UNITARIO']);
            $('#STOCK').val(datos['CANTIDAD_INICIAL']);
            $('#CANTIDAD').val('0');
          }
        })
      })

      $('#aniadir').click(function() {
      datos = $('#despacho').serialize();
      $.ajax({
        type: 'POST',
        data: datos,
        url: '../proceso/DespachoMaterial/Despachoproductotemp.php',
        success: function(r) {
          $('#despacho')[0].reset();
          $('#CANTIDAD').val('0');
          $('#Tabla_Salida').load('SalidaProducto/TablaSalida.php');
          swal("El producto se Añadio", "Haz click el boton OK!", "success");
        }
      })
    })
    $('#limpiar').click(function() {
      $.ajax({
        url: '../proceso/DespachoMaterial/vaciarsalidaTemp.php',
        success: function(r) {
            $('#Tabla_Salida').load('SalidaProducto/TablaSalida.php');
            swal("Fue borrado correctamente", "Haz click el boton OK!", "success");
        }
      })
    })
    
})
</script>



