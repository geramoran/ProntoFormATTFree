<form method="POST" @submit.prevent="createCrud" id="createClient">
    @csrf
    <div class="modal fade" id="create">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Cliente - Agregar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre de la compania</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="rfc">RFC</label>
                        <input type="text" class="form-control" name="rfc" id="rfc">
                    </div>
                    <div class="form-group">
                        <label for="agent">Nombre del representante</label>
                        <input type="text" class="form-control" name="agent" id="agent">
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
                        <label for="name">Teléfono</label>
                        <input type="text" class="form-control" name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Agregar" class="btn btn-primary mb-2">
                </div>
            </div>
        </div>
    </div>
</form>
