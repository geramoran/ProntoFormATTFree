<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\delivery;
use App\Models\unitdelivery;
use App\Models\area;
use App\Models\user;
use App\Models\prontoform;

class ReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recibo.index');
    }

    public function all(){
        return delivery::with(['user', 'unitdeliveries'])->get();
    }

    public function detail($id)
    {
        $desp = delivery::with(['user', 'area', 'unitdeliveries'])->find($id);
        $unit = unitdelivery::with('unit')->where('delivery', $id)->get();
        $data = delivery::distinct('user')->get('user');
        $prontoform = [];
        foreach($unit as $u){
            $p = prontoform::where('FOLIO', $u->unit()->first()->barcode)->first();
            array_push($prontoform, $p);
        }
        return [
            'despacho' => $desp,
            'units' => $unit,
            'prontoform' => $prontoform
        ];
    }

    public function prontoform($id)
    {
        return prontoform::where('FOLIO', $id)->first();
    }

    public function pdf($id){
        $file = public_path()."/docs/".$id.".pdf";
        $headers = array('Content-Type: application/pdf',);
        return response()->download($file, $id.".pdf", $headers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recibo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('recibo.detalle');
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
