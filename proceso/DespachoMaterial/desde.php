<?php
include_once '../../view/libcss.php';
include_once "../../config/config.php";
include_once "../../metodo/MetodoDespacho.php";

$consulta=new Despacho();
if(isset($_POST['idproducto']) AND isset($_POST['idplaca'])){
$dato=array(
    $_POST['idfechaincio'],
    $_POST['idfechafin'],
    $_POST['idproducto'],
    $_POST['idplaca'],
);

echo $consulta->BuscarConsulta($dato);
}
?>
<script type="text/javascript">
   $(document).ready(function () {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            lengthMenu: [
        [100000, 500, -1],
        ['All', 500,'All']
    ],
            dom: 'Bfrtip',
    buttons: [
        'copy', 'excel', 'pdf'
    ]
        });
    });
</script>
<?php 
include_once '../../view/libjs.php';
?>