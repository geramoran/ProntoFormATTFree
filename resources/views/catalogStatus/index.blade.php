@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Catalogo de estatus</title>
@endsection

@section('content')
<main id="crud" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="catalogstatus">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Catalogo de estatus</h1>
        <div class="btn btn-sm btn-bd-light my-2 my-md-0">
            <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#create">Nuevo... </a>
        </div>
    </div>
    <table id="CatalogStatus_table" class="table display">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="catalog in getCrudList.catalogStatus">
                <td>@{{catalog.id}}</td>
                <td>@{{catalog.name}}</td>
                <td>@{{catalog.type}}</td>
                <td>
                    <a href="#" class="btn btn-warning" v-on:click.prevent="editCrud(catalog.id)">Editar</a>
                    <a href="#" class="btn btn-danger" v-on:click.prevent="deleteCrud(catalog.id)">Eliminar</a>
                </td>
            </tr>
        </tbody>
    </table>
    @include('catalogStatus.create')
    @include('catalogStatus.edit')
</main>
@endsection

@section('js')
    <script>
        new Vue({
            el: '#crud',
            created: function(){
                $('#Unit_table').DataTable();
            },
            beforeMount: function() {
                this.crud = this.$el.attributes['crud'].value;
            },
            mounted: function(){
                this.getCrud();
            },
            data: {
                lists: [],
                errors: '',
                crud: '',
                getCrudList: [],
                getCrudDetail: {
                    client: {},
                    product: {
                        client: {}
                    },
                    relplace: {
                        warehouse: {},
                        locate: {},
                        level: {}
                    },
                    catalogStatus: {},
                    warehouse: {},
                    locate: {},
                    level: {}
                },
                fd: [],
                unit: '',
                unitsRows: [],
                client: '',
                products: ''
            },
            methods: {
                getCrud: function(){
                    axios.get(this.crud + '/all').then(response => {
                        this.getCrudList = response.data;
                    });
                },
                createCrud: function(){

                    this.fd = new FormData(document.getElementById('createCatalogStatus'));
                    
                    // //-----Validaciones
                    // //Nombre 50 char
                    // if(this.fd.get('name').length > 50 || this.fd.get('name').length ==0){
                    //     alert('Nombre está en blanco o no contiene la cantidad permitida de caracteres.');
                    // }else{
                    //     alert('Los datos ingresados son correctos');
                    // }
                    
                    axios.post(this.crud, this.fd).then(response => {
                        this.getCrud(this.crud);
                        $('#create').modal('hide');
                        //toastr.success('Creada con éxito');
                        this.fd = [];
                    }).catch(error => {
                        this.errors = 'Corrija para poder crear con éxito';
                        this.fd = [];
                    });
                },
                detailCrud: function(idCrud){
                    axios.get(this.crud + '/' + idCrud).then( response => {
                        this.getCrudDetail = response.data;
                        $('#detail').modal('show');
                    });
                },
                editCrud: function(idCrud){
                    $('.modal').modal('hide');
                    axios.get(this.crud + '/' + idCrud + '/edit').then( response => {
                        this.getCrudDetail = response.data;
                        $('#edit').modal('show');
                    });
                },
                updateCrud: function(idCrud){
                    var sendUp = '';
                    switch(this.crud){
                        case 'product':
                            sendUp = {
                                "name": this.getCrudDetail.product.name,
                                "client_id": this.getCrudDetail.product.client_id,
                                "costoEntrega": this.getCrudDetail.product.costoEntrega,
                                "costoDevolucion": this.getCrudDetail.product.costoDevolucion,
                                "Peso": this.getCrudDetail.product.Peso,
                                "comisionEntrega": this.getCrudDetail.product.comisionEntrega,
                                "comisionDevolucion": this.getCrudDetail.product.comisionDevolucion,
                                "tiempoCierre": this.getCrudDetail.product.tiempoCierre,
                                "nivelServicio": this.getCrudDetail.product.nivelServicio
                            };
                        break;
                        case 'place':
                            sendUp = {
                                "warehouse_id": this.getCrudDetail.relplace.warehouse_id,
                                "locate_id": this.getCrudDetail.relplace.locate_id,
                                "level_id": this.getCrudDetail.relplace.level_id,
                            };
                        break;
                        case 'user':
                            sendUp: {

                            }
                        break;
                        default:
                            sendUp = this.getCrudDetail;
                        break;
                    }
                    axios.put(this.crud + '/' + idCrud, sendUp).then( response => {
                        this.getCrud(this.crud);
                        $('#edit').modal('hide');
                        //toastr.success('Creada con éxito');
                        this.fd = [];
                    });
                },
                deleteCrud: function(idCrud){
                    if(window.confirm('¿Desea eliminar dicho registro?')){
                        axios.delete(this.crud + '/' + idCrud).then(response => { //eliminamos
                            $('.modal').modal('hide');
                            this.getCrud(); //listamos
                            //toastr.success('Eliminado correctamente'); //mensaje
                        });
                    }
                },
                switchCrudCreate: function(idfunction, nameFunction){
                    var fds = new FormData(document.getElementById(idfunction));
                    axios.post(nameFunction, fds).then(response => {
                        this.getCrud(this.crud);
                        //toastr.success('Creada con éxito');
                        this.fd = [];
                    }).catch(error => {
                        this.errors = 'Corrija para poder crear con éxito';
                        this.fd = [];
                    });
                },
                switchCrudDelete: function(idfunction, nameFunction){
                    axios.delete(nameFunction + '/' + idfunction).then(response => {
                        this.getCrud(this.crud);
                        //toastr.success('Creada con éxito');
                        this.fd = [];
                    }).catch(error => {
                        this.errors = 'Corrija para poder crear con éxito';
                        this.fd = [];
                    });
                },
            }
        });

    </script>
@endsection
