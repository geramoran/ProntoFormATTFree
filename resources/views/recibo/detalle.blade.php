@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Detalle de recibo</title>
@endsection

@section('content')
<main id="recibo" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="recibo">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Detalle de recibo</h1>
        <div class="btn btn-sm btn-bd-light my-2 my-md-0">
            <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#create">Confirmar recibo</a>
        </div>
    </div>
    <form action="/recibo" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="client_id">Usuario</label>
                <input type="text" class="form-control" name="client_id" id="client_id" v-model="userselect" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="city">Fecha de salida</label>
                <input type="text" class="form-control" name="city" id="city" readonly value=@php echo date('d/n/Y'); @endphp>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="place">Zona de entrega</label>
                <input type="text" class="form-control" name="place" id="place" v-model="area.name" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="place">Total de unidades</label>
                <input type="text" class="form-control" name="place" id="place" v-model="unitTot" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="place">Monto total</label>
                <input type="text" class="form-control" name="place" id="place" v-model="mountTot" readonly>
            </div>
        </div>
        <br>
        <div>
            <h3>Unidades</h3>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Codigo de unidad" name="unit_id">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="button" id="button-addon2">Agregar</button>
                </div>
            </div>
            <table id="" class="table display">
                <thead>
                    <tr>
                        <th>ID Unidad</th>
                        <th>Monto</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="up in prontoform">
                        <td>@{{up.FOLIO}}</td>
                        <td>@{{up.MONTOACOBRAR}}</td>
                        <td v-if="up.SEENTREGO == 'SI'">Entregado</td>
                        <td v-if="up.SEENTREGO == 'NO'">No Entregado</td>
                        <td>
                            <a class="btn btn-primary pull-right" href="#" @click="detalleEntrega(up.FOLIO)">Detalle</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
    @include('recibo.unidad')
</main>
@endsection


@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    new Vue({
        el: '#recibo',
        mounted: function(){
            this.getDetail();
        },
        data:{
            unit_id: '',
            unit_count: '',
            unit_mount: '',
            mountTot: 0,
            unitTot: 0,
            area: '',
            user: '',
            userselect: '',
            deliveryDate: '',
            unidad: {
                unit_id: '',
                unit_mount: 0
            },
            productDetail: {},
            despacho:{
                usuario_id: '',
                area_id: '',
                mountTot: 0,
                deliveryDate: ''
            },
            statusArea: '',
            unidades: [],
            unitdelivery: [],
            estatus: '',
            prontoform: '',
            pdetail: ''
        },
        methods:{
            getDetail: function(){
                var id = window.location.href.split('/').pop();
                axios.get('detail/' + id).then(response => {
                    var unit = [];
                    var sum = 0;
                    this.user = response.data.despacho.user;
                    var prontoform = this.user.prontoform_user;
                    if(prontoform == null){
                        this.userselect = this.user.username + ' - Sin usuario prontoform';
                    } else{
                        this.userselect = this.user.username + ' - ' + this.user.prontoform_user;
                    }
                    this.prontoform = response.data.prontoform;
                    this.area = response.data.despacho.area;
                    this.unidades = response.data.units;
                    if(Array.isArray(this.unidades)){
                        this.unitTot = this.unidades.length;
                    }
                    this.despacho = {
                        usuario_id: response.data.despacho.user.id,
                        area_id: response.data.despacho.area.id,
                        mountTot: 0,
                        deliveryDate: moment(response.data.despacho.deliveryDate).format("DD/MM/YYYY")
                    };
                    this.unidades.forEach(function (u) {
                        unit.push({
                            barcode: u.unit.barcode,
                            cantidad: u.count,
                            id: u.unit.id,
                            idProduct: u.unit.idProduct,
                            idstatus: u.unit.idstatus,
                            monto: u.mount,
                            remesa: u.unit.remesa
                        });
                        sum = parseFloat(sum) + parseFloat(u.mount);
                    });
                    this.despacho.mountTot = this.mountTot = sum;
                    this.unidades = unit;
                });
            },
            getProduct: function(id){
                axios.get('product/' + id.target.value).then(response =>{
                    this.product = response.data;
                });
                document.getElementById("product_id").disabled = false;
            },
            detailUnidad: function() {
                this.estatus = 'Entregado';
            },
            detailUnidad2: function() {
                this.estatus = 'No entregado';
            },
            detalleEntrega: function(folio){
                axios.get('prontoform/' + folio).then( response =>{
                    //console.log(response.data);
                    this.pdetail = response.data;
                    if(response.data.SEENTREGO == 'SI'){
                        $('#unidadDetalleEntregado').modal('show');
                    } else if(response.data.SEENTREGO == 'NO'){
                        $('#unidadDetalleNoEntregado').modal('show');
                    }
                });
            },
            addItem: function(){
                if(this.unit_count == ""){
                    this.unit_count = 1;
                }
                if(this.unit_mount == ""){
                    this.unit_mount = 0;
                }
                var mount = this.unit_mount;
                var count = this.unit_count;
                axios.get("/despacho/unit/" + this.unit_id).then( response =>{
                    if(response.data == null || response.data == ""){
                        alert('Codigo de barras no valido. Favor de verificar');
                    } else{
                        this.unidades.push({
                            'barcode': response.data.barcode,
                            'id': response.data.id,
                            'idProduct': response.data.idProduct,
                            'idstatus': response.data.idstatus,
                            'remesa': response.data.remesa,
                            'monto': mount,
                            'cantidad': count
                        });
                        this.mountTot = parseFloat(this.mountTot) + parseFloat(count);
                    }
                });
                this.unidad.unit_id = '';
                this.unidad.unit_mount = 0;
                this.unit_count = '';
                this.unit_mount = '';
                this.unit_id = '';
            },
            deleteUnit: function(index){
                this.remesa.mountTot = parseFloat(this.remesa.mountTot) - parseFloat(this.unidades[index].mount);
                Vue.delete(this.unidades, index);
            },
            sendAll: function(){
                if(this.unidades.length != this.unitTot){
                    console.log(this.unidades.length);
                    console.log(this.unitTot);
                    alert('La cantidad de unidades no es equivalente al total de unidades añadidas. Favor de validar');
                } else{
                    var desp = {
                        user: this.user,
                        area: this.area,
                        deliveryDate: moment().format("YYYY/MM/DD")
                    };
                    var allData = {
                        unidades: this.unidades,
                        despacho: desp
                    };
                    axios.post('/despacho', allData).then(response =>{
                        alert('Creado el despacho');
                        window.location=url + 'despacho';
                    });
                }
            }
        }
    });
</script>
@endsection
