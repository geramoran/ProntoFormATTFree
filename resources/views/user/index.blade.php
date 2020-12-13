@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Usuarios</title>
@endsection

@section('content')
<main id="crud" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="user">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Usuarios</h1>
        <div class="btn btn-sm btn-bd-light my-2 my-md-0">
            <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#create">Nuevo... </a>
        </div>
    </div>
    <table id="User_table" class="table display">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in getCrudList">
                <td>@{{user.username}}</td>
                <td>
                    <a href="#" class="btn btn-warning" v-on:click.prevent="editCrud(user.id)">Editar</a>
                    <a href="#" class="btn btn-danger" v-on:click.prevent="deleteCrud(user.id)">Eliminar</a>
                </td>
            </tr>
        </tbody>
    </table>
    @include('user.create')
    @include('user.edit')
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
            lists: [],
            errors: '',
            crud: '',
            getCrudList: [],
            user: {
                username: '',
                email: '',
                password: '',
                roles_id: '',
                prontoform_user: '',
                name: '',
                phone: '',
                address: '',
                city: '',
                state: '',
                zipcode: ''
            },
            passwordRep: '',
            roles: ''
        },
        methods: {
            getCrud: function(){
                axios.get('user/all').then(response => {
                    this.getCrudList = response.data;
                    axios.get('user/roles').then(response => {
                        this.roles = response.data;
                    });
                });
            },
            createCrud: function(){
                var req = {
                    user: this.user,
                    userdetail: this.userdetail
                }
                axios.post(this.crud, this.user).then(response => {
                    this.getCrud(this.crud);
                    $('#create').modal('hide');
                    //toastr.success('Creada con éxito');
                }).catch(error => {
                    this.errors = 'Corrija para poder crear con éxito';
                });
            },
            editCrud: function(idCrud){
                $('.modal').modal('hide');
                axios.get(this.crud + '/' + idCrud + '/edit').then( response => {
                    this.user = response.data;
                    $('#edit').modal('show');
                });
            },
            updateCrud: function(idCrud){
                var sendUp = '';
                switch(this.crud){
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
