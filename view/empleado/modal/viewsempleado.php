<!-- Modal -->
<div class="modal fade" id="viewsempleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">perfil del empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <span id="idV" hidden></span>
                    <tbody>
                        <tr>
                            <td rowspan='6'> <img src="" alt=""></td>
                            <td>Apellido Empleado:<span id="NOMBREV"></span></td>
                            <td>Nombre Empleado:<span id="APELLIDOV"></span></td>
                            <td>N°Documento:<span id="NUMEROV"></span></td>
                        </tr>
                        <tr>
                            <td>N°Telefonico Personal:<span id="CELULARV"></span></td>
                            <td>N°Telefonico Familiar:<span id="TELEFONOV"></span></td>
                            <td>Fecha Cumplea&ntilde;io:<span id="FECHA_CUMPLEV"></span></td>
                        </tr>
                        <tr>
                            <td>Departamento:<span id="DEPARTAMENTOV"></span></td>
                            <td>Provincia:<span id="PROVINCIAV"></span></td>
                            <td>Distrito:<span id="DISTRITOV"></span></td>
                            
                        </tr>
                        <tr>
                            <td colspan='3'>Direccion:<span id="DIRECCIONV"></span></td>
                        </tr>
                        <tr>
                            <td>Banco:<span id="BANCOV"></span></td>
                            <td>Cuenta Bancaria:<span id="CUENTAV"></span></td>
                            <td>Fecha Ingreso:<span id="FECHA_INGRESOV"></span></td>
                        </tr>
                        <tr>
                            <td>Edad:<span id="EDADV"></span>a&ntilde;io</td>
                            <td>Genero:<span id="SEXOV"></span></td>
                            <td>Area Trabajo:<span id="AREAV"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
            </div>
        </div>
    </div>
</div>