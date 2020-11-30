@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Despacho</title>
@endsection

@section('content')
<main id="crud" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="despacho">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Despacho</h1>
        <a href="/despacho/create" class="btn btn-success pull-right">Nuevo despacho</a>
    </div>
    <table id="Despacho_table" class="table display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Cantidad de productos</th>
                <th>Monto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="desp in getCrudList">
                <td>@{{desp.id}}</td>
                <td>@{{desp.user}}</td>
                <td>@{{desp.count}}</td>
                <td>@{{desp.mount}}</td>
                <td>
                    <a :href="'edit/' + desp.id" class="btn btn-primary">Detalles</a>
                    <a href="/free" class="btn btn-primary">Liberar</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>
@endsection

@section('js')
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
            getCrudList: {},
            getCrudDetail: {},
            crud: ''
        },
        methods: {
            getCrud: function(){
                axios.get(this.crud + '/all').then(response => {
                    //this.getCrudList = response.data;
                    var aUnit = [];
                    response.data.forEach(function(ud){
                        console.log(ud);
                        var sum = 0;
                        var count = 0;
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
                            mount: sum
                        };
                        aUnit.push(unit);
                    });
                    this.getCrudList = aUnit;
                });
            }
        }
    });

</script>
@endsection
