<?php
include '../../config/config.php';
$conexion = new Conexion();
$cnx = $conexion->Conectar();

$consulta = "SELECT ID_PROVEEDOR,EMPRESA FROM proveedor";
$query = mysqli_query($cnx, $consulta);

$consulta1 = "SELECT ID_PRODUCTO,CONCAT(MARCAR,' ',NOMBRE) FROM producto";
$query1 = mysqli_query($cnx, $consulta1);



$consulta2 = "SELECT id_moneda,descripcion_moneda FROM tipomoneda";
$query2 = mysqli_query($cnx, $consulta2);
?>
<form id="compra">
    <div class="form-row">
        <div class="col-md-3">
            <label for="">RECIBO</label>
            <select name="RECIBO" id="RECIBO" class="form-control" onchange="getval(this);">
                <option value="0">SELECCIONE TIPO RECIBO</option>
                <option value="FACTURA">FACTURA</option>
                <option value="BOLETA">BOLETA</option>
                <option value="NO_RECIBO">NO RECIBO</option>
            </select>
        </div>
        <div class="col-md-2" id="NUMEROH" style="display:none">
            <label for="">N° RECIBO</label>
            <input type="text" name="NUMERO" id="NUMERO" class="form-control">
        </div>
        <div class="col-md-3" id="EMPRESAH" style="display:none">
            <label for="">EMPRESAS</label>
            <select name="EMPRESA" id="EMPRESA" class="form-control">
                <option value="0">SELECCIONE EMPRESA</option>
                <?php
                while ($ver = mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?php echo $ver[0] ?>"><?php echo $ver[1] ?></option>
                    <?php
                }
                ?>
            </select>

        </div>
        <div class="col-md-2" id="RUCH" style="display:none">
            <label for="">N° R.U.C</label>
            <input type="text" name="RUC" id="RUC" class="form-control">
        </div>
        <div class="col-md-2">
            <label for="">MONEDA</label>
            <select name="MONEDA" id="MONEDA" class="form-control">
                <option value="0">SELECCIONE TIPO MONEDA</option>
                <?php
                while ($ver2 = mysqli_fetch_array($query2)) {
                    ?>
                    <option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="">Producto</label>
            <select name="PRODUCTO" id="PRODUCTO" class="form-control">
                <option value="0">SELECCIONE EL PRODUCTO</option>
                <?php
                while ($ver1 = mysqli_fetch_array($query1)) {
                    ?>
                    <option value="<?php echo $ver1[0] ?>"><?php echo $ver1[1] ?></option>
                    <?php
                }
                ?>
            </select>

        </div>
        <div class="col-md-1">
            <label for="">Precio</label>
            <input type="text" name="PRECIO" id="PRECIO" class="form-control">
        </div>
        <div class="col-md-1">
            <label for="">cantidad</label>
            <input type="text" name="CANTIDAD" id="CANTIDAD" class="form-control" value=0>
        </div>

        <div class="col-md-2">
            <label for="">FECHA RECIBO</label>
            <input type="date" name="FECHA" id="FECHA" class="form-control">
        </div>
        <div class="col-md-12" id="descripcionH" style="display:none">
            <label for="">MOTIVO</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
        </div>
    </div>
    

</form>
<div class="form-row botones">
    <div>
        <button type="button" class="btn btn-success" id="aniadir">Agregar Producto</button>
    </div>
    <div>
        <button type="button" class="btn btn-danger" id="vaciar">Vaciar Pedido</button>
    </div>
</div>

<script>
    function getval(sel){
        if(sel.value=='0'){
            $('#NUMEROH').hide(1000);
            $('#EMPRESAH').hide(1000);
            $('#RUCH').hide(1000);
            $('#descripcionH').hide(1000);
        }else if(sel.value==='FACTURA'){
            $('#NUMEROH').show(1000);
            $('#EMPRESAH').show(1000);
            $('#RUCH').show(1000);
            // $('#descripcionH').hide(1000);
        }else if(sel.value==='BOLETA'){
            $('#NUMEROH').show(1000);
            $('#EMPRESAH').show(1000);
            $('#RUCH').show(1000);
            // $('#descripcionH').hide(1000);
        }else if(sel.value==='NO_RECIBO'){
            $('#NUMEROH').hide(1000);
            $('#EMPRESAH').hide(1000);
            $('#RUCH').hide(1000);
            $('#descripcionH').show(1000);
        }
    }
</script>

<script>
  $(document).ready(function() {
    $('#EMPRESA').change(function() {
      $.ajax({
        type: 'POST',
        data: 'idpempre=' + $('#EMPRESA').val(),
        url: '../proceso/CompraMateriales/ObtenerdatoEmpresa.php',
        success: function(r) {
          datos = jQuery.parseJSON(r);
          $('#RUC').val(datos['RUC']);
        }
      })
    })
  })
  $(document).ready(function() {
    $('#aniadir').click(function() {
      datos = $('#compra').serialize();
      $.ajax({
        type: 'POST',
        data: datos,
        url: '../Proceso/CompraMateriales/Compraproductotemp.php',
        success: function(r) {
            $('#compra')[0].reset();
            $('#CANTIDAD').val('0');
            $('#Tabla_entrada').load('IngresoProducto/TablaIngreso.php');
            swal("El producto se Añadio", "Haz click el boton OK!", "success");
        }
      })
    })
  })
  $(document).ready(function() {
    $('#vaciar').click(function() {
      $.ajax({
        url: '../Proceso/CompraMateriales/vaciarCompraTemp.php',
        success: function(r) {
            $('#Tabla_entrada').load('IngresoProducto/TablaIngreso.php');
            swal("Fue borrado correctamente", "Haz click el boton OK!", "success");
        }
      })
    })
  })
  
</script>