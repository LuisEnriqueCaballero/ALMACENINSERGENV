<!-- Modal -->
<div class="modal fade" id="viewscliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">perfil del cliente</h5>
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
                            <td>Apellido Cliente:<span id="apellidoV"></span></td>
                            <td>Nombre Cliente:<span id="nombresV"></span></td>
                            <td>N°Documento:<span id="dniV"></span></td>
                        </tr>
                        <tr>
                            <td>N°Telefonico Personal:<span id="telefonoV"></span></td>
                            <td colspan='2'>Correo Electronico:<span id="emailV"></span></td>
                            
                        </tr>
                        <tr>
                            <td>Empresa:<span id="empresaV"></span></td>
                            <td>R.U.C:<span id="rucV"></span></td>
                            <td>N°Telefonico Empresa:<span id="telefono_empresaV"></span></td>
                        </tr>
                        <tr>
                            <td>Departamento:<span id="departamentoV"></span></td>
                            <td>Provincia:<span id="provinciaV"></span></td>
                            <td>Distrito:<span id="distritoV"></span></td>
                        </tr>
                        <tr>
                            <td colspan='3'>Direccion:<span id="direccionV"></span></td>
                            
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