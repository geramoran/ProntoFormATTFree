<div class="modal fade" id="warehouse">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Ubicaciones - Bodega</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="switchCrudCreate('createWarehouse', 'warehouseCreate')" method="POST" id="createWarehouse" class="input-group mb-3">
                    @csrf
                    <input type="text" class="form-control" placeholder="Inserte nueva bodega a agregar" name="name">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit" id="button-addon2">Agregar</button>
                    </div>
                </form>
                <table id="Locate_Table" class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="warehouse in getCrudList.warehouse">
                            <td>@{{warehouse.name}}</td>
                            <td>
                                <a href="#" v-on:click.prevent="switchCrudDelete(warehouse.id, 'warehouseDelete')" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
