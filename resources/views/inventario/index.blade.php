@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Despacho</title>
@endsection

@section('content')
<main id="crud" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="inventario">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Inventario</h1>
    </div>
    <table id="Inventario_table" class="table display">
        <thead>
            <tr>
                <th>Remesa</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="desp in getCrudList">
                <td>@{{desp.remesa}}</td>
                <td>@{{desp.catalog_status.name}}</td>
                <td>
                    <a :href="'inventario/' + desp.remesa" class="btn btn-primary">Realizar inventario</a>
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
            getCrudList: [],
            getCrudDetail: {},
            crud:''
        },
        methods: {
            getCrud: function(){
                axios.get(this.crud + '/all').then(response => {
                    this.getCrudList = response.data;
                });
            }
        }
    });

</script>
@endsection
