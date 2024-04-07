$(document).ready(function(){
    // proceso de insertar datos
    $("#nuevo").click(function(){
        datos=$("#form_nuevo").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:'../Controller/ControllProceso.php?ope=1',
            success:function(r){
                if(r==1){
                    $('#form_nuevo')[0].reset();
                    $('#bdproceso').load('proceso/bd_proceso.php');
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
            url:"../Controller/ControllProceso.php?ope=2",
            success:function(r){
                if(r==1){
                    $('#bdproceso').load('proceso/bd_proceso.php');
                    swal({
                        title: "Su actualizacion fue un exito!",
                        text: "Haz click al boton para cerrar la ventana!",
                        icon: "success",
                        button: "Cerrar!",
                      });
                }else{
                    alert("no se actualizo")
                }
            }
        })
    })
})
$(document).ready(function(){
    $('#bdproceso').load('proceso/bd_proceso.php');
})
// obtener valores
function ObtenerDato(idproceso){
    $.ajax({
        type:"POST",
        data:'id='+idproceso,
        url:"../Controller/ControllProceso.php?ope=3",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#id').val(datos['ID_PROCESO']);
            $('#descripcionU').val(datos['DESCRIPCION_PROCESO']);
        }
    })
}
// proceso eliminar datos
function deletedato(idproceso){
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
            data:"idproceso="+idproceso,
            url:"../Controller/ControllProceso.php?ope=4",
                success:function(r){
                    if(r==1){
                        $('#bdproceso').load('proceso/bd_proceso.php');
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

