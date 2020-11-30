@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Recoleccion</title>
@endsection

@section('content')
<main id="crud" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="remesa">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Recoleccion</h1>
        <a href="/remesa/create" class="btn btn-success pull-right">Agregar</a>
    </div>
    <table id="Remesa_table" class="table display">
        <thead>
            <tr>
                <th>Remesa</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="remesa in getCrudList">
                <td>@{{remesa.remesa}}</td>
                <td>@{{remesa.catalog_status.name}}</td>
                <td>
                    <a :href="'remesa/' + remesa.remesa" class="btn btn-primary">Detalle</a>
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
