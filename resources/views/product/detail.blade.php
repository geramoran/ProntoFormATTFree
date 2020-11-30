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
                    <label for="name">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="getCrudDetail.product.name" readonly>
                </div>
                <div class="form-group">
                    <label for="client_id">Cliente</label>
                    <input type="text" class="form-control" name="client_id" id="client_id" v-model="getCrudDetail.product.client.name" readonly>
                </div>
                <div class="form-group">
                    <label for="costoEntrega">Costo de entrega</label>
                    <input type="text" class="form-control" name="costoEntrega" id="costoEntrega" v-model="getCrudDetail.product.costoEntrega" readonly>
                </div>
                <div class="form-group">
                    <label for="costoDevolucion">Costo de devolucion</label>
                    <input type="text" class="form-control" name="costoDevolucion" id="costoDevolucion" v-model="getCrudDetail.product.costoDevolucion" readonly>
                </div>
                <div class="form-group">
                    <label for="Peso">Peso</label>
                    <input type="text" class="form-control" name="Peso" id="Peso" v-model="getCrudDetail.product.Peso" readonly>
                </div>
                <div class="form-group">
                    <label for="comisionEntrega">Comisión de entrega</label>
                    <input type="text" class="form-control" name="comisionEntrega" id="comisionEntrega" v-model="getCrudDetail.product.comisionEntrega" readonly>
                </div>
                <div class="form-group">
                    <label for="comisionDevolucion">Comisión de Devolución</label>
                    <input type="text" class="form-control" name="comisionDevolucion" id="comisionDevolucion" v-model="getCrudDetail.product.comisionDevolucion" readonly>
                </div>
                <div class="form-group">
                    <label for="tiempoCierre">Tiempo de Cierre</label>
                    <input type="text" class="form-control" name="tiempoCierre" id="tiempoCierre" v-model="getCrudDetail.product.tiempoCierre" readonly>
                </div>
                <div class="form-group">
                    <label for="nivelServicio">Nivel de servicio</label>
                    <input type="text" class="form-control" name="nivelServicio" id="nivelServicio" v-model="getCrudDetail.product.nivelServicio" readonly>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="tieneCobro" name="tieneCobro" v-model="getCrudDetail.product.tieneCobro" disabled>
                    <label for="tieneCobro">¿Tiene Cobro?</label>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-warning" v-on:click.prevent="editCrud(getCrudDetail.product.id)">Editar</a>
                <a href="#" class="btn btn-danger" v-on:click.prevent="deleteCrud(getCrudDetail.product.id)">Eliminar</a>
            </div>
        </div>
    </div>
</div>
