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
                <h1 class="text-center">REPORTES INSERGENV</h1>
                <div class="row">
                    <div class="col-sm-12 ml-3 mt-3">
                        <span class="btn btn-outline-primary" id="bntReportePersonal">Reporte Peronal</span>
                        <span class="btn btn-outline-primary" id="bntReporteVehiculo">Reporte Vehiculo</span>
                        <span class="btn btn-outline-primary" id="bntReporteCliente">Reporte Cliente</span>
                        <span class="btn btn-outline-primary" id="bntReporteProveedor">Reporte Proveedor</span>
                        <span class="btn btn-outline-primary" id="bntReporteCuenta">Reporte Proveedor Cuenta</span>
                        <span class="btn btn-outline-primary" id="bntReporteEntregado">Reporte Vehiculoe Entregado</span>
                        
                    </div>
                <div class="row mostrar_informacion">
                    <div class="col-sm-12">
                        <div  id="ReportePersonal"></div>
                        <div  id="ReporteVehiculo"></div>
                        <div  id="ReporteCliente"></div>
                        <div  id="ReporteProveedor"></div>
                        <div  id="ReporteCuenta"></div>
                        <div  id="ReporteEntregado"></div>
                    </div>
                </div>    
                <!-- </div>
                    <div class="mostrar_informacion" id="Reporte">
                        
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>
<?php 
include_once "libjs.php";
?>
<script type="text/javascript" src="../js/Reporte.js"></script>

<?php
} else {
    header('location:../login.html');
}
    ?>

