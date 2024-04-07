$(document).ready(function(){
    $('#nuevo').click(function(){
        var datos=$('#formulario').serialize();
        $.ajax({
            type:'POST',
            data:datos,
            url:'../Controller/ControllModeloAuto.php?ope=1',
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
            url:'../Controller/ControllModeloAuto.php?ope=2',
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
        url:'../Controller/ControllModeloAuto.php?ope=3',
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
        url:'../Controller/ControllModeloAuto.php?ope=4',
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