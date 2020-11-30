<form method="POST" @submit.prevent="createCrud" id="createUser">
    @csrf
    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Usuario - Agregar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="usertype_id">Tipo de usuario</label>
                        <select name="usertype_id" id="client" class="form-control">
                            <option value="0">Seleccione uno...</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre completo</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" name="address" id="address">
                    </div>
                    <div class="form-group">
                        <label for="zipcode">Código Postal</label>
                        <input type="text" class="form-control" name="zipcode" id="zipcode">
                    </div>
                    <div class="form-group">
                        <label for="city">Ciudad</label>
                        <input type="text" class="form-control" name="city" id="city">
                    </div>
                    <div class="form-group">
                        <label for="state">Estado</label>
                        <input type="text" class="form-control" name="state" id="state">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electronico</label>
                        <input type="text" class="form-control" name="email" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="phone">Usuario ProntoForm</label>
                        <input type="text" class="form-control" name="idprontoformAtt" id="idprontoformAtt">
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre de usuario</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="passwordRepeat">Repite Contraseña</label>
                        <input type="password" class="form-control" name="passwordRepeat" id="passwordRepeat">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Agregar" class="btn btn-primary mb-2">
                </div>
            </div>
        </div>
    </div>
</form>
