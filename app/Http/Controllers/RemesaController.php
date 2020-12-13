<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\remesa;
use App\Models\unit;
use App\Models\client;
use App\Models\product;
use App\Models\catalogStatus;
use Illuminate\Support\Facades\Date;

class RemesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recoleccion.index');
    }

    public function all()
    {
        return remesa::with('catalogStatus')->get();
    }

    public function status($id){
        return catalogStatus::where('client_id', $id)->where('type', 'Recoleccion - Remesa')->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recoleccion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $remesaAll = remesa::whereYear('dateArrive', date('Y'))->whereMonth('dateArrive', date('m'))->get();
        $cs = catalogStatus::where('client_id', $request->remesa['client_id'])->where('type', 'Recoleccion - Remesa')->first();
        $csid = 0;
        if(empty($cs)){
            $csid = catalogStatus::where('type', 'Recoleccion - Remesa')->where('client_id', null)->first()->id;
        } else{
            $csid->id;
        }
        $count = $remesaAll->count();
        $remesaId = $request->remesa['remesaFormat'] . $count;
        $remesaDB = new remesa;
        $remesaDB->remesa = $remesaId;
        $remesaDB->status_id = $request->remesa['status'];
        $remesaDB->dateArrive = $request->remesa['dateArrive'];
        $remesaDB->dateClose = $request->remesa['dateClose'];
        $remesaDB->client_id = $request->remesa['client_id'];
        $remesaDB->mountTot = $request->remesa['mountTot'];
        $remesaDB->unitCount = count($request->unidades);
        $remesaDB->save();
        foreach ($request->unidades as $unidad){
            $unitDB = new unit;
            $unitDB->idstatus = $csid;
            $unitDB->remesa = $remesaId;
            $unitDB->barcode = $unidad["id"];
            $unitDB->idproduct = $request->remesa["product_id"];
            $unitDB->mount = $unidad["mount"];
            $unitDB->save();
        }
        return $remesaId;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('recoleccion.detail');
    }

    public function detail($id){
        $rem = remesa::with(['catalogStatus', 'clients'])->find($id);
        $units = unit::with('product')->where('remesa', $id)->get();
        return [
            'remesa' => $rem,
            'unidades' => $units
        ];
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
        $cs = catalogStatus::where('client_id', $request->remesa['client_id'])->where('type', 'Recoleccion - Remesa')->first();
        $csid = 0;
        if(empty($cs)){
            $csid = catalogStatus::where('type', 'Recoleccion - Remesa')->where('client_id', null)->first()->id;
        } else{
            $csid->id;
        }
        unit::where('remesa', $id)->delete();
        $remesaDB = remesa::find($id);
        $remesaDB->status_id = $request->remesa['status_id'];
        $remesaDB->dateArrive = $request->remesa['dateArrive'];
        $remesaDB->dateClose = $request->remesa['dateClose'];
        $remesaDB->client_id = $request->remesa['client_id'];
        $remesaDB->mountTot = $request->remesa['mountTot'];
        $remesaDB->unitCount = count($request->unidades);
        $remesaDB->save();
        foreach($request->unidades as $unidad){
            $unitDB = new unit;
            $unitDB->idstatus = $csid;
            $unitDB->remesa = $id;
            $unitDB->barcode = $unidad["barcode"];
            $unitDB->idproduct = $request->remesa["product_id"];
            $unitDB->mount = $unidad["mount"];
            $unitDB->save();
        }
        return view('recoleccion.index');
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
