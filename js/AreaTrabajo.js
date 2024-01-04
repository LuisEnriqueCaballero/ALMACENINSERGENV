$(document).ready(function(){
    $("#nuevo").click(function(){
        var dato=$("#form_nuevo").serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'../proceso/AreaTrabajo/insertArea.php',
            success:function(r){
                if(r==1){
                $("#form_nuevo")[0].reset();
                $('#area').load("AreaTrabajo/bd_area.php")
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
        var dato=$("#form_update").serialize();
        $.ajax({
            type:'POST',
            data:dato,
            url:'../proceso/AreaTrabajo/UpdateArea.php',
            success:function(r){
                if(r==1){
                    $('#area').load("AreaTrabajo/bd_area.php")
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
    $('#area').load("AreaTrabajo/bd_area.php")
})

function obtenerdatos(idarea){
    $.ajax({
        type:'POST',
        data:'id='+idarea,
        url:'../proceso/AreaTrabajo/GetArea.php',
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#ID').val(datos['ID_AREA']);
            $('#descripcionU').val(datos['DESCRIPCION']);
            
        }
    })
}
function EliminarDato(idarea){
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
                data:'idarea='+idarea,
                url:'../proceso/AreaTrabajo/DeleteArea.php',
                success:function(r){
                    if(r==1){
                        $('#area').load("AreaTrabajo/bd_area.php")
                        swal("se eliminado")
                        }else{
                        swal("no se eliminar")
                        }
                }
            })
        } else {
            swal("Tu peticion ha sido cancelada");
        }
      });
}

