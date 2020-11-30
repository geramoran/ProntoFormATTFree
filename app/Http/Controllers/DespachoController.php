<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\unit;
use App\Models\delivery;
use App\Models\unitdelivery;
use App\Models\area;

class DespachoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('despacho.index');
    }

    public function user(){
        return user::all();
    }

    public function unit($id){
        return unit::where('barcode', $id)->first();
    }

    public function area(){
        return area::all();
    }

    public function all(){
        return delivery::with(['user', 'unitdeliveries'])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('despacho.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $despacho = new delivery;
        $despacho->user = $request->despacho['user'];
        $despacho->area = $request->despacho['area'];
        $despacho->deliveryDate = $request->despacho['deliveryDate'];
        $despacho->save();
        foreach($request->unidades as $unidad){
            $unidadDesp = new unitdelivery;
            $unidadDesp->unit = $unidad["id"];
            $unidadDesp->delivery = $despacho->id;
            $unidadDesp->visitStatus = 2;
            if($unidad["monto"] >= 0){
                $unidadDesp->isMount = "NO";
                $unidadDesp->mount = $unidad["monto"];
            } else{
                $unidadDesp->isMount = "YES";
            }
            $unidadDesp->count = $unidad["cantidad"];
            $unidadDesp->save();
        }
    }

    public function detail(){
        return view('despacho.detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
