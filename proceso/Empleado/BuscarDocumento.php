<?php 
include_once '../../view/libcss.php';
include_once '../../config/config.php';
include_once '../../metodo/MetodoEmpleado.php';

$empleado=new MetodoEmpleado();

   if(isset($_POST['name'])){
    $id=$_POST['name'];
    echo $empleado->BuscarDocumento($id);
   }else if(!isset($_POST['name'])){
    echo $empleado->BuscarDocumento($id);
   }
   
?>


