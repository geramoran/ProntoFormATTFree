@extends('layout.base')

@section('title')
    <title>Prontoform At&t - Inventario</title>
@endsection

@section('content')
<main id="crud" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" crud="inventario">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h1">Inventario</h1>
        <a href="/inventario/create" class="btn btn-success pull-right">Agregar</a>
    </div>
    <table id="Inventario_table" class="table display">
        <thead>
            <tr>
                <th>Id Inventario</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="inventario in getCrudList">
                <td>@{{$inventario.id}}</td>
                <td>@{{$inventario.fecha}}</td>
                <td>
                    <a href="#" class="btn btn-primary">Detalles</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>
@endsection
