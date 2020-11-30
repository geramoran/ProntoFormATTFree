<form method="POST" @submit.prevent="updateCrud(getCrudDetail.relplace.id, 'updatePlace')" id="updatePlace">
    @csrf
    @method('put')
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Ubicaciones - Editar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="warehouse">Bodega</label>
                        <select v-model="getCrudDetail.relplace.warehouse_id" name="warehouse_id" id="warehouse" class="form-control">
                            <option v-for="warehouse in getCrudDetail.warehouse" :value="warehouse.id">@{{warehouse.id}} - @{{warehouse.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="locate">Bodega</label>
                        <select v-model="getCrudDetail.relplace.locate_id" name="locate_id" id="locate" class="form-control">
                            <option v-for="locate in getCrudDetail.locate" :value="locate.id">@{{locate.id}} - @{{locate.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="level">Nivel</label>
                        <select v-model="getCrudDetail.relplace.level_id" name="level_id" id="level" class="form-control">
                            <option v-for="level in getCrudDetail.level" :value="level.id">@{{level.id}} - @{{level.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Guardar" class="btn btn-primary mb-2">
                </div>
            </div>
        </div>
    </div>
</form>
