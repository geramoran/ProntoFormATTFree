<form method="POST" @submit.prevent="createCrud" id="createPlace">
    @csrf
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Ubicaciones - Agregar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="warehouse">Bodega</label>
                        <select name="warehouse_id" id="warehouse" class="form-control">
                            <option value="0">Seleccione uno...</option>
                            <option v-for="warehouse in getCrudList.warehouse" :value="warehouse.id">@{{warehouse.id}} - @{{warehouse.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="locate">Ubicacion</label>
                        <select name="locate_id" id="locate" class="form-control">
                            <option value="0">Seleccione uno...</option>
                            <option v-for="locate in getCrudList.locate" :value="locate.id">@{{locate.id}} - @{{locate.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="level">Nivel</label>
                        <select name="level_id" id="level" class="form-control">
                            <option value="0">Seleccione uno...</option>
                            <option v-for="level in getCrudList.level" :value="level.id">@{{level.id}} - @{{level.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Agregar" class="btn btn-primary mb-2">
                </div>
            </div>
        </div>
    </div>
</form>
