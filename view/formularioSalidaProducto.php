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
                            <h1 class="text-center">FORMULARIO DE SALIDA MATERIAL</h1>
                            <div class="formulario_salida" id="formulario_salida">

                            </div>
                            <div class="Tabla_Salida" id="Tabla_Salida">

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
    <script type="text/javascript" src="../js/FormularioSalida.js"></script>
    <?php
} else {
    header('location:../login.html');
}
?>
