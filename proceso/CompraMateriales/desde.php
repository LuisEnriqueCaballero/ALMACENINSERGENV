<?php
include_once '../../view/libcss.php';
include_once "../../config/config.php";
require_once '../../Metodo/MetodoCompra.php';

$consulta=new Compra();

$dato=array(
    $_POST['idfechaincio'],
    $_POST['idfechafin'],
   
);

echo $consulta->BuscarFecha($dato);

?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({

        });
    });
</script>
<?php 
include_once '../../view/libjs.php';
?>