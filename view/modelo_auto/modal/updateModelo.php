<?php 
$conexion=new Conexion();
$cnx=$conexion->Conectar();
$sql="SELECT * FROM marcasauto";
$query=mysqli_query($cnx,$sql);
?>
<div class="modal fade" id="updatemodelo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">actualizar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_update">
                    <div class="form-row">
                        <input type="text" hidden name="id" id="id">
                        <div class="form-group col-md-12">
                            <label>marca</label>
                            <select id="marcaU" class="form-control" name="marcaU">
                                <option value="0">SELECCIONE EL PROCESO</option>
                                <?php
                                 while($ver=mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $ver[0]?>"><?php echo $ver[1]?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>modelo</label>
                            <input type="text" class="form-control" id="modeloU" name="modeloU">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerra</button>
                <button type="button" class="btn btn-primary" id="update">Actualizar</button>
            </div>
        </div>
    </div>
</div>