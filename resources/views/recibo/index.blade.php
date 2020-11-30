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
            <tr>
                <td>0002948945</td>
                <td>jorge.alejandro</td>
                <td>12/03/2020</td>
                <td>200</td>
                <td>14000</td>
                <td>
                    <a href="/recibo/show" class="btn btn-primary">Detalle</a>
                </td>
            </tr>
        </tbody>
    </table>
</main>
@endsection
