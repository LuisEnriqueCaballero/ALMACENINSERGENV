$(document).ready(function(){
    // proceso de insertar datos
    $("#nuevo").click(function(){
        datos=$("#form_nuevo").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:'../proceso/Producto/insertProducto.php',
            success:function(r){
                if(r==1){
                    $('#form_nuevo')[0].reset();
                    $('#bdProducto').load('inventario/bd_producto.php');
                    swal({
                        title: "El dato agregado fue un exito!",
                        text: "Haz click al boton para cerrar la ventana!",
                        icon: "success",
                        button: "Cerrar!",
                      });
                }else{
                    alert("no se agrego")
                }
            }
        })
    })
    // proceso de actualizar datos
    $("#update").click(function(){
        datos=$("#form_update").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:'../proceso/Producto/updateProducto.php',
            success:function(r){
                if(r==1){
                    $('#bdProducto').load('inventario/bd_producto.php');
                    swal({
                        title: "Su actualizacion fue un exito!",
                        text: "Haz click al boton para cerrar la ventana!",
                        icon: "success",
                        button: "Cerrar!",
                      });
                }else{
                    swal("no se actualizo")
                }
            }
        })
    })
})
$(document).ready(function(){
    $('#bdProducto').load('inventario/bd_producto.php');
})
// obtener valores
function ObtenerDato(idproducto){
    $.ajax({
        type:"POST",
        data:'id='+idproducto,
        url:'../proceso/Producto/getProducto.php',
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#id').val(datos['ID_PRODUCTO']);
            $('#categoriaU').val(datos['ID_CATEGORIA']);
            $('#monedaU').val(datos['ID_MONEDA']);
            $('#marcaU').val(datos['MARCAR']);
            $('#productoU').val(datos['NOMBRE']);
            $('#precioU').val(datos['PRECIO_UNITARIO']);
            $('#medidaU').val(datos['UNIDAD_MEDIDA']);
            $('#cantidadU').val(datos['CANTIDAD_INICIAL']);
            $('#agotadoU').val(datos['SIN_STOCK']);
            $('#minimoU').val(datos['STOCK_MINIMO']);
            
            
        }
    })
}
// proceso eliminar datos
function deletedato(idproducto){
    swal({
        title: "¿Seguro que quiere eliminar este dato?",
        text: "cuando eliminar el dato, ya no podra recuperar",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type:"POST",
                data:"idproducto="+idproducto,
                url:'../proceso/Producto/deleteProducto.php',
                success:function(r){
                    if(r==1){
                        $('#bdProducto').load('inventario/bd_producto.php');
                        alert('Dato eliminado');
                    }else{
                        alert("no se agrego")
                    }
                }
            })
        } else {
            swal("Tu peticion ha sido cancelada");
        }
      });
}

