<form method="POST" @submit.prevent="createCrud" id="createProduct">
    @csrf
    <div class="modal fade" id="create">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Producto - Agregar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre del producto</label>
                    <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="client_id">Cliente</label>
                        <select name="client_id" id="client" class="form-control">
                            <option value="0">Seleccione uno...</option>
                            @foreach ($clients as $client)
                                <option value="{{$client -> id}}">{{$client -> id}} - {{$client -> name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="costoEntrega">Costo de entrega</label>
                        <input type="text" class="form-control" name="costoEntrega" id="costoEntrega">
                    </div>
                    <div class="form-group">
                        <label for="costoDevolucion">Costo de devolucion</label>
                        <input type="text" class="form-control" name="costoDevolucion" id="costoDevolucion">
                    </div>
                    <div class="form-group">
                        <label for="Peso">Peso</label>
                        <input type="text" class="form-control" name="Peso" id="Peso">
                    </div>
                    <div class="form-group">
                        <label for="comisionEntrega">Comisión de entrega</label>
                        <input type="text" class="form-control" name="comisionEntrega" id="comisionEntrega">
                    </div>
                    <div class="form-group">
                        <label for="comisionDevolucion">Comisión de Devolución</label>
                        <input type="text" class="form-control" name="comisionDevolucion" id="comisionDevolucion">
                    </div>
                    <div class="form-group">
                        <label for="tiempoCierre">Tiempo de Cierre</label>
                        <input type="text" class="form-control" name="tiempoCierre" id="tiempoCierre">
                    </div>
                    <div class="form-group">
                        <label for="nivelServicio">Nivel de servicio</label>
                        <input type="text" class="form-control" name="nivelServicio" id="nivelServicio">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="tieneCobro">
                        <label class="form-check-label" for="tieneCobro">¿Tiene Cobro?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" value="Agregar" class="btn btn-primary mb-2">
                </div>
            </div>
        </div>
    </div>
</form>
