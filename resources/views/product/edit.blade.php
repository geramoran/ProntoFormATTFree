<form method="POST" @submit.prevent="updateCrud(getCrudDetail.product.id)" id="updateProduct">
    @csrf
    <div class="modal fade" id="edit">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Producto - Editar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre del producto</label>
                        <input type="text" class="form-control" name="name" id="name" v-model="getCrudDetail.product.name">
                    </div>
                    <div class="form-group">
                        <label for="client_id">Cliente</label>
                        <select name="client_id" id="client" class="form-control" v-model="getCrudDetail.product.client_id">
                            <option v-for="client in getCrudDetail.client" :value="client.id">@{{client.id}} - @{{client.name}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="costoEntrega">Costo de entrega</label>
                        <input type="text" class="form-control" name="costoEntrega" id="costoEntrega" v-model="getCrudDetail.product.costoEntrega">
                    </div>
                    <div class="form-group">
                        <label for="costoDevolucion">Costo de devolucion</label>
                        <input type="text" class="form-control" name="costoDevolucion" id="costoDevolucion" v-model="getCrudDetail.product.costoDevolucion">
                    </div>
                    <div class="form-group">
                        <label for="Peso">Peso</label>
                        <input type="text" class="form-control" name="Peso" id="Peso" v-model="getCrudDetail.product.Peso">
                    </div>
                    <div class="form-group">
                        <label for="comisionEntrega">Comisión de entrega</label>
                        <input type="text" class="form-control" name="comisionEntrega" id="comisionEntrega" v-model="getCrudDetail.product.comisionEntrega">
                    </div>
                    <div class="form-group">
                        <label for="comisionDevolucion">Comisión de Devolución</label>
                        <input type="text" class="form-control" name="comisionDevolucion" id="comisionDevolucion" v-model="getCrudDetail.product.comisionDevolucion">
                    </div>
                    <div class="form-group">
                        <label for="tiempoCierre">Tiempo de Cierre</label>
                        <input type="text" class="form-control" name="tiempoCierre" id="tiempoCierre" v-model="getCrudDetail.product.tiempoCierre">
                    </div>
                    <div class="form-group">
                        <label for="nivelServicio">Nivel de servicio</label>
                        <input type="text" class="form-control" name="nivelServicio" id="nivelServicio" v-model="getCrudDetail.product.nivelServicio">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="tieneCobro" name="tieneCobro" v-model="getCrudDetail.product.tieneCobro">
                        <label for="tieneCobro">¿Tiene Cobro?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Guardar" class="btn btn-primary mb-2">
                </div>
            </div>
        </div>
    </div>
</form>
