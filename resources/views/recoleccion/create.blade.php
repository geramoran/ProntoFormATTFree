@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Nueva Recolección</title>
@endsection

@section('content')
<main id="recoleccionLoad" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="remesa">
    <form @submit.prevent="sendAll" method="POST">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h1">Nueva Recoleccion</h1>
            <div>
                <a type="button" class="btn btn-primary" href="/remesa">Regresar</a>
                <input type="submit" value="Agregar" class="btn btn-primary mb-2">
            </div>
        </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="client_id">Cliente</label>
            <select name="client_id" id="client" class="form-control" @change="getProduct($event)" v-model="remesa.client_id">
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
            <input type="text" class="form-control" name="dateArrive" id="dateArrive" v-model="remesa.dateArrive" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="dateClose">Fecha de cierre</label>
            <input type="text" class="form-control" name="dateClose" id="dateClose"  v-model="remesa.dateClose" disabled>
        </div>
        <div class="form-group col-md-4">
            <label for="mountTotal">Total de monto de cobro</label>
            <input type="text" class="form-control" name="mountTotal" id="mountTotal" v-model="remesa.mountTot" disabled>
        </div>
    </div>
    <br>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h3 class="h3">Unidades registradas</h3>
            <label>Total de unidades: @{{unidades.length}}</label>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Numero de unidad" name="unit_id" id="unit_id" v-model="unidad.unit_id" disabled>
            <input type="text" class="form-control" placeholder="monto" name="unit_mount" id="unit_mount" v-model="unidad.unit_mount" disabled>
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="button" id="buttonUnit" v-on:click.prevent="addTable" disabled>Agregar</button>
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
                    <td>@{{unit.id}}</td>
                    <td>@{{unit.mount}}</td>
                    <td>
                        <button class="btn btn-danger" @click="deleteUnit(index)">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </form>
@endsection


@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        new Vue({
            el: '#recoleccionLoad',
            mounted: function(){
                this.getClient();
            },
            data:{
                client: '',
                product: '',
                unidad: {
                    unit_id: '',
                    unit_mount: 0
                },
                productDetail: {},
                remesa:{
                    dateArrive: '',
                    dateClose: '',
                    remesaFormat: '',
                    product_id: '',
                    client_id: '',
                    mountTot: 0,
                    status: 1
                },
                unidades: [],
            },
            methods:{
                getClient: function(){
                    axios.get('client').then( response =>{
                        this.client = response.data;
                    });
                    this.remesa.dateArrive = moment().format("DD/MM/YYYY");
                },
                getStatus: function(id){
                    console.log('jala');
                    axios.get('status/' + id.target.value).then(response =>{
                        if(response.data.id != undefined){
                            this.remesa.status = response.data.id;
                        }else {
                            this.remesa.status = 1;
                        }
                    });
                },
                getProduct: function(id){
                    axios.get('product/' + id.target.value).then(response =>{
                        this.product = response.data;
                    });
                    this.getStatus(id);
                    document.getElementById("product_id").disabled = false;
                },
                getProductSelected: function(id){
                    axios.get('productSelected/' + id.target.value).then(response =>{
                        this.productDetail = response.data;
                        this.remesa.dateClose = moment().add(this.productDetail.tiempoCierre, 'd').format("DD/MM/YYYY");
                    });
                    document.getElementById("unit_id").disabled = false;
                    document.getElementById("unit_mount").disabled = false;
                    document.getElementById("buttonUnit").disabled = false;
                },
                addTable: function(){
                    this.unidades.push({
                        id: this.unidad.unit_id,
                        mount: this.unidad.unit_mount
                    });
                    this.remesa.mountTot = parseFloat(this.remesa.mountTot) + parseFloat(this.unidad.unit_mount);
                    this.unidad.unit_id = '';
                    this.unidad.unit_mount = 0;
                },
                deleteUnit: function(index){
                    this.remesa.mountTot = parseFloat(this.remesa.mountTot) - parseFloat(this.unidades[index].mount);
                    Vue.delete(this.unidades, index);
                },
                sendAll: function(){
                    this.remesa.dateArrive = moment().format("YYYY/MM/DD");
                    this.remesa.dateClose = moment().add(this.productDetail.tiempoCierre, 'd').format("YYYY/MM/DD");
                    this.remesa.remesaFormat = moment().format("YYYYMMDD");
                    var allData = {
                        unidades: this.unidades,
                        remesa: this.remesa
                    };
                    console.log(allData);
                    axios.post('/remesa', allData).then(response =>{
                        alert('Creado la remesa con el numero: ' + response.data);
                        window.location="http://127.0.0.1:8000/remesa";
                    });
                }
            }
        });
    </script>
@endsection
