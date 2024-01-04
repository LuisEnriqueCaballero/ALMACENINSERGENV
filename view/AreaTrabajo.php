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
                    <div class="mostrar_informacion" id="area">

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
<script type="text/javascript" src="../js/AreaTrabajo.js"></script>
<?php
include_once 'AreaTrabajo/modal/nuevoAreaTrabajo.php';
include_once 'AreaTrabajo/modal/updateAreaTrabajo.php';
?>
<?php
} else {
    header('location:../login.html');
}
    ?>