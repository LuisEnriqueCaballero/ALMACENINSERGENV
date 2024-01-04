<?php
include_once "../../config/config.php";
$conexion = new Conexion();
$cnx = $conexion->Conectar();

$consulta = "SELECT count(*) FROM vehiculo WHERE ESTADO='TRANSFORMACION'";
$query = mysqli_query($cnx, $consulta);
$cantidad = mysqli_fetch_array($query)[0];

$consulta1 = "SELECT count(*) FROM cliente";
$query1 = mysqli_query($cnx, $consulta1);
$cantidad1 = mysqli_fetch_array($query1)[0];

$consulta2 = "SELECT count(*) FROM proveedor";
$query2 = mysqli_query($cnx, $consulta2);
$cantidad2 = mysqli_fetch_array($query2)[0];

$consulta3 = "SELECT count(*) FROM trabajadore WHERE ESTADO = 'A'";
$query3 = mysqli_query($cnx, $consulta3);
$cantidad3 = mysqli_fetch_array($query3)[0];

$consulta4 = "SELECT IF(SUM(TSALI.CANTIDAD*TSALI.PRECIO_UNITARIO) IS NULL,0.00,SUM(TSALI.CANTIDAD*TSALI.PRECIO_UNITARIO)) FROM salida_material AS TSALI
LEFT  JOIN producto AS TPROD ON TSALI.ID_PRODUCTO=TPROD.ID_PRODUCTO
WHERE TPROD.ID_MONEDA='1'";
$query4 = mysqli_query($cnx, $consulta4);
$cantidad4 = mysqli_fetch_array($query4)[0];

$consulta5 = "SELECT IF(SUM(TSALI.CANTIDAD*TSALI.PRECIO_UNITARIO) IS NULL,0.00,SUM(TSALI.CANTIDAD*TSALI.PRECIO_UNITARIO)) FROM salida_material AS TSALI
LEFT  JOIN producto AS TPROD ON TSALI.ID_PRODUCTO=TPROD.ID_PRODUCTO
WHERE TPROD.ID_MONEDA='2'";
$query5 = mysqli_query($cnx, $consulta5);
$cantidad5 = mysqli_fetch_array($query5)[0];

?>

<div class="panel panel-primary">
    <div class="CajaPrincipal">
        <div class="caja">
            <a href="cliente.php"><img src="../asset/person-who-gargles-svgrepo-com.svg" alt=""> <span>clientes
                    <?php echo $cantidad1 ?>
                </span> </a>

        </div>
        <div class="caja">
            <a href="proveedor.php"><img src="../asset/person-who-gargles-svgrepo-com.svg" alt=""> <span>proveedores
                    <?php echo $cantidad2 ?>
                </span>
            </a>

        </div>
        <div class="caja">
            <a href="empleado.php"><img src="../asset/factory-worker-svgrepo-com.svg" alt=""> <span>empleados
                    <?php echo $cantidad3 ?>
                </span> </a>

        </div>
        <div class="caja">
            <a href="vehiculo.php"><img src="../asset/car-white-svgrepo-com.svg" alt=""> <span>vehiculos
                    <?php echo $cantidad ?>
                </span> </a>

        </div>
        <div class="caja">
            <a href="#"><img src="../asset/peru-nuevo-sol-currency-symbol-svgrepo-com.svg" alt=""> <span
                    style="font-size:3rem;">
                    <?php echo $cantidad4 ?>
                </span> </a>
        </div>
        <div class="caja">
            <a href="#"><img src="../asset/dollar-bag-svgrepo-com.svg" alt=""><span style="font-size:3rem">
                    <?php echo $cantidad5 ?>
                </span> </a>
        </div>
    </div>
    <div class="panel panel-heading">
        Gafica Consumo Producto
    </div>
    <div class="panel panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div id="lineal1"></div>
            </div>
            <div class="col-sm-12">
                <div id="lineal2"></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#lineal1').load('dashbord/graficoconsumoSoles.php');
        $('#lineal2').load('dashbord/graficoconsumoDolares.php')
    })
</script>