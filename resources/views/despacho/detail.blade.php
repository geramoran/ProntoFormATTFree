@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Nueva Despacho</title>
@endsection

@section('content')
<main id="despacho" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Detalle de despacho</h1>
        <input type="submit" value="Agregar" class="btn btn-primary mb-2" @click="sendAll">
    </div>
    <form action="/despacho" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="user_id">Usuarios</label>
                <select name="user_id" id="user" class="form-control" v-model="despacho.usuario_id">
                    <option v-for="user in users" :value="user.id">@{{user.id}} - @{{user.username}}</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="area">Zona de entrega</label>
                <select name="area" id="area" class="form-control" v-model="despacho.area_id">
                    <option v-for="a in areas" :value="a.id">@{{a.id}} - @{{a.name}}</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="deliveryDate">Fecha de despacho</label>
                <input type="text" class="form-control" name="city" id="city" v-model="despacho.deliveryDate" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="unitTot">Total de unidades</label>
                <input type="text" class="form-control" name="unitTot" id="unitTot" v-model="unitTot">
            </div>
            <div class="form-group col-md-6">
                <label for="mountTot">Total de monto de cobro</label>
                <input type="text" class="form-control" name="mountTot" id="mountTot" v-model="mountTot" readonly>
            </div>
        </div>
        <br>
        <div>
            <h3>Unidades a enviar</h3>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Numero de unidad" name="unit_id" v-model="unit_id">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="button" id="button-addon2" v-on:click.prevent="addItem">Agregar</button>
                </div>
            </div>
            <table id="Unit_table" class="table display">
                <thead>
                    <tr>
                        <th>ID Unidad</th>
                        <th>Monto</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="u in unidades">
                        <td>@{{u.barcode}}</td>
                        <td>@{{u.monto}}</td>
                        <td>@{{u.cantidad}}</td>
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
            el: '#despacho',
            mounted: function(){
                //this.getUser();
                //this.getArea();
                this.getDetail();
            },
            data:{
                unit_id: '',
                unit_count: '',
                unit_mount: '',
                mountTot: 0,
                unitTot: 0,
                areas: '',
                area: '',
                users: '',
                user: '',
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
            },
            methods:{
                getDetail: function(){
                    var id = window.location.href.split('/').pop();
                    axios.get('detail/' + id).then(response => {
                        var unit = [];
                        var sum = 0;
                        this.users = response.data.users;
                        this.areas = response.data.areas;
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
                getUser: function(){
                    axios.get('/despacho/user').then(response =>{
                        this.users = response.data;
                    }).catch(function (error){
                        console.log(error);
                    });
                    this.deliveryDate = moment().format("DD/MM/YYYY");
                },
                getProduct: function(id){
                    axios.get('product/' + id.target.value).then(response =>{
                        this.product = response.data;
                    });
                    document.getElementById("product_id").disabled = false;
                },
                getArea: function(){
                    axios.get('area').then(response => {
                        this.areas = response.data;
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
                            console.log(response.data);
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
