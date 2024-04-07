$(document).ready(function(){
    $("#nuevo").click(function(){
        var dato=$("#form_nuevo").serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'../Controller/ControllMedida.php?ope=1',
            success:function(r){
                if(r==1){
                $("#form_nuevo")[0].reset();
                $('#bd_Unidad').load("UnidadMedida/bd_Unidad.php");
                swal({
                    title: "El dato agregado fue un exito!",
                    text: "Haz click al boton para cerrar la ventana!",
                    icon: "success",
                    button: "Cerrar!",
                  });
                }else{
                    swal({
                        title: "El dato no fue agregado",
                        text: "Haz click al boton para cerrar la ventana!",
                        icon: "error",
                        button: "Cerrar!",
                      });
                }
            }
        })
    })
    $("#update").click(function(){
        var dato=$("#form_update").serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'../Controller/ControllMedida.php?ope=2',
            success:function(r){
                if(r==1){
                $('#bd_Unidad').load("UnidadMedida/bd_Unidad.php");
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
    $('#bd_Unidad').load("UnidadMedida/bd_Unidad.php");
})
function GetUnidad(idunidad){
    $.ajax({
        type:'POST',
        data:'id='+idunidad,
        url:'../Controller/ControllMedida.php?ope=3',
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#id').val(datos['id_unidadmedida']);
            $('#descripcionU').val(datos['nombre_unidadmedida']);
            
        }
    })
}
function DeleteUnidad(idunidad){
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
                type:'POST',
                data:'idUnidad='+idunidad,
                url:'../Controller/ControllMedida.php?ope=4',
                success:function(r){
                    if(r==1){
                        $('#bd_Unidad').load("UnidadMedida/bd_Unidad.php");
                           alert("se eliminado")
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
