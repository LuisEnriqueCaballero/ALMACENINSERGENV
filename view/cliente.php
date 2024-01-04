<?php 
session_start();
if (isset($_SESSION['usuario'])) {
include_once "libcss.php";
?>
<body>
    <div class="contenido">
        <?php
        include_once "menu.php"; 
        ?>
        <div class="contenedor ">
            <?php
            include_once "slider.php"
            ?>
            <div class="informacion " id="informacion"> 
                <div class="panel" >
                    <div class="mostrar_informacion" id="bdcliente">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php 
include_once "libjs.php";
?>
<script type="text/javascript" src="../js/Clientes.js"></script>
<?php

include_once 'Cliente/modal/insertCliente.php';
include_once 'Cliente/modal/updateCliente.php';
include_once 'Cliente/modal/viewCliente.php';

?>
<?php
} else {
    header('location:../login.html');
}
    ?>

