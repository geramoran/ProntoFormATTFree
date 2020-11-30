<div class="modal fade" id="level">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Ubicaciones - Niveles de bodega</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="switchCrudCreate('createLevel', 'levelCreate')" method="POST" id="createLevel" class="input-group mb-3">
                    @csrf
                    <input type="text" class="form-control" placeholder="Inserte nueva ubicacion a agregar" name="name">
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
                        <tr v-for="level in getCrudList.level">
                            <td>@{{level.name}}</td>
                            <td>
                                <a href="#" v-on:click.prevent="switchCrudDelete(level.id, 'levelDelete')" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
