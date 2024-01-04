$(document).ready(function(){
    // proceso de insertar datos
    $("#nuevo").click(function(){
        datos=$("#formulario").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:'../proceso/Empleado/InsertEmpleado.php',
            success:function(r){
                if(r==1){
                    $('#formulario')[0].reset();
                    $('#bdproceso').load('empleado/bd_empleado.php');
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
        datos=$("#formulario_update").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../proceso/Empleado/UpdateEmpleado.php",
            success:function(r){
                if(r==1){
                    $('#bdproceso').load('empleado/bd_empleado.php');
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
    $('#bdproceso').load('empleado/bd_empleado.php');
})
function ObtenerEmpleado(idEmpleado){
    $.ajax({
        type:"POST",
        data:'id='+idEmpleado,
        url:"../proceso/Empleado/GetEmpleado.php",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#id').val(datos['ID_TRABAJADOR']);
            $('#DOCUMENTOU').val(datos['TIPO_DOCUMENTO']);
            $('#NUMEROU').val(datos['NUMERO_DOCUMENTO']);
$('#NOMBREU').val(datos['NOMBRE']);
$('#APELLIDOU').val(datos['APELLIDO']);
$('#EDADU').val(datos['EDAD']);
$('#SEXOU').val(datos['SEXO']);
$('#TELEFONOU').val(datos['TELEFONO']);
$('#CELULARU').val(datos['CELULAR']);
$('#AREAU').val(datos['AREA_TRABAJO']);
$('#DEPARTAMENTOU').val(datos['ID_DEPARTAMENTO']);
$('#PROVINCIAU').val(datos['ID_PROVINCIA']);
$('#DISTRITOU').val(datos['ID_DISTRITO']);
$('#DIRECCIONU').val(datos['DIRECCION']);
$('#HIJOU').val(datos['NUMERO_HIJO_MENOR']);
$('#PLANILLAU').val(datos['PLANILLA']);
$('#FECHA_CUMPLEU').val(datos['FECHA_CUMPLEANIO']);
$('#FECHA_INGRESOU').val(datos['FECHA_INGRESO']);
$('#BANCOU').val(datos['BANCO']);
$('#CUENTAU').val(datos['CUENTA']);
$('#ESTADOU').val(datos['ESTADO']);
   
        }
    })
}

function ViewsEmpleado(idEmpleado){
    $.ajax({
        type:"POST",
        data:'id='+idEmpleado,
        url:"../proceso/Empleado/GetEmpleado.php",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#idV').html(datos['ID_TRABAJADOR']);
            $('#DOCUMENTOV').html(datos['TIPO_DOCUMENTO']);
            $('#NUMEROV').html(datos['NUMERO_DOCUMENTO']);
$('#NOMBREV').html(datos['NOMBRE']);
$('#APELLIDOV').html(datos['APELLIDO']);
$('#EDADV').html(datos['EDAD']);
$('#SEXOV').html(datos['SEXO']);
$('#TELEFONOV').html(datos['TELEFONO']);
$('#CELULARV').html(datos['CELULAR']);
$('#AREAV').html(datos['AREATRABAJO']);
$('#DEPARTAMENTOV').html(datos['DEPARTAMENTO']);
$('#PROVINCIAV').html(datos['PROVINCIA']);
$('#DISTRITOV').html(datos['DISTRITO']);
$('#DIRECCIONV').html(datos['DIRECCION']);
$('#HIJOV').html(datos['NUMERO_HIJO_MENOR']);
$('#PLANILLAV').html(datos['PLANILLA']);
$('#FECHA_CUMPLEV').html(datos['FECHA_CUMPLEANIO']);
$('#FECHA_INGRESOV').html(datos['FECHA_INGRESO']);
$('#BANCOV').html(datos['IDENTIDADBANCARIA']);
$('#CUENTAV').html(datos['CUENTA']);
$('#ESTADOV').html(datos['ESTADO']);
   
        }
    })
}
// proceso eliminar datos
function DeleteEmpleado(idEmpleado){
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
                data:"idEmpleado="+idEmpleado,
                url:"../proceso/Empleado/DeleteEmpleado.php",
                success:function(r){
                    if(r==1){
                        $('#bdproceso').load('empleado/bd_empleado.php');
                        swal('Dato eliminado');
                    }else{
                        error("no se agrego")
                    }
                }
            })
        } else {
            swal("Tu peticion ha sido cancelada");
        }
      });
}

$(document).ready(function(){
    $('#DEPARTAMENTO').change(function(){
        $.ajax({
        type:"POST",
        data:"iddepartamento="+$('#DEPARTAMENTO').val(),
        url:"../proceso/Empleado/SeleccioneDepartamento.php",
        success:function(r){
                $('#PROVINCIA').html(r);
        }
        })
    })
})
$(document).ready(function(){
    $('#PROVINCIA').change(function(){
        $.ajax({
        type:"POST",
        data:"idprovincia="+$('#PROVINCIA').val(),
        url:"../proceso/Empleado/SeleccioneProvincia.php",
        success:function(r){
                $('#DISTRITO').html(r);
        }
        })
    })
})

$(document).ready(function(){
    $('#DEPARTAMENTOU').change(function(){
        $.ajax({
        type:"POST",
        data:"iddepartamento="+$('#DEPARTAMENTOU').val(),
        url:"../proceso/Empleado/SeleccioneDepartamento.php",
        success:function(r){
                $('#PROVINCIAU').html(r);
        }
        })
    })
})
$(document).ready(function(){
    $('#PROVINCIAU').change(function(){
        $.ajax({
        type:"POST",
        data:"idprovincia="+$('#PROVINCIAU').val(),
        url:"../proceso/Empleado/SeleccioneProvincia.php",
        success:function(r){
                $('#DISTRITOU').html(r);
        }
        })
    })
})
