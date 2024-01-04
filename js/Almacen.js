function Elegir(id) {
    $.ajax({
      type: 'POST',
      data:'idelegri='+id,
      url: '../proceso/Almacen/seleccionarProducto.php',
      success: function (r) {
           datos = jQuery.parseJSON(r);
          $('#id').val(datos['IDALMACEN']);
          $('#idproducto').val(datos['IDPRODUCTO']);
          $('#idmoneda').val(datos['IDMONEDA']);
          $('#PRODUCTO').val(datos['PRODUCTO']);
          $('#STOCK').val(datos['CANTIDAD']);
          $('#PRECIO').val(datos['PRECIO']);
          swal("FUE ELEGIDO CORRETAMENTE", "Haz click el boton OK!", "success");
          }
         
      })
  }
  

$(document).ready(function(){
    $('#bdAlmacen').load('InventarioPrincipal/tabla_inventario.php')
})
$(document).ready(function(){
    $('#formulario_almacen').load('InventarioPrincipal/FormularioSalida.php')
})
$(document).ready(function(){
    $('#Tabla_almace').load('InventarioPrincipal/TablaSalidaAlmacel.php');
})

