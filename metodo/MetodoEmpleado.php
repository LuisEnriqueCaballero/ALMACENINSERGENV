<?php
class MetodoEmpleado
{
    public function InsertEmpleado($datos)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $query = "INSERT INTO trabajadore (TIPO_DOCUMENTO,
                                         NUMERO_DOCUMENTO,
                                         NOMBRE,
                                         APELLIDO,
                                         EDAD,
                                         SEXO,
                                         TELEFONO,
                                         CELULAR,
                                         AREA_TRABAJO,
                                         ID_DEPARTAMENTO,
                                         ID_PROVINCIA,
                                         ID_DISTRITO,
                                         DIRECCION,
                                         NUMERO_HIJO_MENOR,
                                         PLANILLA,
                                         FECHA_CUMPLEANIO,
                                         FECHA_INGRESO,
                                         BANCO,
                                         CUENTA,
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
                                            '$datos[13]',
                                            '$datos[14]',
                                            '$datos[15]',
                                            '$datos[16]',
                                            '$datos[17]',
                                            '$datos[18]',
                                            '$datos[19]')";
        $consulta = mysqli_query($con, $query);
        return $consulta;
    }

    public function UpdateEmpleado($datos)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $query = "UPDATE trabajadore SET
                                   TIPO_DOCUMENTO='$datos[0]',
                                   NUMERO_DOCUMENTO='$datos[1]',
                                   NOMBRE='$datos[2]',
                                   APELLIDO='$datos[3]',
                                   EDAD='$datos[4]',
                                   SEXO='$datos[5]',
                                   TELEFONO='$datos[6]',
                                   CELULAR='$datos[7]',
                                   AREA_TRABAJO='$datos[8]',
                                   ID_DEPARTAMENTO='$datos[9]',
                                   ID_PROVINCIA='$datos[10]',
                                   ID_DISTRITO='$datos[11]',
                                   DIRECCION='$datos[12]',
                                   NUMERO_HIJO_MENOR='$datos[13]',
                                   PLANILLA='$datos[14]',
                                   FECHA_CUMPLEANIO='$datos[15]',
                                   FECHA_INGRESO='$datos[16]',
                                   BANCO='$datos[17]',
                                   CUENTA='$datos[18]',
                                   ESTADO='$datos[19]'
                                   WHERE ID_TRABAJADOR='$datos[20]'";
        $consulta = mysqli_query($con, $query);
        return $consulta;
    }

    public function GetEmpleado($idEmpleado)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $query = "SELECT TTRAB.ID_TRABAJADOR,
        TTRAB.TIPO_DOCUMENTO,
        TTRAB.NUMERO_DOCUMENTO,
        TTRAB.NOMBRE,
        TTRAB.APELLIDO,
        TTRAB.EDAD,
        TTRAB.SEXO,
        TTRAB.TELEFONO,
        TTRAB.CELULAR,
        TTRAB.AREA_TRABAJO,
        TTRAB.ID_DEPARTAMENTO,
        TTRAB.ID_PROVINCIA,
        TTRAB.ID_DISTRITO,
        TTRAB.DIRECCION,
        TTRAB.NUMERO_HIJO_MENOR,
        TTRAB.PLANILLA,
        TTRAB.FECHA_CUMPLEANIO,
        TTRAB.FECHA_INGRESO,
        TTRAB.BANCO,
        TTRAB.CUENTA,
        TTRAB.ESTADO,
        UBTDEP.departamento,
        UBPRO.provincia,
        UBDIS.distrito,
        TBA.nombre_banco,
        TA.DESCRIPCION
        FROM trabajadore AS TTRAB
        INNER JOIN ubdepartamento AS UBTDEP ON TTRAB.ID_DEPARTAMENTO=UBTDEP.idDepa
        INNER JOIN ubprovincia AS UBPRO ON TTRAB.ID_PROVINCIA=UBPRO.idProv
        INNER JOIN ubdistrito AS UBDIS ON TTRAB.ID_DISTRITO=UBDIS.idDist
        INNER JOIN banco AS TBA ON TTRAB.BANCO=TBA.id_banco
        INNER JOIN area AS TA ON TTRAB.AREA_TRABAJO=TA.ID_AREA
        WHERE TTRAB.ID_TRABAJADOR=$idEmpleado";
        $consulta = mysqli_query($con, $query);
        $ver = mysqli_fetch_array($consulta);
        $dato = array(
            'ID_TRABAJADOR' => $ver[0],
            'TIPO_DOCUMENTO' => $ver[1],
            'NUMERO_DOCUMENTO' => $ver[2],
            'NOMBRE' => $ver[3],
            'APELLIDO' => $ver[4],
            'EDAD' => $ver[5],
            'SEXO' => $ver[6],
            'TELEFONO' => $ver[7],
            'CELULAR' => $ver[8],
            'AREA_TRABAJO' => $ver[9],
            'ID_DEPARTAMENTO' => $ver[10],
            'ID_PROVINCIA' => $ver[11],
            'ID_DISTRITO' => $ver[12],
            'DIRECCION' => $ver[13],
            'NUMERO_HIJO_MENOR' => $ver[14],
            'PLANILLA' => $ver[15],
            'FECHA_CUMPLEANIO' => $ver[16],
            'FECHA_INGRESO' => $ver[17],
            'BANCO' => $ver[18],
            'CUENTA' => $ver[19],
            'ESTADO' => $ver[20],
            'DEPARTAMENTO' => $ver[21],
            'PROVINCIA' => $ver[22],
            'DISTRITO' => $ver[23],
            'IDENTIDADBANCARIA' => $ver[24],
            'AREATRABAJO' => $ver[25]
        );
        return $dato;

    }
    public function DeleteEmpleado($idEmpleado)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $query = "DELETE FROM trabajadore WHERE ID_TRABAJADOR='$idEmpleado'";
        $consulta = mysqli_query($con, $query);
        return $consulta;
    }
    public function SeleccioneDepartamento($iddepartamento)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $query = "SELECT idProv,provincia FROM ubprovincia WHERE idDepa='$iddepartamento'";
        $consulta = mysqli_query($con, $query);

        $cadena = "<option value='0'>SELECCIONE PROVINCIA</option>";

        while ($ver = mysqli_fetch_array($consulta)) {
            $cadena = $cadena . '<option value=' . $ver[0] . '>' . $ver[1] . '</option>';
        }
        return $cadena;
    }
    public function SeleccioneProvincia($idprovincia)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $query = "SELECT idDist,distrito FROM ubdistrito WHERE idProv='$idprovincia'";
        $consulta = mysqli_query($con, $query);

        $cadena = "<option value='0'>SELECCIONE DISTRITO</option>";

        while ($ver = mysqli_fetch_array($consulta)) {
            $cadena = $cadena . '<option value=' . $ver[0] . '>' . $ver[1] . '</option>';
        }
        return $cadena;
    }

    public function BuscarDocumento($datos)
    {
        $conexion = new Conexion();
        $con = $conexion->Conectar();

        $query ="SELECT TE.ID_TRABAJADOR, 
        TE.FECHA_INGRESO, 
        CONCAT(TE.APELLIDO, ' ',TE.NOMBRE), 
        TE.NUMERO_DOCUMENTO, 
        TE.EDAD, CONCAT(DAY(TE.FECHA_CUMPLEANIO),'/',MONTHNAME(TE.FECHA_CUMPLEANIO)) AS CUMPLE, 
        TA.DESCRIPCION, 
        TE.CELULAR, 
        CONCAT(TB.nombre_banco,':',TE.CUENTA), 
        TE.Estado FROM trabajadore AS TE 
        INNER JOIN banco AS TB ON TE.BANCO=TB.id_banco 
        LEFT JOIN area AS TA ON TE.AREA_TRABAJO=TA.ID_AREA
        WHERE TE.NUMERO_DOCUMENTO LIKE '%$datos%'";
        $consulta = mysqli_query($con, $query);
        $datos = '<table class="table table-sm table-bordered">
   <thead>
       <tr>
       <th scope="col" class="text-center">FECHA INGRESO</th>
       <th scope="col" class="text-center">empleado</th>
       <th scope="col" class="text-center">n° documento</th>
       <th scope="col" class="text-center">edad</th>
       <th scope="col" class="text-center">fecha naciemiento</th>
       <th scope="col" class="text-center">area</th>
       <th scope="col" class="text-center">n°celular</th>
       <th scope="col" class="text-center">n°cuenta</th>
       <th scope="col" class="text-center">estado</th>
       <th scope="col" class="text-center">configuracion</th>
       </tr>
</thead>
<tbody>';
        while ($ver = mysqli_fetch_row($consulta)){
            $datos = $datos .'<tr>
                 <td>'
                . $ver[1] .
                '</td>
                 <td>'
                . $ver[2] .
                '</td>
                 <td>'
                . $ver[3] .
                '</td>
                 <td>'
                . $ver[4] .
                '</td>
                <td>'
                . $ver[5] .
                '</td>
                 <td>'
                . $ver[6] .
                '</td>
                 <td>'
                . $ver[7] .
                '</td>
                 <td>'
                . $ver[8] .
                '</td>
                 <td>'
                . $ver[9] .
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
                                                           data-toggle="modal" data-target="#updateempleado"
                                                           onclick="ObtenerEmpleado(' . $ver[0] . ')">
                                                           <img src="../asset/update-svgrepo-com.svg" alt="">
                                                           <span>Editar</span>
                                                       </button>
                                                   </a>
                                               </li>
                                               <li>
                                                   <a class="dropdown-item" href="#">
                                                       <button type="button" class="btn btn-outline-danger"
                                                           onclick="DeleteEmpleado(' . $ver[0] . ')">
                                                           <img src="../asset/delete-svgrepo-com.svg" alt="">
                                                           <span>Eliminar</span>
                                                       </button>
                                                   </a>
                                               </li>
                                               <li>
                                                   <a class="dropdown-item" href="#">
                                                       <button type="button" class="btn btn-outline-warning"
                                                           data-toggle="modal" data-target="#viewsempleado"
                                                           onclick="ViewsEmpleado(' . $ver[0] . ')">
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
                       </tr>'
            ;
        }
        return $datos . '</tbody></table>';
    }
}

?>