<form method="POST" @submit.prevent="updateCrud(getCrudDetail.id)" id="updateArea">
    @csrf
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Zonas de entrega - Editar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" v-model="getCrudDetail.name">
                    </div>
                    <div class="form-group">
                        <label for="city">Ciudad</label>
                        <input type="text" class="form-control" name="city" id="city" v-model="getCrudDetail.city">
                    </div>
                    <div class="form-group">
                        <label for="state">Estado</label>
                        <input type="text" class="form-control" name="state" id="state" v-model="getCrudDetail.state">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Actualizar" class="btn btn-primary mb-2">
                </div>
            </div>
        </div>
    </div>
</form>
