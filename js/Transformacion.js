$(document).ready(function(){
    $('#nuevo').click(function(){
        var subproceso=$('#subprocedimiento').val();
        if(subproceso==0){
            swal("llenar Campo obligatorio Procedimiento!", "Haz click en el boton ok!", "warning");
        }else{
            var datos=$('#form_nuevo').serialize();
            $.ajax({
                type:'POST',
                data:datos,
                url:'../proceso/Transformacion/InsertTransformacion.php',
                success:function(r){
                    if(r==1){
                        $('#form_nuevo')[0].reset();
                        $('#bdtransformacion').load('Transformacion/bd_transformacion.php');
                        alert("se agrego");
                    }else{
                        alert("no se agrego");
                    }
                }
            })
        }
        
    })
    $('#update').click(function(){
        var datos=$('#form_update').serialize();
        $.ajax({
            type:'POST',
            data:datos,
            url:'../proceso/Transformacion/UpdateTransformacion.php',
            success:function(r){
                if(r==1){
                    $('#bdtransformacion').load('Transformacion/bd_transformacion.php');
                    alert("se ACTUALIZO");
                }else{
                    alert("no se ACTUALIZO");
                }
            }
        })
    })
})
$(document).ready(function(){
    $('#bdtransformacion').load('Transformacion/bd_transformacion.php');
})

function ObtenerTransformacion(idtransformacion){
    $.ajax({
        type:"POST",
        data:'id='+idtransformacion,
        url:"../proceso/Transformacion/GetTransformacion.php",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#id').val(datos['ID_DETALLE_PROCESO']);
            $('#vehiculoU').val(datos['ID_AUTO']);
            $('#procesoU').val(datos['ID_PROCESO']);
            $('#subprocedimientoU').val(datos['ID_SUBPROCESO']);
            $('#fecha_inicioU').val(datos['FECHA_INICIO']);
            $('#fecha_finalU').val(datos['FECHA_FINAL']);
        }
    })
}

$(document).ready(function(){
    $('#proceso').change(function(){
        $.ajax({
            type:"POST",
            data:'id='+$('#proceso').val(),
            url:"../proceso/Transformacion/SelecProceso.php",
            success:function(r){
             $('#subprocedimiento').html(r);
            }
        })
    })
})
$(document).ready(function(){
    $('#procesoU').change(function(){
        $.ajax({
            type:"POST",
            data:'id='+$('#procesoU').val(),
            url:"../proceso/Transformacion/SelecProceso.php",
            success:function(r){
             $('#subprocedimientoU').html(r);
            }
        })
    })
})
