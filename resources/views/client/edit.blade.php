<form method="POST" @submit.prevent="updateCrud(getCrudDetail.id)" id="updateClient">
    @csrf
    <div class="modal fade" id="edit">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Cliente - Editar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre de la compania</label>
                        <input type="text" class="form-control" name="name" id="name" v-model="getCrudDetail.name">
                    </div>
                    <div class="form-group">
                        <label for="name">RFC</label>
                        <input type="text" class="form-control" name="rfc" id="rfc" v-model="getCrudDetail.rfc">
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre del representante</label>
                        <input type="text" class="form-control" name="agent" id="agent" v-model="getCrudDetail.agent">
                    </div>
                    <div class="form-group">
                        <label for="name">Dirección</label>
                        <input type="text" class="form-control" name="address" id="address" v-model="getCrudDetail.address">
                    </div>
                    <div class="form-group">
                        <label for="name">Código Postal</label>
                        <input type="text" class="form-control" name="zipcode" id="zipcode" v-model="getCrudDetail.zipcode">
                    </div>
                    <div class="form-group">
                        <label for="name">Ciudad</label>
                        <input type="text" class="form-control" name="city" id="city" v-model="getCrudDetail.city">
                    </div>
                    <div class="form-group">
                        <label for="name">Estado</label>
                        <input type="text" class="form-control" name="state" id="state" v-model="getCrudDetail.state">
                    </div>
                    <div class="form-group">
                        <label for="name">Teléfono</label>
                        <input type="text" class="form-control" name="phone" id="phone" v-model="getCrudDetail.phone">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="text" class="form-control" name="email" id="email" v-model="getCrudDetail.email">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Actualizar" class="btn btn-primary mb-2">
                </div>
            </div>
        </div>
    </div>
</form>
