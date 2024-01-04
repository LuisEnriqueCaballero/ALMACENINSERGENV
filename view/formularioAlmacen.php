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
                    <div class="panel">
                        <div class="salida">
                            <h1 class="text-center">FORMULARIO DE SALIDA MATERIAL ALMACEN PRINCIPAL</h1>
                            <div class="formulario_salida" id="formulario_almacen">

                            </div>
                            <div class="Tabla_Salida" id="Tabla_almace">

                            </div>
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
    <script type="text/javascript" src="../js/Almacen.js"></script>
    <?php
    include_once "InventarioPrincipal/modal/tablaProducto.php";
    ?>
    <?php
    
} else {
    header('location:../login.html');
}
?>
