$(document).ready(function(){
    // proceso de insertar datos
    $("#nuevo").click(function(){
        datos=$("#formulario").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:'../proceso/Proveedor/InsertProveedor.php',
            success:function(r){
                if(r==1){
                    $('#formulario')[0].reset();
                    $('#bdproveedor').load('proveedor/bd_proveedor.php');
                    alert('Dato ingresado');
                }else{
                    alert("no se agrego")
                }
            }
        })
    })
    // proceso de actualizar datos
})

$(document).ready(function(){
    $("#update").click(function(){
        datos=$("#formulario_udpdate").serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../proceso/Proveedor/updateProveedor.php",
            success:function(r){
                if(r==1){
                    $('#bdproveedor').load('proveedor/bd_proveedor.php');
                    alert('Dato actualizado');
                }else{
                    alert("no se actualizo")
                }
            }
        })
    })
})
$(document).ready(function(){
    $('#bdproveedor').load('proveedor/bd_proveedor.php');
})
function ObtenerProveedor(id){
    $.ajax({
        type:"POST",
        data:'id='+id,
        url:"../proceso/Proveedor/GetProveedor.php",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('#idproveedor').val(datos['ID_PROVEEDOR']);
            $('#empresaU').val(datos['EMPRESA']);
            $('#rucU').val(datos['RUC']);
            $('#telefonoU').val(datos['TELEFONO_EMPRESA']);
            $('#nombreU').val(datos['NOMBRE_PROVEEDOR']);
            $('#apellidoU').val(datos['APELLIDO_PROVEEDOR']);
            $('#celularU').val(datos['TELEFONO_PROVEEDOR']);
            $('#celular1U').val(datos['TELEFONO_PROVEEDOR2']);
            $('#distritoU').val(datos['DISTRITO']);
            $('#direccionU').val(datos['DIRECCION']);
            $('#bancoU').val(datos['BANCO']);
            $('#cuentasU').val(datos['TIPO_CUENTA']);
            $('#cuentaU').val(datos['NUMERO_CUENTA']);
            $('#banco1U').val(datos['BANCO1']);
            $('#cuentas1U').val(datos['TIPO_CUENTA1']);
            $('#cuenta1U').val(datos['NUMERO_CUENTA1']);
            $('#banco2U').val(datos['BANCO2']);
            $('#cuentas2U').val(datos['TIPO_CUENTA2']);
            $('#cuenta2U').val(datos['NUMERO_CUENTA2']);
            $('#banco3U').val(datos['BANCO3']);
            $('#cuentas3U').val(datos['TIPO_CUENTA3']);
            $('#cuenta3U').val(datos['NUMERO_CUENTA3']);
        }
    })
}

function viewsProveedor(idProveedor){
    $.ajax({
        type:"POST",
        data:'id='+idProveedor,
        url:"../proceso/Proveedor/GetProveedor.php",
        success:function(r){
            datos=jQuery.parseJSON(r);
            $('idV').html(datos['ID_PROVEEDOR']);
            $('#empresaV').html(datos['EMPRESA']);
            $('#rucV').html(datos['RUC']);
            $('#telefonoV').html(datos['TELEFONO_EMPRESA']);
            $('#nombreV').html(datos['NOMBRE_PROVEEDOR']);
            $('#apellidoV').html(datos['APELLIDO_PROVEEDOR']);
            $('#celularV').html(datos['TELEFONO_PROVEEDOR']);
            $('#celular1V').html(datos['TELEFONO_PROVEEDOR2']);
            $('#distritoV').html(datos['UBDISTRITO']);
            $('#direccionV').html(datos['DIRECCION']);
            $('#bancoV').html(datos['IDENTIDADBANCARIA']);
            $('#cuentasV').html(datos['TIPO_CUENTA']);
            $('#cuentaV').html(datos['NUMERO_CUENTA']);
            $('#banco1V').html(datos['IDENTIDADBANCARIA1']);
            $('#cuentas1V').html(datos['TIPO_CUENTA1']);
            $('#cuenta1V').html(datos['NUMERO_CUENTA1']);
            $('#banco2V').html(datos['IDENTIDADBANCARIA2']);
            $('#cuentas2V').html(datos['TIPO_CUENTA2']);
            $('#cuenta2V').html(datos['NUMERO_CUENTA2']);
            $('#banco3V').html(datos['IDENTIDADBANCARIA3']);
            $('#cuentas3V').html(datos['TIPO_CUENTA3']);
            $('#cuenta3V').html(datos['NUMERO_CUENTA3']);
        }
    })
}

// proceso eliminar datos
function DeleteCliente(idProveedor){
    $.ajax({
        type:"POST",
        data:"idProveedor="+idProveedor,
        url:"../proceso/Proveedor/DeleteProveedor.php",
        success:function(r){
            if(r==1){
                $('#bdproveedor').load('proveedor/bd_proveedor.php');
                alert('Dato eliminado');
            }else{
                alert("no se agrego")
            }
        }
    })
}