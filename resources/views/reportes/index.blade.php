@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Reportes</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
<main id="crud" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="reportes">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Reportes</h1>
        <a href="#" class="btn btn-primary pull-right">Buscar</a>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="client_id">Cliente</label>
            <select name="client_id" id="client" class="form-control" @change="getProduct($event)" v-model="reporte.client_id">
                <option value="0" selected>Todos</option>
                <option v-for="c in client" :value="c.id">@{{c.id}} - @{{c.name}}</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="product_id">Producto</label>
            <select name="product_id" id="product_id" class="form-control" @change="" v-model="reporte.product_id">
                <option value="0" selected>Todos</option>
                <option v-for="p in product" :value="p.id">@{{p.id}} - @{{p.name}}</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="product_id">Estatus</label>
            <select name="product_id" id="status_id" class="form-control" @change=" " v-model="reporte.status_id">
                <option v-for="p in status" :value="p.id">@{{p.id}} - @{{p.name}}</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="product_id">Tiempo de almacen</label>
            <div class="input-group-prepend">
                <input type="text" placeholder="De..." aria-label="Fecha inicial" class="form-control datepicker" style="padding: 0.25rem 0.25rem">
                <input type="text" placeholder="Al..." aria-label="Fecha final" class="form-control datepicker" style="padding: 0.25rem 0.25rem">
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="product_id">Fecha de entregas</label>
            <input type="text" aria-label="Fecha entrega" class="form-control datepicker">
        </div>
        <div class="form-group col-md-4">
            <label for="product_id">Codigo de Unidad</label>
            <input type="text" aria-label="Fecha entrega" class="form-control datepicker">
        </div>
    </div>
    <table id="Despacho_table" class="table display">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Zona</th>
                <th>Quien recibe</th>
                <th>Fecha de llegada</th>
                <th>Fecha de salida</th>
                <th>Fecha de entrega</th>
                <th>Estatus</th>
                <th>Motivo final</th>
                <th>Fecha de visita</th>
                <th>Usuario</th>
                <th>¿Cobro?</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</main>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        $( function() {
            $( ".datepicker" ).datepicker();
        } );
    </script>
    <script>
        new Vue({
            el: '#crud',
            mounted: function(){
                this.getClient();
            },
            data:{
                client: '',
                product: '',
                status: '',
                unidad: {
                    unit_id: '',
                    unit_mount: ''
                },
                productDetail: {},
                reporte:{
                    dateArrive: '',
                    dateClose: '',
                    remesaFormat: '',
                    product_id: '',
                    client_id: '',
                    status_id: '',
                    mountTot: 0,
                    status: 1
                },
                getCrudList: {
                    id: '',
                    user: ''
                },
                client: '',
                unidades: [],
            },
            methods:{
                getClient: function(){
                    axios.get('reportes/client').then( response =>{
                        this.client = response.data;
                    });
                    //this.remesa.dateArrive = moment().format("DD/MM/YYYY");
                },
                getStatus: function(id){
                    if(id.target.value != 0){
                        console.log("entra");
                        axios.get('catalogstatus/' + id.target.value).then(response =>{
                            if(response.data.id != undefined){
                                this.remesa.status = response.data.id;
                            }else {
                                this.remesa.status = 1;
                            }
                        });
                    } else{
                        console.log("NO entra");
                        axios.get('reportes/status').then(response =>{
                            this.status = response.data;
                        });
                    }
                },
                getProduct: function(id){
                    if(id.target.value == 0){
                        axios.get('product/all').then(response =>{
                            this.product = response.data;
                        });
                        this.getStatus(id);
                    } else{
                        axios.get('product/' + id.target.value).then(response =>{
                            this.product = response.data;
                        });
                        this.getStatus(id);
                    }
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
                    if(isNaN(this.unidad.unit_mount) || this.unidad.unit_mount == ""){
                        this.unidad.unit_mount = 0;
                    }
                    this.unidades.push({
                        id: this.unidad.unit_id,
                        mount: this.unidad.unit_mount
                    });
                    this.remesa.mountTot = parseFloat(this.remesa.mountTot) + parseFloat(this.unidad.unit_mount);
                    this.unidad.unit_id = '';
                    this.unidad.unit_mount = '';
                    document.getElementById('unit_id').focus();
                },
                deleteUnit: function(index){
                    this.remesa.mountTot = parseFloat(this.remesa.mountTot) - parseFloat(this.unidades[index].mount);
                    Vue.delete(this.unidades, index);
                },
                changeFocusMount: function(){
                    document.getElementById('unit_mount').focus();
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
                        window.location=url + 'remesa';
                    });
                }
            }
        });
    </script>
@endsection
