<div class="modal fade" id="unidadDetalleEntregado">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detalle 0</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">¿Se entrego?</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="pdetail.SEENTREGO">
                </div>
                <div class="form-group">
                    <label for="name">Nombre de quien lo recibio</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="pdetail.NOMBREDEQUIENRECIBE">
                </div>
                <div class="form-group">
                    <label for="name">fecha y hora de llegada</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="pdetail.FECHAYHORA">
                </div>
            </div>
            <div class="modal-footer">
                <a :href="'pdf/' + pdetail.REFERENCENUMBER" class="btn btn-primary mb-2">Descargar PDF de entrega</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unidadDetalleNoEntregado">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detalle 0</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">¿Se entrego?</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="pdetail.SEENTREGO">
                </div>
                <div class="form-group">
                    <label for="name">fecha y hora de llegada</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="pdetail.FECHAYHORA">
                </div>
                <div class="form-group">
                    <label for="name">Fecha y hora de Reagenda</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="pdetail.HORAYFECHADEREAGENDA">
                </div>
                <div class="form-group">
                    <label for="name">Motivo</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="pdetail.MOTIVODENORECIBIR">
                </div>
                <div class="form-group">
                    <label for="name">Comentarios</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="pdetail.COMENTARIOS">
                </div>
            </div>
            <div class="modal-footer">
                <a :href="'pdf/' + pdetail.REFERENCENUMBER" class="btn btn-primary mb-2">Descargar PDF de entrega</a>
            </div>
        </div>
    </div>
</div>

