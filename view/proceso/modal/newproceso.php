<!-- Modal -->
<div class="modal fade" id="nuevoproceso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">proceso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_nuevo">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="label">descripcion proceso<span>*</span></label>
                            <input type="text" class="form-control campo_danger" name="descripcion" id="descripcion">
                        </div>
                    </div>
                    <span class="btn btn-primary" id="agregar">Agregar Sub Proceso</span>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="nuevo">Nuevo</button>
            </div>
        </div>
    </div>
</div>

<script>
    const form_nuevo=document.querySelector('#form_nuevo');
    const agregar=document.querySelector('#agregar');

    listerevent()
    function listerevent(){
        agregar.addEventListener('click',agregarSubproceso);
    }

    function agregarSubproceso(e){
        e.preventDefault();
        console.log('hola amigo')
        div=document.createElement('div');
        div.classList.add('form-row');
        
        
        div.innerHTML=`<div class="form-group col-md-12">
                            <label class="label">Sub proceso <span>*</span></label>
                            <div class="d-flex justify-content-around">
                            <input type="text" class="form-control col-md-9" name="subproceso[]" id="descripcion">
                            <span class="form-group btn btn-danger col-md-2" onclick="Eliminar(this)">x</span>
                            </div>
                        </div>` 
         form_nuevo.appendChild(div);           

         
    }
    // @param {this} e

    const Eliminar = (e)=>{
        e.preventDefault();
        const divspadre=e.parentNode;
        form_nuevo.removeChild(divspadre);
    }

</script>