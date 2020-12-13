<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\storage;
use App\Models\unit;
use App\Models\catalogStatus;
use App\Models\remesa;
use App\Models\product;

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
        // $unit = unit::where('remesa', $request->remesa)->get();
        // $cid = product::find($unit->first()->idProduct)->first()->id;
        // $cs = catalogStatus::where('type', 'Recoleccion - Almacen')->where('client_id', $cid)->get();
        // $csid = 0;
        // if(empty($cs)){
        //     $csid = catalogStatus::where('type', 'Recoleccion - Almacen')->where('client_id', null)->first()->id;
        // } else{
        //     $csid = $cs->first()->id;
        // }
        //unit::where('remesa', $request->remesa)->update(['idstatus' => $csid]);
        unit::where('remesa', $request->remesa)->update(['idstatus' => 2]);
        foreach($request->storage as $unidad){
            $storage = new storage;
            $storage->place = $unidad["place"];
            $storage->unit = $unidad["id"];
            $storage->save();
        }
        $rem = remesa::find($request->remesa);
        $client = $rem->client_id;

        //$rem->status_id = $csid;
        $rem->status_id = 2;
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
