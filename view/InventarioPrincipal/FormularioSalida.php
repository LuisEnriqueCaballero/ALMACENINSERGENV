<form id="despachoAlmacen">
    <div class="form-row">
        <input type="text" id="id" name="id" hidden>
        <input type="text" id="idproducto"  name="idproducto" hidden>
        <input type="text" id="idmoneda"  name="idmoneda" hidden>
        <div class="col-md-4" style="position:relative;">
            <label for="">Producto</label>
            <input type="text" name="PRODUCTO" id="PRODUCTO" placeholder="BUSCAR PRODUCTO" class="form-control"
                readonly>
            <button type="button" data-toggle="modal" data-target="#elegirProducto" style="position: absolute;
                   top:30px;
                   left: 358px;
                   color: #ffffff;
                   border-radius: 10px;">
                <img src="../asset/search-square-svgrepo-com.svg" alt="" id="buscador">
            </button>
        </div>
        <div class="col-md-2">
            <label for="">Precio Unitario</label>
            <input type="text" name="PRECIO" id="PRECIO" class="form-control" readonly>
        </div>
        <div class="col-md-2">
            <label for="">cantidad</label>
            <input type="text" name="CANTIDAD" id="CANTIDAD" class="form-control" value=0>
        </div>
        <div class="col-md-2">
            <label for="">stock producto</label>
            <input type="text" name="STOCK" id="STOCK" class="form-control" readonly>
        </div>
        <div class="col-md-2">
            <label for="">Queda</label>
            <input type="text" name="QUEDA" id="QUEDA" class="form-control" readonly>
        </div>
    </div>

</form>
<div class="form-row botones">
    <div>
        <button type="button" class="btn btn-success" id="aniadir">Agregar Producto</button>
    </div>
    <div>
        <button type="button" class="btn btn-danger" id="limpiar">Vaciar Pedido</button>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#aniadir').click(function () {
            datos = $('#despachoAlmacen').serialize();
            $.ajax({
                type: 'POST',
                data: datos,
                url: '../proceso/Almacen/Despachoproductotemp.php',
                success: function (r) {
                    $('#despachoAlmacen')[0].reset();
                    $('#CANTIDAD').val('0');
                    $('#Tabla_almace').load('InventarioPrincipal/TablaSalidaAlmacel.php')
                    swal("El producto se Añadio", "Haz click el boton OK!", "success");
                }
            })
        })
        $('#limpiar').click(function () {
            $.ajax({
                url: '../proceso/Almacen/vaciarsalidaTemp.php',
                success: function (r) {
                    $('#Tabla_almace').load('InventarioPrincipal/TablaSalidaAlmacel.php')
                    swal("Fue borrado correctamente", "Haz click el boton OK!", "success");
                }
            })
        })

    })
</script>