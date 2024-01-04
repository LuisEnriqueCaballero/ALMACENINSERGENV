<?php
include_once '../../view/libcss.php';
include_once "../../config/config.php";
include_once '../../metodo/MetodoVehiculo.php';

$Vehiculo=new MetodoVehiculo();

if(isset($_POST['iddepartamento']) AND isset($_POST['idplaca'])){
$dato=array(
    $_POST['idfechaincio'],
    $_POST['idfechafin'],
    $_POST['iddepartamento'],
    $_POST['idplaca'],
);

echo $Vehiculo->BuscarConsulta($dato);
}
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