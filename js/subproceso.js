$(document).ready(function(){
    $("#nuevo").click(function(){
        var dato=$("#formulario").serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'../Controller/ControllSubproceso.php?ope=1',
            success:function(r){
                if(r==1){
                $("#formulario")[0].reset();
                $('#subbdproceso').load("subproceso/bd_subproceso.php");
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
    $("#update").click(function(){
        var dato=$("#formularioU").serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'../Controller/ControllSubproceso.php?ope=2',
            success:function(r){
                if(r==1){
                $('#subbdproceso').load("subproceso/bd_subproceso.php");
                swal({
                    title: "Su actualizacion fue un exito!",
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
})

$(document).ready(function(){
    $('#subbdproceso').load("subproceso/bd_subproceso.php")
})

function obtenerdatos(idsubproceso){
    $.ajax({
        type:'POST',
        data:'idsubproceso='+idsubproceso,
        url:'../Controller/ControllSubproceso.php?ope=3',
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#id').val(datos['ID_SUBPROCESO']);
            $('#procesoU').val(datos['ID_PROCESO']);
            $('#subprocesoU').val(datos['DESCRIPCION_SUBPROCESO']);
        }
    })
}

function EliminarDato(idsubproceso){
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
                data:'id='+idsubproceso,
                url:'../Controller/ControllSubproceso.php?ope=4',
                success:function(r){
                    if(r==1){
                        $('#subbdproceso').load("subproceso/bd_subproceso.php");
                        swal("se eliminado")
                        }else{
                            swal("no se elimino")
                        }
                }
            })
        } else {
            swal("Tu peticion ha sido cancelada");
        }
      });
}