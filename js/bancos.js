$(document).ready(function(){
    // proceso de insertar datos
    $("#nuevo").click(function(){
        datos=$("#form_nuevo").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:'../Controller/ControllBanco.php?ope=1',
            success:function(r){
                if(r==1){
                    $('#form_nuevo')[0].reset();
                    $('#bdproceso').load('banco/bd_banco.php');
                    alert('Dato ingresado');
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
            url:"../Controller/ControllBanco.php?ope=2",
            success:function(r){
                if(r==1){
                    $('#bdproceso').load('banco/bd_banco.php');
                    alert('Dato actualizado');
                }else{
                    alert("no se actualizo")
                }
            }
        })
    })
})

$(document).ready(function(){
    $('#bdproceso').load('banco/bd_banco.php');
})
function ObtenerDato(idbanco){
    $.ajax({
        type:"POST",
        data:'id='+idbanco,
        url:"../Controller/ControllBanco.php?ope=3",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#id').val(datos['id_banco']);
            $('#descripcionU').val(datos['nombre_banco']);
        }
    })
}
// proceso eliminar datos
function deletedato(id){
    $.ajax({
        type:"POST",
        data:"idbanco="+id,
        url:"../Controller/ControllBanco.php?ope=4",
        success:function(r){
            if(r==1){
                $('#bdproceso').load('banco/bd_banco.php');
                alert('Dato eliminado');
            }else{
                alert("no se agrego")
            }
        }
    })
}