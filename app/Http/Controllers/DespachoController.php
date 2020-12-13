<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\product;
use App\Models\unit;
use App\Models\delivery;
use App\Models\unitdelivery;
use App\Models\area;
use App\Models\catalogStatus;

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
        $status = catalogStatus::whereNotIn('type', ["Despacho - Liberado", "Despacho - Creado"])->get();
        $data = delivery::join('unitdeliverys', 'deliverys.id', '=', 'unitdeliverys.delivery')->distinct('user')->whereNotIn('unitdeliverys.visitStatus', $status)->get('user');
        return user::whereNotIn('id', $data)->get();
    }

    public function unit($id){
        $unit = unit::where('barcode', $id)->first();
        return $unit;
        // if(empty($resp)){
        //     return $unit;
        // } else{
        //     return 'Ocupado';
        // }
    }

    public function area(){
        return area::all();
    }

    public function all(){
        return delivery::with(['user', 'unitdeliveries'])->get();
    }

    public function status($id){
        return catalogStatus::find($id)->name;
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
        // $cid = product::find($unit->unit()->first()->idProduct)->client_id;
        // $cs = catalogStatus::where('client_id', $cid)->where('type', 'Despacho - Creado')->first();
        $despacho = new delivery;
        $despacho->user = $request->despacho['user'];
        $despacho->areas_id = $request->despacho['area'];
        $despacho->deliveryDate = $request->despacho['deliveryDate'];
        $despacho->save();
        foreach($request->unidades as $unidad){
            // $pid = unit::find($unidad["id"])->first()->idProduct;
            // $cid = product::find($pid)->client_id;
            // $cs = catalogStatus::where('client_id', $cid)->where('type', 'Despacho - Creado')->first();
            // $csid = 0;
            // if(empty($cs)){
            //     $csid = statuscatalogStatus::where('type', 'Despacho - Creado')->where('client_id', null)->first()->id;
            // } else{
            //     $csid->id;
            // }
            $unidadDesp = new unitdelivery;
            $unidadDesp->unit = $unidad["id"];
            $unidadDesp->delivery = $despacho->id;
            //$unidadDesp->visitStatus = $csid;
            $unidadDesp->visitStatus = 4;
            if($unidad["monto"] >= 0){
                $unidadDesp->isMount = 0;
                $unidadDesp->mount = $unidad["monto"];
            } else{
                $unidadDesp->isMount = 1;
            }
            $unidadDesp->count = $unidad["cantidad"];
            $unidadDesp->save();
            $unit = unit::find($unidad["id"]).update(['idstatus' => 3]);
        }
    }

    public function detail($id)
    {
        $desp = delivery::with(['user', 'area', 'unitdeliveries'])->find($id);
        $unit = unitdelivery::with('unit')->where('delivery', $id)->get();
        $area = area::all();
        $data = delivery::distinct('user')->get('user');
        $user = user::whereNotIn('id', $data)->orWhere('id', $desp->user)->get();
        return [
            'despacho' => $desp,
            'areas' => $area,
            'users' => $user,
            'units' => $unit
        ];
    }

    public function free($id){
        $unit = unitdelivery::with('unit')->where('delivery', $id)->get();
        // $cid = product::find($unit[0]->unit()->first()->idProduct)->client_id;
        // $cs = catalogStatus::where('client_id', $cid)->where('type', 'Despacho - Liberado')->first();
        // $csid = 0;
        // if(empty($cs)){
        //     $csid = catalogStatus::where('type', 'Despacho - Liberado')->where('client_id', null)->first()->id;
        // } else{
        //     echo 'no entra';
        //     $csid = $cs->id;
        // }
        foreach($unit as $u){
            $ud = unitdelivery::find($u->id);
            $ud->visitStatus = 5;
            $ud->visitDate = date('Y-m-d H:i:s');
            $ud->save();
        }
        return redirect('/despacho');
        //return var_dump(json_encode($unit[0]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('despacho.detail');
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
