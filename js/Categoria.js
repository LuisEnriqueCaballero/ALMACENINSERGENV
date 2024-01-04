$(document).ready(function(){
    // proceso de insertar datos
    $("#nuevo").click(function(){
        datos=$("#form_nuevo").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:'../proceso/Categoria/insertCategoria.php',
            success:function(r){
                if(r==1){
                    $('#form_nuevo')[0].reset();
                    $('#bdCategoria').load('categoria/bd_categoria.php');
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
            url:'../proceso/Categoria/updateCategoria.php',
            success:function(r){
                if(r==1){
                    $('#bdCategoria').load('categoria/bd_categoria.php');
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
    $('#bdCategoria').load('categoria/bd_categoria.php');
})
// obtener valores
function ObtenerDato(idcategoria){
    $.ajax({
        type:"POST",
        data:'id='+idcategoria,
        url:'../proceso/Categoria/getInformation.php',
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#id').val(datos['ID_CATEGORIA']);
            $('#descripcionU').val(datos['NOMBRE_CATEGORIA']);
        }
    })
}
// proceso eliminar datos
function deletedato(idcategoria){
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
                data:"idcategoria="+idcategoria,
                url:'../proceso/Categoria/deleteCategoria.php',
                success:function(r){
                    if(r==1){
                        $('#bdCategoria').load('categoria/bd_categoria.php');
                        swal('Dato eliminado');
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
