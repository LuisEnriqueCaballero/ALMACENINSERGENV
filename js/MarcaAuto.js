$(document).ready(function(){
    $('#nuevo').click(function(){
        var datos=$('#form_nuevo').serialize();
        $.ajax({
            type:'POST',
            data:datos,
            url:'../proceso/MarcaAuto/insertarMarca.php',
            success:function(r){
                if(r==1){
                    $('#form_nuevo')[0].reset();
                    $('#bdproceso').load('marca_auto/bd_marca.php');
                    alert("se agrego");
                }else{
                    alert("no se agrego");
                }
            }
        })
    })
    $('#update').click(function(){
        var datos=$('#form_update').serialize();
        $.ajax({
            type:'POST',
            data:datos,
            url:'../proceso/MarcaAuto/updateMarca.php',
            success:function(r){
                if(r==1){
                    $('#bdproceso').load('marca_auto/bd_marca.php');
                    alert("se ACTUALIZO");
                }else{
                    alert("no se ACTUALIZO");
                }
            }
        })
    })
})
$(document).ready(function(){
    $('#bdproceso').load('marca_auto/bd_marca.php');
})

function obtenerdatos(id){
    $.ajax({
        type:'POST',
        data:'idmarca='+id,
        url:'../proceso/MarcaAuto/obtenerMarca.php',
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#id').val(datos['ID_MARCA']);
            $('#descripcionU').val(datos['MARCA']);
        }
    })
}
function Eliminardato(idmarca){
    $.ajax({
        type:'POST',
        data:'id='+idmarca,
        url:'../proceso/MarcaAuto/deteleMarca.php',
        success:function(r){
            if(r==1){
                $('#bdproceso').load('marca_auto/bd_marca.php');
                alert("se elimine");
            }else{
                alert("se no elimine");
            }
        }
    })
}