$(document).ready(function(){
    $('#nuevo').click(function(){
        var datos=$('#formulario').serialize();
        $.ajax({
            type:'POST',
            data:datos,
            url:'../proceso/ModeloAuto/insertaModelo.php',
            success:function(r){
                if(r==1){
                    $('#formulario')[0].reset();
                    $('#bdproceso').load('modelo_auto/bd_modelo.php');
                    alert("se agrego");
                }else{
                    alert("no se agrego");
                }
            }
        })
    })
    $('#update').click(function(){
        var datos=$('#formulario_update').serialize();
        $.ajax({
            type:'POST',
            data:datos,
            url:'../proceso/ModeloAuto/updateModelo.php',
            success:function(r){
                if(r==1){
                    $('#bdproceso').load('modelo_auto/bd_modelo.php');
                    alert("se ACTUALIZO");
                }else{
                    alert("no se ACTUALIZO");
                }
            }
        })
    })
})
$(document).ready(function(){
    $('#bdproceso').load('modelo_auto/bd_modelo.php');
})

function obtenerdatos(id){
    $.ajax({
        type:'POST',
        data:'idmodelo='+id,
        url:'../proceso/ModeloAuto/obtenerDato.php',
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#id').val(datos['ID_MODELO']);
            $('#marcaU').val(datos['ID_MARCA']);
            $('#modeloU').val(datos['MODELO']);
        }
    })
}
function Eliminardato(idmodelo){
    $.ajax({
        type:'POST',
        data:'id='+idmodelo,
        url:'../proceso/ModeloAuto/deleteModelo.php',
        success:function(r){
            if(r==1){
                $('#bdproceso').load('modelo_auto/bd_modelo.php');
                alert("se elimine");
            }else{
                alert("se no elimine");
            }
        }
    })
}