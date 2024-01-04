<!-- Modal -->
<div class="modal fade" id="viewsvehiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos del Vehiculo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <span id="IDV" hidden></span>
                        <tr>
                            <td rowspan='5'> <img src="" alt=""></td>
                            <td>N° Placa:<span id="PLACAV"></span></td>
                            <td>Marca Vehiculo:<span id="MARCAV"></span></td>
                            <td>Modelo Vehiculo:<span id="MODELOV"></span></td>
                        </tr>
                        <tr>
                            <td colspan='2'>Propietario:<span id="CLIENTEV"></span></td>
                            <td>Empresa:<span id="EMPRESAV"></span></td>
                            
                        </tr>
                        <tr>
                            <td>N° Serie/VIN:<span id="VINV"></span></td>
                            <td>N° Chasis:<span id="CHASISV"></span></td>
                            <td>N° Tipo Combustible:<span id="COMBUSTIBLEV"></span></td>
                        </tr>

                        <tr>
                            <td>Tipo Vehiculo:<span id="VEHICULOV"></span></td>
                            <td>Fecha Ingreso:<span id="INGRESOV"></span></td>
                            <td>A&ntilde;io Fabricaci&oacute;n:<span id="FABRICACIONV"></span></td>
                        </tr>
                        <tr>
                            <td>A&ntilde;io Modelo:<span id="ANIO_MODELOV"></span></td>
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