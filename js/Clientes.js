$(document).ready(function(){
    // proceso de insertar datos
    $("#nuevo").click(function(){
        datos=$("#form_nuevo").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:'../Controller/Controllcliente.php?ope=1',
            success:function(r){
                if(r==1){
                    $('#form_nuevo')[0].reset();
                    $('#bdcliente').load('Cliente/bd_cliente.php');
                    swal({
                        title: "El dato agregado fue un exito!",
                        text: "Haz click al boton para cerrar la ventana!",
                        icon: "success",
                        button: "Cerrar!",
                      });
                }else{
                    swal("No se agrego correctamente", "Haz click en boton para cerra venta", "error");  
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
            url:"../Controller/Controllcliente.php?ope=2",
            success:function(r){
                if(r==1){
                    $('#bdcliente').load('Cliente/bd_cliente.php');
                    swal({
                        title: "Su actualizacion fue un exito!",
                        text: "Haz click al boton para cerrar la ventana!",
                        icon: "success",
                        button: "Cerrar!",
                      });
                }else{
                    swal("No se actualizo correctamente", "Haz click en boton para cerra venta", "error");
                }
            }
        })
    })
})
$(document).ready(function(){
    $('#bdcliente').load('Cliente/bd_cliente.php');
})
function ObtenerCliente(idcliente){
    $.ajax({
        type:"POST",
        data:'id='+idcliente,
        url:"../Controller/Controllcliente.php?ope=3",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#id').val(datos['ID_CLIENTE']);
            $('#tipoU').val(datos['TIPO_CLIENTE']);
            $('#empresaU').val(datos['EMPRESA']);
            $('#rucU').val(datos['RUC']);
            $('#telefono_empresaU').val(datos['TELEFONO']);
            $('#nombresU').val(datos['NOMBRE_PROPIETARIO']);
            $('#apellidoU').val(datos['APELLIDO_PROPIETARIO']);
            $('#dniU').val(datos['DNI']);
            $('#telefonoU').val(datos['TELEFONO_PERSONA']);
            $('#emailU').val(datos['EMAIL']);
            $('#departamentoU').val(datos['ID_DEPARTAMENTO']);
            $('#provinciaU').val(datos['ID_PROVINCIA']);
            $('#distritoU').val(datos['ID_DISTRITO']);
            $('#direccionU').val(datos['DIRECCION']);
            
        }
    })
}

function viewsCliente(idcliente){
    $.ajax({
        type:"POST",
        data:'id='+idcliente,
        url:"../Controller/Controllcliente.php?ope=5",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#idV').html(datos['ID_CLIENTE']);
            $('#tipoV').html(datos['TIPO_CLIENTE']);
            $('#empresaV').html(datos['EMPRESA']);
            $('#rucV').html(datos['RUC']);
            $('#telefono_empresaV').html(datos['TELEFONO']);
            $('#nombresV').html(datos['NOMBRE_PROPIETARIO']);
            $('#apellidoV').html(datos['APELLIDO_PROPIETARIO']);
            $('#dniV').html(datos['DNI']);
            $('#telefonoV').html(datos['TELEFONO_PERSONA']);
            $('#emailV').html(datos['EMAIL']);
            $('#departamentoV').html(datos['DEPARTAMENTO']);
            $('#provinciaV').html(datos['PROVINCIA']);
            $('#distritoV').html(datos['DISTRITO']);
            $('#direccionV').html(datos['DIRECCION']);
            
        }
    })
}

// proceso eliminar datos
function DeleteCliente(idCliente){
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
                data:"idCliente="+idCliente,
                url:"../Controller/Controllcliente.php?ope=4",
                success:function(r){
                    if(r==1){
                        $('#bdcliente').load('Cliente/bd_cliente.php');
                        swal('Dato eliminado');
                    }else{
                        swal("no se agrego")
                    }
                }
            })
        } else {
          swal("Tu peticion ha sido cancelada");
        }
      });
}

$(document).ready(function(){
    $('#departamento').change(function(){
        $.ajax({
        type:"POST",
        data:"iddepartamento="+$('#departamento').val(),
        url:"../Controller/Controllcliente.php?ope=6",
        success:function(r){
                $('#provincia').html(r);
        }
        })
    })
})
$(document).ready(function(){
    $('#provincia').change(function(){
        $.ajax({
        type:"POST",
        data:"idprovincia="+$('#provincia').val(),
        url:"../Controller/Controllcliente.php?ope=7",
        success:function(r){
                $('#distrito').html(r);
        }
        })
    })
})

$(document).ready(function(){
    $('#departamentoU').change(function(){
        $.ajax({
        type:"POST",
        data:"iddepartamento="+$('#departamentoU').val(),
        url:"../proceso/Empleado/SeleccioneDepartamento.php",
        success:function(r){
                $('#provinciaU').html(r);
        }
        })
    })
})
$(document).ready(function(){
    $('#provinciaU').change(function(){
        $.ajax({
        type:"POST",
        data:"idprovincia="+$('#provinciaU').val(),
        url:"../proceso/Empleado/SeleccioneProvincia.php",
        success:function(r){
                $('#distritoU').html(r);
        }
        })
    })
})


