<?php
class MetodoVehiculo
{
    public function InsertVehiculo($datos)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();
        $consulta1 = "SELECT * FROM vehiculo WHERE NUMERO_PLACA='$datos[1]'";
        $query1 = mysqli_query($con, $consulta1);
        $numrow = mysqli_num_rows($query1);
        if ($numrow > 0) {
            return 2;
        } else {
            $query = "INSERT INTO vehiculo (ID_CLIENTE,
                                      NUMERO_PLACA,
                                      ID_MARCAR,
                                      ID_MODELO,
                                      COLOR_INGRESO,
                                      NUMERO_MOTOR,
                                      SERIE_VIN,
                                      CHASIS,
                                      TIPO_COMBUTIBLE,
                                      TIPO_VEHICULO,
                                      FECHA_INGRESO,
                                      ANIO_FABRICACION,
                                      ANIO_MODELO,
                                      ESTADO) 
                                         VALUES(
                                            '$datos[0]',
                                            '$datos[1]',
                                            '$datos[2]',
                                            '$datos[3]',
                                            '$datos[4]',
                                            '$datos[5]',
                                            '$datos[6]',
                                            '$datos[7]',
                                            '$datos[8]',
                                            '$datos[9]',
                                            '$datos[10]',
                                            '$datos[11]',
                                            '$datos[12]',
                                            '$datos[13]')";
            $consulta = mysqli_query($con, $query);
            return $consulta;
        }
    }

    public function UpdateVehiculo($datos)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $query = "UPDATE vehiculo SET
                                   ID_CLIENTE='$datos[0]',
                                   NUMERO_PLACA='$datos[1]',
                                   ID_MARCAR='$datos[2]',
                                   ID_MODELO='$datos[3]',
                                   COLOR_INGRESO='$datos[4]',
                                   NUMERO_MOTOR='$datos[5]',
                                   SERIE_VIN='$datos[6]',
                                   CHASIS='$datos[7]',
                                   TIPO_COMBUTIBLE='$datos[8]',
                                   TIPO_VEHICULO='$datos[9]',
                                   FECHA_INGRESO='$datos[10]',
                                   FECHA_SALIDA='$datos[11]',
                                   ANIO_MODELO='$datos[12]',
                                   ESTADO='$datos[13]'
                                   WHERE ID_VEHICULO='$datos[14]'";
        $consulta = mysqli_query($con, $query);
        return $consulta;
    }

    public function GetVehiculo($idVehiculo)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $query = "SELECT TVE.ID_VEHICULO,TVE.ID_CLIENTE,
        TVE.NUMERO_PLACA,
        TVE.ID_MARCAR,
        TVE.ID_MODELO,
        TVE.COLOR_INGRESO,
        TVE.NUMERO_MOTOR,
        TVE.SERIE_VIN,
        TVE.CHASIS,
        TVE.TIPO_COMBUTIBLE,
        TVE.TIPO_VEHICULO,
        TVE.FECHA_INGRESO,
        TVE.ANIO_FABRICACION,
        TVE.ANIO_MODELO,
        TVE.ESTADO,
        TMA.MARCA,
        TMO.MODELO,
        TCL.NOMBRE_PROPIETARIO,
        TCL.APELLIDO_PROPIETARIO,
        TCL.EMPRESA
        FROM vehiculo AS TVE
        INNER JOIN marcasauto TMA ON TVE.ID_MARCAR=TMA.ID_MARCA
        INNER JOIN modeloauto TMO ON TVE.ID_MODELO=TMO.ID_MODELO
        INNER JOIN cliente TCL ON TVE.ID_CLIENTE=TCL.ID_CLIENTE
        WHERE TVE.ID_VEHICULO='$idVehiculo'";
        $consulta = mysqli_query($con, $query);
        $ver = mysqli_fetch_array($consulta);
        $dato = array(
            'ID_VEHICULO' => $ver[0],
            'ID_CLIENTE' => $ver[1],
            'NUMERO_PLACA' => $ver[2],
            'ID_MARCAR' => $ver[3],
            'ID_MODELO' => $ver[4],
            'COLOR_INGRESO' => $ver[5],
            'NUMERO_MOTOR' => $ver[6],
            'SERIE_VIN' => $ver[7],
            'CHASIS' => $ver[8],
            'TIPO_COMBUTIBLE' => $ver[9],
            'TIPO_VEHICULO' => $ver[10],
            'FECHA_INGRESO' => $ver[11],
            'ANIO_FABRICACION' => $ver[12],
            'ANIO_MODELO' => $ver[13],
            'ESTADO' => $ver[14],
            'MARCA' => $ver[15],
            'MODELO' => $ver[16],
            'PROPIETARIO' => $ver[18] . ' ' . $ver[17] . '-' . $ver[19],

        );
        return $dato;

    }
    public function DeleteVehiculo($idVehiculo)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $query = "DELETE FROM vehiculo WHERE  ID_VEHICULO='$idVehiculo'";
        $consulta = mysqli_query($con, $query);
        return $consulta;
    }

    public function SeleccionarMarca($idMarca)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $query = "SELECT ID_MODELO,MODELO FROM modeloauto WHERE ID_MARCA='$idMarca'";
        $consulta = mysqli_query($con, $query);


        $cadena = "<option value='0'>SELECCIONE MODELO</option>";
        while ($ver = mysqli_fetch_row($consulta)) {
            $cadena = $cadena . "<option value=" . $ver[0] . ">" . $ver[1] . "</option>";
        }
        return $cadena;
    }

    public function BuscarConsulta($datos)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $sql = "SELECT TVH.ID_VEHICULO,
TVH.FECHA_INGRESO,
TVH.NUMERO_PLACA,
CONCAT(TMA.MARCA,' ',TMO.MODELO) AS MARCA_MODELO,
CONCAT(TCL.APELLIDO_PROPIETARIO,' ',TCL.NOMBRE_PROPIETARIO) AS PROPIETARIO,
TCL.TELEFONO_PERSONA,
TUDEPAR.departamento,
TUPROV.provincia,
TVH.ESTADO
FROM vehiculo AS TVH
LEFT JOIN cliente AS TCL ON TCL.ID_CLIENTE=TVH.ID_CLIENTE
LEFT JOIN ubdepartamento AS TUDEPAR ON TCL.ID_DEPARTAMENTO=TUDEPAR.idDepa
LEFT JOIN ubprovincia AS TUPROV ON TCL.ID_PROVINCIA=TUPROV.idProv
LEFT JOIN ubdistrito AS TUDIST ON TCL.ID_DISTRITO=TUDIST.idDist
LEFT JOIN marcasauto AS TMA ON TMA.ID_MARCA=TVH.ID_MARCAR
LEFT JOIN modeloauto AS TMO ON TMO.ID_MODELO=TVH.ID_MODELO
WHERE TVH.NUMERO_PLACA LIKE '$datos[3]%' AND TUDEPAR.departamento LIKE '$datos[2]%'  AND (TVH.FECHA_INGRESO BETWEEN '$datos[0]' AND '$datos[1]')
ORDER BY TVH.FECHA_INGRESO";
        $query = mysqli_query($con, $sql);
        $resultado='<table class="table table-sm table-bordered" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">fecha ingreso</th>
                        <th scope="col" class="text-center">placa</th>
                        <th scope="col" class="text-center">vehiculo</th>
                        <th scope="col" class="text-center">cliente</th>
                        <th scope="col" class="text-center">telefono cliente</th>
                        <th scope="col" class="text-center">departamento</th>
                        <th scope="col" class="text-center">provincia</th>
                        <th scope="col" class="text-center">proceso</th>
                        <th scope="col" class="text-center">configuracion</th>
                    </tr>
                </thead>
                <tbody>';
                    while ($ver = mysqli_fetch_array($query)) {  
                        $resultado=$resultado.'<tr>
                            <td>'
                                .$ver[1].
                            '</td>
                            <td>'
                                .$ver[2].
                            '</td>
                            <td>'
                                .$ver[3].
                            '</td>
                            <td>'
                                .$ver[4].
                            '</td>
                            <td>'
                                .$ver[5].
                            '</td>
                            <td>'
                                .$ver[6].
                            '</td>
                            <td>'
                                .$ver[7].
                            '</td>
                            <td>'
                                .$ver[8].
                            '</td>

                            <td class="config_botones">
                                <nav class="navbar navbar-expand navbar-light bg-light">
                                    <div class="collapse navbar-collapse" id="navbarScroll">
                                        <ul class="navbar-nav mr-auto my-0 my-lg-0 navbar-nav-scroll"
                                            style="max-height: 100px;">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <img src="../asset/gear-svgrepo-com.svg" alt="">
                                                    <span>configuracion</span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" class="btn btn-outline-success"
                                                                data-toggle="modal" data-target="#updatevehiculo"
                                                                onclick="ObtenerVehiculo('.$ver[0].')">
                                                                <img src="../asset/update-svgrepo-com.svg" alt="">
                                                                <span>Editar</span>
                                                            </button>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" class="btn btn-outline-danger"
                                                                onclick="DeleteVehiculo('.$ver[0].')">
                                                                <img src="../asset/delete-svgrepo-com.svg" alt="">
                                                                <span>Eliminar</span>
                                                            </button>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <button type="button" class="btn btn-outline-warning"
                                                                data-toggle="modal" data-target="#viewsvehiculo"
                                                                onclick="viewsVehiculo('.$ver[0].')">
                                                                <img src="../asset/view-svgrepo-com.svg" alt="">
                                                                <span>Vista</span>
                                                            </button>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </td>
                        </tr>';
                    }
                    
               return  $resultado.'</tbody>
            </table>';
    }
}
?>