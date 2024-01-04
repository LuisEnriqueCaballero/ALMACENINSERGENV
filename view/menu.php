<?php
require_once "../config/config.php";

$conexion = new Conexion();
$cnx = $conexion->Conectar();
$consulta = "SELECT IF(ESTADO='AGOTADO',1,0) FROM producto WHERE ESTADO='AGOTADO'
                    GROUP BY ESTADO";
$query = mysqli_query($cnx, $consulta);
$cantidad = mysqli_num_rows($query);

$consulta1 = "SELECT IF(TP.DESCRIPCION_PROCESO='ACABADO',1,0) FROM detalle_proceso DTP
                    INNER JOIN proceso_auto as TP ON DTP.ID_PROCESO=TP.ID_PROCESO
                    WHERE TP.DESCRIPCION_PROCESO='ACABADO' 
                    GROUP BY TP.DESCRIPCION_PROCESO";
$query1 = mysqli_query($cnx, $consulta1);
$cantidad1 = mysqli_num_rows($query1);

$consulta2 = "SELECT * FROM trabajadore 
                    WHERE FECHA_CUMPLEANIO=(SELECT date(now()))";
$query2 = mysqli_query($cnx, $consulta2);
$cantidad2 = mysqli_num_rows($query2);


$consulta3 = "SELECT ESTADO FROM producto WHERE ESTADO='AGOTADO'";
$query3 = mysqli_query($cnx, $consulta3);
$cantidad3 = mysqli_num_rows($query3);

$consulta4 = "SELECT FECHA_CUMPLEANIO FROM trabajadore 
WHERE FECHA_CUMPLEANIO=(SELECT date(now()))";
$query4 = mysqli_query($cnx, $consulta4);
$cantidad4 = mysqli_num_rows($query4);

$consulta5 = "SELECT TP.DESCRIPCION_PROCESO FROM detalle_proceso DTP
INNER JOIN proceso_auto as TP ON DTP.ID_PROCESO=TP.ID_PROCESO
WHERE TP.DESCRIPCION_PROCESO='ACABADO' ";
$query5= mysqli_query($cnx, $consulta5);
$cantidad5 = mysqli_num_rows($query5);


?>
<div class="menu">
    <div class="logo ">
        <a href="">
            <img src="../img/logo paul 60px x 60px.png" alt="" class="logo">
        </a>
        <img src="../asset/bars-s-svgrepo-com.svg" alt="" class="bars" id="bars">
    </div>
    <div class="perfil">
        <img src="../asset/bell-svgrepo-com.svg" alt="" class="kebab">
        <div class="perfil_usuario">
            <div class="notificacion" id="notificacion">
                <img src="../asset/bell-svgrepo-com.svg" alt="">
                <div class="alertanotificaciones" id="alertanotificaciones">
                    <a href=""> <?php echo $cantidad3?> <span>producto agotado</span></a>
                    <a href=""><?php echo $cantidad4?> <span>trabajadores cumpleaño hoy</span></a>
                    <a href=""><?php echo $cantidad5?> <span>proceso de culminacion</span></a>
                </div>
                <span class="notificacione_numero">
                    <?php
                    $resultado=$cantidad+$cantidad1+$cantidad2;
                    echo $resultado;
                    ?>
                </span>
            </div>
            <div class="imagen_usuario" id="imagen_usuario">
                <img src="../img/admin.jpg" alt="">
                <div class="link_usuario" id="link_usuario">
                    <div style="">
                    <a href="" style="display: flex;"><img src="../asset/person-svgrepo-com.svg" alt="" ><span>perfil</span></a>
                    </div>
                    <div>
                    <a href="sesion_cerra.php" style="display: flex;"><img src="../asset/off-svgrepo-com.svg" alt="" ><span>cerrar sesion</span></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>