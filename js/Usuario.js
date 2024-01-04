$(document).ready(function(){
    $('#boton').click(function(){
        dato=$('#formulario').serialize();
        $.ajax({
            type:"POST",
            data:dato,
            url:'proceso/Usuario/validarUsuario.php',
            success:function(r){
                if(r==1){
                    window.location='view/index.php';
                }else{
                    alert("datos incorrecto")
                }
            }
        })
    })
})


$(document).ready(function(){
    // proceso de insertar datos
    $("#nuevo").click(function(){
        datos=$("#formulario").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:'../proceso/Usuario/insertUsuario.php',
            success:function(r){
                if(r==2){
                    swal({
                        title: "El correo electronico ya fue registrado!",
                        text: "Haz click al boton para cerrar la ventana!",
                        icon: "warning",
                        button: "Cerrar!",
                      });
                }
                else if(r==1){
                    $('#formulario')[0].reset();
                    $('#bdUsuario').load("Usuario/bd_Usuario.php");
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
            url:"../proceso/Usuario/UpdateUsuario.php",
            success:function(r){
                if(r==1){
                    $('#bdUsuario').load("Usuario/bd_Usuario.php");
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
    $('#bdUsuario').load("Usuario/bd_Usuario.php");
})
function GetUsuario(idUsuario){
    $.ajax({
        type:"POST",
        data:'id='+idUsuario,
        url:"../proceso/Usuario/GetUsuario.php",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#ID').val(datos['ID_USUARIO']);
            $('#AREAU').val(datos['ID_AREA']);
            $('#PASSWORDU').val(datos['CONTRASENIA']);
            $('#EMAILU').val(datos['EMAIL']);
            $('#NOMBREU').val(datos['NOMBRE']);
            $('#APELLIDOU').val(datos['APELLIDO']);
        }
    })
}
function viewstUsuario(idUsuario){
    $.ajax({
        type:"POST",
        data:'id='+idUsuario,
        url:"../proceso/Usuario/GetUsuario.php",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#IDV').html(datos['ID_USUARIO']);
            $('#AREAV').html(datos['AREA']);
            $('#PASSWORDV').html(datos['CONTRASENIA']);
            $('#EMAILV').html(datos['EMAIL']);
            $('#NOMBREV').html(datos['NOMBRE']);
            $('#APELLIDOV').html(datos['APELLIDO']);
        }
    })
}
// proceso eliminar datos
function DeleteUsuario(idUsuario){
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
                data:"idUsuario="+idUsuario,
                url:"../proceso/Usuario/DeleteUsuario.php",
                success:function(r){
                    if(r==1){
                        $('#bdUsuario').load("Usuario/bd_Usuario.php");
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
