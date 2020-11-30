@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Ingreso de Inventario</title>
@endsection

@section('content')
<main id="inventario" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="remesa">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Ingreso de inventario</h1>
        <div>
            <a type="button" class="btn btn-primary" href="/inventario">Regresar</a>
            <button class="btn btn-primary" @click="sendStorage">Guardar</button>
        </div>
    </div>
    <form method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="remesa">Remesa</label>
                <input type="text" class="form-control" placeholder="Numero de remesa" name="remesa" v-model="remesa.remesa" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="client_id">Cliente</label>
                <select name="client_id" id="client_id" class="form-control" @change="getProduct($event)" v-model="remesa.client_id" disabled>
                    <option v-for="c in client" :value="c.id">@{{c.id}} - @{{c.name}}</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="product_id">Producto</label>
                <select name="product_id" id="product_id" class="form-control" @change="getProductSelected($event)" v-model="remesa.product_id" disabled>
                    <option v-for="p in product" :value="p.id">@{{p.id}} - @{{p.name}}</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="mountTot">Monto de cobro</label>
            <input type="text" class="form-control" name="mountTot" id="mountTot" v-model="remesa.mountTot">
        </div>
        <br>
        <div>
            <h3>Unidades registradas</h3>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Numero de unidad" name="unit_id" v-model="unidadSelect">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="button" id="button-addon2" v-on:click.prevent="addItem()">Agregar</button>
                </div>
            </div>
            <table id="Unit_table_inv" class="table display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Monto</th>
                        <th>Ubicación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(unit, index) in unidades" :class="unit.color">
                        <td>@{{unit.barcode}}</th>
                        <td>@{{unit.mount}}</th>
                        <td>
                            <select name="ubicacion" id="locate" class="form-control" v-model="unit.place">
                                <option v-for="place in places" :value="place.id">@{{place.id}} - @{{place.warehouse.name}} - @{{place.locate.name}} - @{{place.level.name}}</option>
                            </select>
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
            el: '#inventario',
            mounted: function(){
                this.loadPlace();
            },
            created: function(){
                this.getDetail();
            },
            data:{
                client: '',
                product: '',
                places: '',
                unidad: {
                    id: '',
                    barcode:'',
                    mount: 0,
                    color: '',
                    place: ''
                },
                nRemesa: '',
                remesa:{
                    dateArrive: '',
                    dateClose: '',
                    remesaFormat: '',
                    product_id: '',
                    client_id: '',
                    mountTot: 0
                },
                unidadSelect: '',
                unidades: [],
            },
            methods:{
                loadPlace: function(){
                    axios.get('/place/all').then(response => {
                        this.places = response.data.relplace;
                    });
                },
                getDetail: function(){
                    var remesa = window.location.href.split('/').pop();
                    this.getClient();
                    axios.get('/remesa/detail/' + remesa).then( response =>{
                        this.remesa = response.data.remesa;
                        this.nremesa = remesa;
                        response.data.unidades.forEach((item) =>{
                            var unidadSel = {
                                id: item.id,
                                color: '',
                                place: '',
                                barcode: item.barcode,
                                idProduct: item.idProduct,
                                mount: item.mount,
                                idstatus: item.idstatus,
                                remesa: item.remesa
                            };
                            this.unidades.push(unidadSel);
                        });
                        axios.get('/remesa/product/' + this.remesa.client_id).then(response =>{
                            this.product = response.data;
                        });
                        this.remesa.dateArrive = moment(this.remesa.dateArrive).format("DD/MM/YYYY");
                        this.remesa.dateClose = moment(this.remesa.dateClose).format("DD/MM/YYYY");
                        this.remesa.product_id = this.unidades[0].idProduct;
                    });
                },
                findRemesa: function(){
                    this.getClient();
                    axios.get('remesa/detail/' + this.nRemesa).then( response =>{
                        this.remesa = response.data.remesa;
                        //this.unidades = response.data.unidades;
                        console.log(response.data.unidades);
                        response.data.unidades.forEach((item) =>{
                            var unidadSel = {
                                id: item.id,
                                color: '',
                                place: '',
                                barcode: item.barcode,
                                idProduct: item.idProduct,
                                mount: item.mount,
                                idstatus: item.idstatus,
                                remesa: item.remesa
                            };
                            this.unidades.push(unidadSel);
                        });
                        axios.get('remesa/product/' + this.remesa.client_id).then(response =>{
                            this.product = response.data;
                        });
                        this.remesa.dateArrive = moment(this.remesa.dateArrive).format("DD/MM/YYYY");
                        this.remesa.dateClose = moment(this.remesa.dateClose).format("DD/MM/YYYY");
                        this.remesa.product_id = this.unidades[0].idProduct;
                    });
                },
                getClient: function(){
                    axios.get('/client/all').then( response =>{
                        this.client = response.data;
                    });
                },
                addItem: function(){
                    let ban = false;
                    const result = this.unidades.filter(unitArray => {
                        if(unitArray.barcode === this.unidadSelect){
                            unitArray.color = 'table-success';
                            ban = true;
                        }
                    });
                    if(!ban){
                        alert("El producto no se encuentra en esta remesa");
                    }
                    {{-- this.unidades.push({
                        id: this.unidad.unit_id,
                        mount: this.unidad.unit_mount
                    });
                    this.remesa.mountTot = parseFloat(this.remesa.mountTot) + parseFloat(this.unidad.unit_mount);
                    this.unidad.unit_id = '';
                    this.unidad.unit_mount = 0; --}}
                },
                deleteUnit: function(index){
                    this.remesa.mountTot = parseFloat(this.remesa.mountTot) - parseFloat(this.unidades[index].mount);
                    Vue.delete(this.unidades, index);
                },
                sendStorage: function(){
                    let customData = new Array();
                    let ban = 0;
                    this.unidades.forEach((item) => {
                        if(item.color == ""){
                            ban = 1;
                        } else if (item.place == ""){
                            ban = 2;
                        } else{
                            customData.push({
                                id: item.id,
                                place: item.place
                            });
                        }
                    });
                    var index = {
                        storage: customData,
                        remesa: this.remesa.remesa
                    };
                    if (ban == 1){
                        alert("Hay unidades sin ingresar,  favor de verificar antes de continuar");
                    } else if (ban == 2){
                        alert("Favor de verificar que todas las unidades tienen una ubicación seleccionada");
                    } else{
                        axios.post('/inventario', index).then(response => {
                            alert("Inventario actualizado");
                            window.location="http://127.0.0.1:8000/inventario";
                        });
                    }
                }
            }
        });
    </script>
@endsection
