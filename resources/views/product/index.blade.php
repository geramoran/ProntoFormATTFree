@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Productos</title>
@endsection

@section('content')
<main id="crud" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="product">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Productos</h1>
        <div class="btn btn-sm btn-bd-light my-2 my-md-0">
            <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#create">Nuevo... </a>
        </div>
    </div>
    <table id="Product_table" class="table display">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in getCrudList">
                <td>@{{product.name}}</td>
                <td>@{{product.client.name}}</td>
                <td>
                    <a href="#" class="btn btn-primary" v-on:click.prevent="detailCrud(product.id)">Detalles</a>
                </td>
            </tr>
        </tbody>
    </table>
    @include('product.create')
    @include('product.detail')
    @include('product.edit')
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
                let cuentaErrores = 0;
                let mensaje = [];

                this.fd = new FormData(document.getElementById('createProduct'));
                //------Validación de formularios
                //nombre de producto max 90 char
                if(this.fd.get('name').length > 90 || this.fd.get('name').length ==0){
                        cuentaErrores ++;
                        mensaje.push('Nombre de producto');
                    }

                //Costo de entrega 10 char 2 decimales
                let costoEntregaNumber = Number(this.fd.get('costoEntrega'));
                if(this.fd.get('costoEntrega').length > 10 || this.fd.get('costoEntrega').length ==0){
                        cuentaErrores ++;
                        mensaje.push('Costo de entrega no contiene el número de caracteres permitido');
                    }else if(isNaN(costoEntregaNumber)){
                        mensaje.push('Costo de entrega no es un valor numérico');
                    }

                //Costo de devolución 10 char 2 decimales
                let costoDevolucionNumber = Number(this.fd.get('costoDevolucion'));
                if(this.fd.get('costoDevolucion').length > 10 || this.fd.get('costoDevolucion').length ==0){
                        cuentaErrores ++;
                        mensaje.push('Costo de devolución no contiene el número de caracteres permitido');
                    }else if(isNaN(costoDevolucionNumber)){
                        mensaje.push('Costo de devolución no es un valor numérico');
                    }

                //Peso en kg 7 char 4 decimales
                let PesoNumber = Number(this.fd.get('Peso'));
                if(this.fd.get('Peso').length > 7 || this.fd.get('Peso').length ==0){
                        cuentaErrores ++;
                        mensaje.push('Peso no contiene el número de caracteres permitido');
                    }else if(isNaN(PesoNumber)){
                        mensaje.push('Peso no es un valor numérico');
                    }

                //comisión de entrega 10 char 2 decimales
                let comisionEntregaNumber = Number(this.fd.get('comisionEntrega'));
                if(this.fd.get('comisionEntrega').length > 10 || this.fd.get('comisionEntrega').length ==0){
                        cuentaErrores ++;
                        mensaje.push('Comisión de entrega no contiene el número de caracteres permitido');
                    }else if(isNaN(comisionEntregaNumber)){
                        mensaje.push('Comisión de entrega no es un valor numérico');
                    }

                //Comisión de devolución 10 char 2 decimales
                let comisionDevolucionNumber = Number(this.fd.get('comisionDevolucion'));
                if(this.fd.get('comisionDevolucion').length > 10 || this.fd.get('comisionDevolucion').length ==0){
                        cuentaErrores ++;
                        mensaje.push('Comisión de devolución no contiene el número de caracteres permitido');
                    }else if(isNaN(comisionDevolucionNumber)){
                        mensaje.push('Comisión de devolución no es un valor numérico');
                    }

                //Tiempo de cierre INT
                let tiempoCierreInt = parseInt(this.fd.get('tiempoCierre'))
                    if(isNaN(tiempoCierreInt)){
                        mensaje.push('El tiempo de cierre debe ser un número entero.');
                    }

                //Nivel de servicio INT
                let nivelServicioInt = parseInt(this.fd.get('nivelServicio'))
                    if(isNaN(nivelServicioInt)){
                        mensaje.push('Nivel de servicio debe ser un número entero.');
                    }

                //Salida/mensaje error
                if(cuentaErrores == 0){
                        alert('Los datos ingresados son correctos');
                    } else{
                        var total = '\n';
                        mensaje.forEach( (input) =>{
                            total = total + '\n' + input;
                        });
                        alert('Errores: ' + total);
                    }

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
                            "nivelServicio": this.getCrudDetail.product.nivelServicio,
                            "tieneCobro": this.getCrudDetail.product.tieneCobro
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
                // axios.put(this.crud + '/' + idCrud, sendUp).then( response => {
                //     this.getCrud(this.crud);
                //     $('#edit').modal('hide');
                //     //toastr.success('Creada con éxito');
                //     this.fd = [];
                // });
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
