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
        <input type="text" class="form-control" name="mountTot" id="mountTot" v-model="remesa.mountTot" disabled>
    </div>
    <br>
    <div>
        <h3>Unidades a registrar</h3>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Codigo de unidad</span>
            </div>
            <input type="text" class="form-control" name="unit_id" id="unitId" v-model="unidadSelect" @keyup.enter="changeFocus">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Ubicacion</span>
            </div>
            <select name="ubicacion" id="locate" class="custom-select" v-model="place" @keyup.enter="addItem">
                <option v-for="place in places" :value="place.id">@{{place.id}} - @{{place.warehouse.name}} - @{{place.locate.name}} - @{{place.level.name}}</option>
            </select>
            <div class="input-group-append">
                <button class="btn btn-outline-success" type="button" id="button-addon2" v-on:click.prevent="addItem" placeholder="Ubicacion de almacen">Agregar</button>
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
                    <td>@{{unit.placename}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection


@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        new Vue({
            el: '#inventario',
            mounted: function(){

            },
            created: function(){
                this.loadPlace();
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
                place: '',
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
                                placename: '',
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
                        this.unidades = response.data.unidades;
                        console.log(response.data.unidades);
                        response.data.unidades.forEach((item) =>{
                            var unidadSel = {
                                id: item.id,
                                color: '',
                                place: 0,
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
                        document.getElementById('unit_id').focus();
                    });
                },
                getClient: function(){
                    axios.get('/client/all').then( response =>{
                        this.client = response.data;
                    });
                },
                changeFocus: function(){
                    document.getElementById('locate').focus();
                },
                addItem: function(){
                    var ban = 0;
                    this.unidades.filter(unitArray => {
                        if(unitArray.barcode === this.unidadSelect){
                            if(this.place != ''){
                                var placeSelect = [];
                                this.places.forEach(result =>{
                                    if(this.place === result.id){
                                        placeSelect = result;
                                    }
                                });
                                unitArray.color = 'table-success';
                                unitArray.place = this.place;
                                var wname = placeSelect.warehouse.name;
                                var lname = placeSelect.locate.name;
                                var nname = placeSelect.level.name;
                                unitArray.placename = this.place + ' - ' + wname + ' - ' + lname + ' - ' + nname;
                                ban = 3
                            } else{
                                ban = 1;
                            }
                        } else {
                            if (ban == 0){
                                ban = 2;
                            }
                        }
                    });
                    switch(ban){
                        case 2:
                            alert("El producto no se encuentra en esta remesa");
                        break;
                        case 1:
                            alert('Favor de seleccionar una ubicacion');
                        break;
                    }
                    this.unidad.unit_id = '';
                    this.place = '';
                    this.unidadSelect = '';
                    document.getElementById('unitId').focus();
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
                            window.location=url + 'inventario';
                        });
                    }
                }
            }
        });
    </script>
@endsection
