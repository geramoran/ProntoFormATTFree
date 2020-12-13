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
                        <label for="roles_id">Tipo de usuario</label>
                        <select name="roles_id" id="client" class="form-control" v-model="user.roles_id">
                            <option v-for="ut in roles" :value="ut.id">@{{ut.id}} - @{{ut.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre completo</label>
                        <input type="text" class="form-control" name="name" id="name" v-model="user.name">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" name="address" id="address" v-model="user.address">
                    </div>
                    <div class="form-group">
                        <label for="zipcode">Código Postal</label>
                        <input type="text" class="form-control" name="zipcode" id="zipcode" v-model="user.zipcode">
                    </div>
                    <div class="form-group">
                        <label for="city">Ciudad</label>
                        <input type="text" class="form-control" name="city" id="city" v-model="user.city">
                    </div>
                    <div class="form-group">
                        <label for="state">Estado</label>
                        <input type="text" class="form-control" name="state" id="state" v-model="user.state">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" class="form-control" name="phone" id="phone" v-model="user.phone">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico</label>
                        <input type="text" class="form-control" name="email" id="email" v-model="user.email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Usuario ProntoForm</label>
                        <input type="text" class="form-control" name="idprontoformAtt" id="idprontoformAtt" v-model="user.prontoform_user">
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre de usuario</label>
                        <input type="text" class="form-control" name="username" id="username" v-model="user.username">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" v-model="user.password">
                    </div>
                    <div class="form-group">
                        <label for="passwordRepeat">Repite Contraseña</label>
                        <input type="password" class="form-control" name="passwordRepeat" id="passwordRepeat" v-model="passwordRep">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
