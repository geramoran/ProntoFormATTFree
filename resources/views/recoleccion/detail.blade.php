@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Recolección</title>
@endsection

@section('content')
<main id="recoleccionLoad" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="remesa">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Recoleccion No.@{{remesa.remesa}} - @{{remesa.catalog_status.name}}</h1>
        <div>
            <a type="button" class="btn btn-primary" href="/remesa">Regresar</a>
            <input type="button" value="Editar" class="btn btn-success" v-if="!editar" @click="enableEdit">
            <input type="button" value="Actualizar" class="btn btn-warning" v-if="editar" @click="sendAll">
        </div>
    </div>
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="client_id">Cliente</label>
            <select name="client_id" id="client_id" class="form-control" @change="getProduct($event)" v-model="remesa.client_id" disabled>
                <option v-for="c in client" :value="c.id">@{{c.id}} - @{{c.name}}</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="product_id">Producto</label>
            <select name="product_id" id="product_id" class="form-control" @change="getProductSelected($event)" v-model="remesa.product_id" disabled>
                <option v-for="p in product" :value="p.id">@{{p.id}} - @{{p.name}}</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="dateArrive">Fecha de llegada</label>
            <input type="text" class="form-control" name="dateArrive" id="dateArrive" v-model="remesa.dateArrive" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="dateClose">Fecha de cierre</label>
            <input type="text" class="form-control" name="dateClose" id="dateClose"  v-model="remesa.dateClose" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="mountTotal">Total de monto de cobro</label>
            <input type="text" class="form-control" name="mountTotal" id="mountTotal" v-model="remesa.mountTot" readonly>
        </div>
    </div>
    <br>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h3 class="h3">Unidades registradas</h3>
            <label>Total de unidades: @{{unidades.length}}</label>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Numero de unidad" id="unit_id" name="unit_id" v-model="unidad.barcode" @keyup.enter="changeFocusMount" disabled>
            <input type="text" class="form-control" placeholder="monto" name="unit_mount" id="unit_mount" v-model="unidad.mount" @keyup.enter="addTable" disabled>
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="button" id="addUnit" v-on:click.prevent="addTable" disabled>Agregar</button>
            </div>
        </div>
        <table id="Unit_table" class="table display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Monto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(unit, index) in unidades">
                    <td>@{{unit.barcode}}</td>
                    <td>@{{unit.mount}}</td>
                    <td>
                        <button class="btn btn-danger" @click="deleteUnit(index)" v-if="btnUnit">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection


@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        new Vue({
            el: '#recoleccionLoad',
            mounted: function(){
                this.getClient();
                this.getDetail();
            },
            data:{
                client: '',
                product: '',
                unidad: {
                    barcode: '',
                    mount: 0
                },
                remesa:{
                    dateArrive: '',
                    dateClose: '',
                    remesaFormat: '',
                    product_id: '',
                    client_id: '',
                    mountTot: 0,
                    catalog_status: {
                        name: ''
                    },
                    status_id: 1
                },
                productItem: '',
                client_id: '',
                unidades: [],
                productDetail: '',
                editar: false,
                btnUnit: false
            },
            methods:{
                getDetail: function(){
                    var remesa = window.location.href.split('/').pop();
                    axios.get('detail/' + remesa).then( response =>{
                        this.remesa = response.data.remesa;
                        this.unidades = response.data.unidades;
                        axios.get('product/' + this.remesa.client_id).then(response =>{
                            this.product = response.data;
                        });
                        this.remesa.dateArrive = moment(this.remesa.dateArrive).format("DD/MM/YYYY");
                        this.remesa.dateClose = moment(this.remesa.dateClose).format("DD/MM/YYYY");
                        this.remesa.product_id = this.unidades[0].idProduct;
                    });
                },
                getStatus: function(id){
                    console.log('jala');
                    axios.get('status/' + id.target.value).then(response =>{
                        if(response.data.id != undefined){
                            console.log('jala2');
                            this.remesa.status_id = response.data.id;
                        }else {
                            console.log('jala3');
                            this.remesa.status_id = 1;
                        }
                    });
                },
                getClient: function(){
                    axios.get('client').then( response =>{
                        this.client = response.data;
                    });
                },
                getProduct: function(id){
                    axios.get('product/' + id.target.value).then(response =>{
                        this.product = response.data;
                    });
                    this.remesa.dateArrive = moment().format("DD/MM/YYYY");
                    this.getStatus(id);
                },
                getProductSelected: function(id){
                    axios.get('productSelected/' + id.target.value).then(response =>{
                        this.productDetail = response.data;
                    });
                },
                changeFocusMount: function(){
                    document.getElementById('unit_mount').focus();
                },
                addTable: function(){
                    if(isNaN(this.unidad.unit_mount) || this.unidad.unit_mount == ""){
                        this.unidad.unit_mount = 0;
                    }
                    this.unidades.push({
                        barcode: this.unidad.barcode,
                        mount: this.unidad.mount
                    });
                    this.remesa.mountTot = parseFloat(this.remesa.mountTot) + parseFloat(this.unidad.mount);
                    this.unidad.barcode = '';
                    this.unidad.mount = '';
                    document.getElementById('unit_id').focus();
                },
                enableEdit: function() {
                    this.editar = true;
                    document.getElementById("client_id").disabled = false;
                    document.getElementById("product_id").disabled = false;
                    document.getElementById("unit_id").disabled = false;
                    document.getElementById("unit_mount").disabled = false;
                    document.getElementById("addUnit").disabled = false;
                    this.btnUnit = true;
                    axios.get('productSelected/' + this.remesa.product_id).then(response =>{
                        this.productDetail = response.data;
                    });
                },
                deleteUnit: function(index){
                    console.log(index);
                    this.remesa.mountTot = parseFloat(this.remesa.mountTot) - parseFloat(this.unidades[index].mount);
                    Vue.delete(this.unidades, index);
                },
                sendAll: function(){
                    this.remesa.dateArrive = moment().format("YYYY/MM/DD");
                    this.remesa.dateClose = moment().add(this.productDetail.tiempoCierre, 'd').format("YYYY/MM/DD");
                    this.remesa.remesaFormat = moment().format("YYYYMMDD")
                    var allData = {
                        unidades: this.unidades,
                        remesa: this.remesa
                    };
                    axios.put('/remesa/' + this.remesa.remesa, allData).then(response =>{
                        alert('Remesa Actualizada');
                        window.location=url + 'remesa';
                    }).catch(error =>{
                        alert("Ocurrio un error");
                    });
                }
            }
        });
    </script>
@endsection
