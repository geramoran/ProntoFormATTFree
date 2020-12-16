@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Cliente</title>
@endsection

@section('content')
<main id="crud" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="client">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Cliente</h1>
        <div class="btn btn-sm btn-bd-light my-2 my-md-0">
            <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#create">Nuevo... </a>
        </div>
    </div>
    <table id="Client_table" class="table display">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Representante</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="client in getCrudList">
                <td>@{{client.name}}</td>
                <td>@{{client.agent}}</td>
                <td>@{{client.address}}</td>
                <td>@{{client.phone}}</td>
                <td>
                    <a href="#" class="btn btn-primary" v-on:click.prevent="detailCrud(client.id)">Detalles</a>
                </td>
            </tr>
        </tbody>
    </table>
    @include('client.create')
    @include('client.detail')
    @include('client.edit')
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

                //Función para validar un RFC
                // https://jsfiddle.net/z8thbqh7/31/
                rfcValido: function(rfc) {
                    var re = /^([ A-ZÑ&]?[A-ZÑ&]{3}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/,
                        validado = rfc.match(re);
                    
                    if (!validado)  //Coincide con el formato general?
                        return false;
                    
                    //Separar el dígito verificador del resto del RFC
                    var digitoVerificador = validado.pop(),
                        rfcSinDigito = validado.slice(1).join('')
                        
                    //Obtener el digito esperado
                    var diccionario  = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ",
                        lngSuma      = 0.0,
                        digitoEsperado;

                    if (rfcSinDigito.length == 11) rfc = " " + rfc; //Ajustar a 12
                    for(var i=0; i<13; i++)
                        lngSuma = lngSuma + diccionario.indexOf(rfcSinDigito.charAt(i)) * (13 - i);
                    digitoEsperado = 11 - lngSuma % 11;
                    if (digitoEsperado == 11) digitoEsperado = 0;
                    if (digitoEsperado == 10) digitoEsperado = "A";
                
                    //El dígito verificador coincide con el esperado?
                    return digitoVerificador == digitoEsperado;
                },
                createCrud: function(){
                    let cuentaErrores = 0;
                    let mensaje = [];

                    this.fd = new FormData(document.getElementById('createClient'));
                    
                    
                    //------Validate form
                    // Name should be 80 char max and not be empty
                    if (this.fd.get('name').length > 80 || this.fd.get('name').length == 0){
                        cuentaErrores ++;
                        mensaje.push('Nombre de la compañía');
                    }

                    //RFC Mexican unique format
                    if(!this.rfcValido(this.fd.get('rfc').toUpperCase())){
                        cuentaErrores ++;
                        mensaje.push('RFC');
                    }

                    //Nombre del representante 80 char
                    if(this.fd.get('agent').length > 80 || this.fd.get('agent').length ==0){
                        cuentaErrores ++;
                        mensaje.push('Nombre del Representante');
                    }

                    //dirección 255
                    if(this.fd.get('address').length > 255 || this.fd.get('address').length ==0){
                        cuentaErrores ++;
                        mensaje.push('Dirección');
                    }

                    //Zip code 5 numeros
                    let zipCodeInt = parseInt(this.fd.get('zipcode'))
                    if(this.fd.get('zipcode').length > 5 || this.fd.get('zipcode').length ==0){
                        cuentaErrores ++;
                        mensaje.push('ZIP se paso o vacío');
                    }else if(isNaN(zipCodeInt)){
                        mensaje.push('zip no es entero. peleishon.');
                    }

                    //City max 90 char
                    if(this.fd.get('city').length > 90 || this.fd.get('city').length ==0){
                        cuentaErrores ++;
                        mensaje.push('ciudad');
                    }
                    
                    //Estado 5o char
                    if(this.fd.get('state').length > 50 || this.fd.get('state').length ==0){
                        cuentaErrores ++;
                        mensaje.push('Estado');
                    }

                    //tel numeros enteros. 5 vhar
                    let phoneInt = parseInt(this.fd.get('phone'))
                    if(isNaN(phoneInt)){
                        mensaje.push('teléfono no es entero. peleishon.');
                    }

                    //email... 
                    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if ( !expr.test(this.fd.get('email')) ){
                        cuentaErrores ++;
                        mensaje.push('email');
                    }

                    //mensaje de error
                    if(cuentaErrores == 0){
                        alert('JALA... supuestamente');
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
