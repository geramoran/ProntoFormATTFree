@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Recibo</title>
@endsection

@section('content')
<main id="crud" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="recibo">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Recibo</h1>
    </div>
    <table id="Recibo_table" class="table display">
        <thead>
            <tr>
                <th>Id despacho</th>
                <th>Usuario</th>
                <th>Fecha de salida</th>
                <th>Total de productos</th>
                <th>Monto total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="desp in getCrudList">
                <td>@{{desp.id}}</td>
                <td>@{{desp.user}}</td>
                <td>@{{desp.date}}</td>
                <td>@{{desp.count}}</td>
                <td>@{{desp.mount}}</td>
                <td>
                    <a :href="'/recibo/' + desp.id" class="btn btn-primary">Detalle</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>
@endsection

@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    new Vue({
        el: '#crud',
        beforeMount: function() {
            this.crud = this.$el.attributes['crud'].value;
        },
        mounted: function(){
            this.getCrud();
        },
        data: {
            getCrudList: [],
            getCrudDetail: {},
            crud: '',
            getStatus: ''
        },
        methods: {
            getCrud: function(){
                axios.get(this.crud + '/all').then(response => {
                    var dump = [];
                    response.data.forEach(function(ud){
                        console.log('entra');
                        var sum = 0;
                        var count = 0;
                        var stat = '';
                        if(ud.unitdeliveries != null){
                            ud.unitdeliveries.forEach(function(u){
                                sum += u.mount;
                            });
                            count = ud.unitdeliveries.length;
                        }
                        var unit = {
                            id: ud.id,
                            user: ud.user.username,
                            count: count,
                            mount: sum,
                            status_id: ud.unitdeliveries[0]['visitStatus'],
                            date: moment(ud.deliveryDate).format("DD/MM/YYYY"),
                            status: ''
                        };
                        dump.push(unit);
                    });
                    this.getCrudList = dump;
                    //this.getCrudList = aUnit;
                    this.getCrudList.forEach(function(u){
                        axios.get('despacho/status/' + u.status_id).then( resp =>{
                            u.status = resp.data;
                        });
                    });
                });
            },
        }
    });

</script>
@endsection
