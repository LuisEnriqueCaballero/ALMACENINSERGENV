<?php
include_once "../../config/config.php";
$conexion = new Conexion();
$cnx = $conexion->Conectar();

$sql8 = "SELECT TSAL.FECHA_SALIDA, if(SUM(TSAL.CANTIDAD*TSAL.PRECIO_UNITARIO) IS NULL,0.00,SUM(TSAL.CANTIDAD*TSAL.PRECIO_UNITARIO)) FROM salida_material AS TSAL
LEFT JOIN producto AS TPRO ON TSAL.ID_PRODUCTO=TPRO.ID_MONEDA
WHERE TPRO.ID_MONEDA=1
GROUP BY TSAL.FECHA_SALIDA
ORDER BY TSAL.FECHA_SALIDA";

$query = mysqli_query($cnx, $sql8);
$cantidad=mysqli_num_rows($query);
 
$valorx = array(); //fecha
$valory = array(); //monto

if($cantidad<1){
    $valorx = array('01/01/1999'); //fecha
    $valory = array('0.00'); //monto
    
        $valorX[] = $valorx;
        $valorY[] = $valory;
    
}else{
    $valorx = array(); //fecha
    $valory = array(); //monto
    while ($ver = mysqli_fetch_row($query)) {
        $valorX[] = $ver[0];
        $valorY[] = $ver[1];
    }
}
// while ($ver = mysqli_fetch_row($query)) {
    
//         $valorX[] = $ver[0];
//         $valorY[] = $ver[1];
    
// }
$datoX = json_encode($valorX);
$datoY = json_encode($valorY);

?>

    
    <div class="col-sm-12" id="graficalineal1">

    </div>


<script type="text/javascript">
    function crearCadenaLineal(json) {
        var parsed = JSON.parse(json);
        var arr = [];

        for (var x in parsed) {
            arr.push(parsed[x]);
        }
        return arr;
    }

    datosX = crearCadenaLineal('<?php echo $datoX ?>');
    datosY = crearCadenaLineal('<?php echo $datoY ?>');

    var trace1 = {
        x: datosX,
        y: datosY,
        type: 'scatter'
    };


    var data = [trace1];
    var layout = {
  title: 'Grafico de consumo en Soles ',
  xaxis: {
    title: 'Fecha de dia',
    showgrid: false,
    zeroline: false
  },
  yaxis: {
    title: 'Montos S/.',
    showline: false
  }
};
    Plotly.newPlot('graficalineal1', data,layout);
</script>