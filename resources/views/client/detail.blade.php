<div class="modal fade" id="detail">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detalle @{{getCrudDetail.name}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nombre de la compania</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="getCrudDetail.name" readonly>
                </div>
                <div class="form-group">
                    <label for="rfc">RFC</label>
                    <input type="text" class="form-control" name="rfc" id="rfc" v-model="getCrudDetail.rfc" readonly>
                </div>
                <div class="form-group">
                    <label for="agent">Nombre del representante</label>
                    <input type="text" class="form-control" name="agent" id="agent" v-model="getCrudDetail.agent" readonly>
                </div>
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" name="address" id="address" v-model="getCrudDetail.address" readonly>
                </div>
                <div class="form-group">
                    <label for="zipcode">Código Postal</label>
                    <input type="text" class="form-control" name="zipcode" id="zipcode" v-model="getCrudDetail.zipcode" readonly>
                </div>
                <div class="form-group">
                    <label for="city">Ciudad</label>
                    <input type="text" class="form-control" name="city" id="city" v-model="getCrudDetail.city" readonly>
                </div>
                <div class="form-group">
                    <label for="state">Estado</label>
                    <input type="text" class="form-control" name="state" id="state" v-model="getCrudDetail.state" readonly>
                </div>
                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" class="form-control" name="phone" id="phone" v-model="getCrudDetail.phone" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="text" class="form-control" name="email" id="email" v-model="getCrudDetail.email" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-warning" v-on:click.prevent="editCrud(getCrudDetail.id)">Editar</a>
                <a href="#" class="btn btn-danger" v-on:click.prevent="deleteCrud(getCrudDetail.id)">Eliminar</a>
            </div>
        </div>
    </div>
</div>
