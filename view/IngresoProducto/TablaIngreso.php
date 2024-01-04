<?php
session_start();

?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">PRODUCTO</th>
      <th scope="col">PRECIO</th>
      <th scope="col">CANTIDAD</th>
      <th scope="col">SUBTOTAL</th>
      <th scope="col">QUITAR</th>
    </tr>
  </thead>
  <tbody>
  <?php

$total = 0.00;
$trabajador = "";
$placa = "";
if (isset($_SESSION['listacompratemp'])) :
  $i = 0;
  foreach ($_SESSION['listacompratemp'] as $key) {
    $d = explode("||", @$key)

?>
    <tr class="text-center">
      <td><?php echo $i+1 ?></td>
      <td><?php echo $d[5] ?></td>
      <td><?php echo $d[6] ?></td>
      <td><?php echo $d[7] ?></td>
      <td><?php echo $subtotal = $d[6] * $d[7] ?></td>
      <td>
        <span class="btn btn-outline-danger" onclick="quitarC('<?php echo $i ?>')">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
          </svg>
        </span>
      </td>
    </tr>
<?php
    $total = $total + $subtotal;
    $i++;
  }
endif;
?>
<tr>
  <td colspan="4">Total</td>
  <td><?php echo $total?></td>
</tr>
  </tbody>
</table>
<div class="btnregistrar">
  <button type="button" class="btn btn-primary" onclick="compramaterial()">REGISTRAR</button>
</div>

<script>
  function quitarC(index) {
    $.ajax({
      type: 'POST',
      data: "ind=" + index,
      url: '../proceso/CompraMateriales/quitarProducto.php',
      success: function (r) {
        $('#Tabla_entrada').load('IngresoProducto/TablaIngreso.php');
        swal("FUE QUITADO CORRECTAMENTE!", "HAZ CLICK EN EL BOTON OK!", "success");
      }
    })
  }

  function compramaterial() {
    $.ajax({
      url: '../proceso/CompraMateriales/Ingresomaterial.php',
      success: function (r) {
        if (r>0) {
          $('#Tabla_entrada').load('IngresoProducto/TablaIngreso.php');
          swal("FUE GUARDADO CORRECTAMENTE!", "HAZ CLICK EN EL BOTON OK!", "success");
          // window.location = '../views/listaCompraMateriales.php';
        } else if (r == 0) {
          alert("no lista de salida producto")
        } else {
          // alertify.error("no se pudo crea salida material")
          $('#Tabla_entrada').load('IngresoProducto/TablaIngreso.php');
          swal("FUE GUARDADO CORRECTAMENTE!", "HAZ CLICK EN EL BOTON OK!", "success");
          // window.location = '../views/listaentregamaterial.php';
        }
      }
    })
  }
</script>