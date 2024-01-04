$(document).ready(function(){
    // proceso de insertar datos
    $("#nuevo").click(function(){
        datos=$("#formulario").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:'../proceso/Vehiculo/InsertVehiculo.php',
            success:function(r){
                if(r==2){
                    swal({
                        title: "La placa vehicular ya fue registrado!",
                        text: "Haz click al boton para cerrar la ventana!",
                        icon: "warning",
                        button: "Cerrar!",
                      });
                }
                else if(r==1){
                    $('#formulario')[0].reset();
                    $('#bdproceso').load('vehiculo/bd_vehiculo.php');
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
        datos=$("#formulario_update").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../proceso/Vehiculo/UpdateVehiculo.php",
            success:function(r){
                if(r==1){
                    $('#bdproceso').load('vehiculo/bd_vehiculo.php');
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
    $('#bdproceso').load('vehiculo/bd_vehiculo.php');
})
$(document).ready(function(){
    $('#MARCAU').change(function(){
        $.ajax({
            type:'POST',
            data:'idMarca='+$('#MARCAU').val(),
            url:'../proceso/Vehiculo/seleccionarMarca.php',
            success:function(r){
                $('#MODELOU').html(r)
            }
        })
    })
})

function ObtenerVehiculo(idVehiculo){
    $.ajax({
        type:"POST",
        data:'id='+idVehiculo,
        url:"../proceso/Vehiculo/GetVehiculo.php",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#ID').val(datos['ID_VEHICULO']);
            $('#CLIENTEU').val(datos['ID_CLIENTE']);
            $('#PLACAU').val(datos['NUMERO_PLACA']);
            $('#MARCAU').val(datos['ID_MARCAR']);
            $('#MODELOU').val(datos['ID_MODELO']);
            $('#COLORU').val(datos['COLOR_INGRESO']);
            $('#MOTORU').val(datos['NUMERO_MOTOR']);
            $('#VINU').val(datos['SERIE_VIN']);
            $('#CHASISU').val(datos['CHASIS']);
            $('#COMBUSTIBLEU').val(datos['TIPO_COMBUTIBLE']);
            $('#VEHICULOU').val(datos['TIPO_VEHICULO']);
            $('#INGRESOU').val(datos['FECHA_INGRESO']);
            $('#FABRICACIONU').val(datos['ANIO_FABRICACION']);
            $('#ANIO_MODELOU').val(datos['ANIO_MODELO']);
            $('#ESTADOU').val(datos['ESTADO']); 

            
        }
    })
}

function viewsVehiculo(idVehiculo){
    $.ajax({
        type:"POST",
        data:'id='+idVehiculo,
        url:"../proceso/Vehiculo/GetVehiculo.php",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#IDV').html(datos['ID_VEHICULO']);
            $('#CLIENTEV').html(datos['PROPIETARIO']);
            $('#PLACAV').html(datos['NUMERO_PLACA']);
            $('#MARCAV').html(datos['MARCA']);
            $('#MODELOV').html(datos['MODELO']);
            $('#COLORV').html(datos['COLOR_INGRESO']);
            $('#MOTORV').html(datos['NUMERO_MOTOR']);
            $('#VINV').html(datos['SERIE_VIN']);
            $('#CHASISV').html(datos['CHASIS']);
            $('#COMBUSTIBLEV').html(datos['TIPO_COMBUTIBLE']);
            $('#VEHICULOV').html(datos['TIPO_VEHICULO']);
            $('#INGRESOV').html(datos['FECHA_INGRESO']);
            $('#FABRICACIONV').html(datos['ANIO_FABRICACION']);
            $('#ANIO_MODELOV').html(datos['ANIO_MODELO']);
            $('#ESTADOV').html(datos['ESTADO']); 

            
        }
    })
}

// proceso eliminar datos
function DeleteVehiculo(idVehiculo){
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
                data:"idVehiculo="+idVehiculo,
                url:"../proceso/Vehiculo/DeleteVehiculo.php",
                success:function(r){
                    if(r==1){
                        $('#bdproceso').load('vehiculo/bd_vehiculo.php');
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
$(document).ready(function(){
    $('#MARCA').change(function(){
        $.ajax({
            type:'POST',
            data:'idMarca='+$('#MARCA').val(),
            url:'../proceso/Vehiculo/seleccionarMarca.php',
            success:function(r){
                $('#MODELO').html(r)
            }
        })
    })
})

