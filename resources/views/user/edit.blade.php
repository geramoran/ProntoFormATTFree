<form method="POST" @submit.prevent="updateCrud(getCrudDetail.id)" id="updateUser">
    @csrf
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Usuarios - Editar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre completo</label>
                        <input type="text" class="form-control" name="name" id="name" v-model="getCrudDetail.name">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" name="address" id="address" v-model="getCrudDetail.address">
                    </div>
                    <div class="form-group">
                        <label for="zipcode">Código Postal</label>
                        <input type="text" class="form-control" name="zipcode" id="zipcode" v-model="getCrudDetail.zipcode">
                    </div>
                    <div class="form-group">
                        <label for="city">Ciudad</label>
                        <input type="text" class="form-control" name="city" id="city" v-model="getCrudDetail.city">
                    </div>
                    <div class="form-group">
                        <label for="state">Estado</label>
                        <input type="text" class="form-control" name="state" id="state" v-model="getCrudDetail.state">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" class="form-control" name="phone" id="phone" v-model="getCrudDetail.phone">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico</label>
                        <input type="text" class="form-control" name="email" id="email" v-model="getCrudDetail.phone">
                    </div>
                    <div class="form-group">
                        <label for="phone">Usuario ProntoForm</label>
                        <input type="text" class="form-control" name="idprontoformAtt" id="idprontoformAtt" v-model="getCrudDetail.phone">
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre de usuario</label>
                        <input type="text" class="form-control" name="username" id="username" v-model="getCrudDetail.username">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="text" class="form-control" name="password" id="password" v-model="getCrudDetail.password">
                    </div>
                    <div class="form-group">
                        <label for="passwordRepeat">Repite Contraseña</label>
                        <input type="text" class="form-control" name="passwordRepeat" id="passwordRepeat" v-model="getCrudDetail.passwordRepeat">
                    </div>
                    <input type="submit" value="Actualizar" class="btn btn-primary mb-2">
                </div>
            </div>
        </div>
    </div>
</form>
