@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Detalle de recibo</title>
@endsection

@section('content')
<main id="crud" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="remesa">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Detalle de recibo</h1>
        <div class="btn btn-sm btn-bd-light my-2 my-md-0">
            <a href="#" class="btn btn-success pull-right" data-toggle="modal" data-target="#create">Confirmar recibo</a>
        </div>
    </div>
    <form action="/recibo" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="client_id">Usuarios</label>
                <input type="text" class="form-control" name="client_id" id="client_id" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="city">Fecha de salida</label>
                <input type="text" class="form-control" name="city" id="city" readonly value=@php echo date('d/n/Y'); @endphp>
            </div>
            <div class="form-group col-md-4">
                <label for="status">Estatus</label>
                <input type="text" class="form-control" name="status" id="status" readonly>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="place">Total de unidades</label>
                <input type="text" class="form-control" name="place" id="place" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="place">Monto total</label>
                <input type="text" class="form-control" name="place" id="place" readonly>
            </div>
        </div>
        <br>
        <div>
            <h3>Unidades</h3>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Numero de unidad" name="unit_id">
                <div class="input-group-append">
                    <button class="btn btn-outline-success" type="button" id="button-addon2" v-on:click.prevent="addItem(unit)">Agregar</button>
                </div>
            </div>
            <table id="" class="table display">
                <thead>
                    <tr>
                        <th>ID Unidad</th>
                        <th>Monto</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>00284894987</td>
                        <td>200</td>
                    </tr>
                    <tr>
                        <td>00284852247</td>
                        <td>300</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
@endsection


@section('js')
<script>

</script>
@endsection
