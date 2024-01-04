<?php 
$conexion=new Conexion();
$cnx=$conexion->Conectar();
$sql="SELECT * FROM proceso_auto";
$query=mysqli_query($cnx,$sql);
?>
<div class="modal fade" id="updateprocedimiento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">actualizar procedimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="formularioU">
                    <div class="form-row">
                        <input type="text" hidden name="id" id="id">
                        <div class="form-group col-md-12">
                            <label>Proceso</label>
                            <select id="procesoU" class="form-control" name="procesoU">
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
                            <label >Procedimiento</label>
                            <input type="text" class="form-control" id="subprocesoU" name="subprocesoU">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="update">Update</button>
            </div>
        </div>
    </div>
</div>