
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Roles - Permisos</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container">
                <div class="row form-row justify-content-center">
                    <p class="bd-content-title">Seleccione en las casillas a cuales pantallas puede acceder dicho usuario</p>
                </div>
                <div class="form-row custom-row row justify-content-around">
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="recoleccion" v-model="permissions.recoleccion">
                        <label class="form-check-label" for="recoleccion">Recoleccion</label>
                    </div>
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="recibo" v-model="permissions.recibo">
                        <label class="form-check-label" for="recibo">Recibo</label>
                    </div>
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inventario" v-model="permissions.inventario">
                        <label class="form-check-label" for="defaultCheck1">Inventario</label>
                    </div>
                </div>
                <div class="form-row custom-row row justify-content-around">
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="despacho" v-model="permissions.despacho">
                        <label class="form-check-label" for="defaultCheck1">Despacho</label>
                    </div>
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="catalogos" v-model="permissions.catalogos">
                        <label class="form-check-label" for="defaultCheck1">Catalogos</label>
                    </div>
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="usuarios" v-model="permissions.usuarios">
                        <label class="form-check-label" for="defaultCheck1">Usuarios</label>
                    </div>
                </div>
                <div class="form-row custom-row row justify-content-around">
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="manifiestos" v-model="permissions.manifiestos">
                        <label class="form-check-label" for="defaultCheck1">Manifiestos</label>
                    </div>
                    <div class="form-group form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="reportes" v-model="permissions.reportes">
                        <label class="form-check-label" for="defaultCheck1">Reportes</label>
                    </div>
                </div>
                <div class="row form-group justify-content-center">
                    <div class="col-md-6 row">
                        <label for="address" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" v-model="permissions.name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" value="Guardar" class="btn btn-primary mb-2" @click="editRoles">
            </div>
        </div>
    </div>
</div>
