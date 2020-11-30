<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\storage;
use App\Models\unit;
use App\Models\catalogStatus;
use App\Models\remesa;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventario.index');
    }

    public function all()
    {
        $cs = catalogStatus::where('type', 'Recoleccion - Remesa')->get();
        return remesa::with(['catalogStatus', 'clients'])->whereIn('status_id', $cs)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->storage as $unidad){
            $storage = new storage;
            $storage->place = $unidad["place"];
            $storage->unit = $unidad["id"];
            $storage->save();
        }
        $rem = remesa::find($request->remesa);
        $client = $rem->client_id;
        $stat = catalogStatus::where('client_id', $client)->where('type', 'Recoleccion - Almacen')->first();
        if($stat == null){
            $stat = 2;
        }
        $rem->status_id = $stat;
        $rem->save();
        return $rem->status_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('inventario.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rem = remesa::with(['catalogStatus', 'clients'])->find($id);
        $units = remesa::find($id)->units;
        return [
            'remesa' => $rem,
            'unidades' => $units
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
