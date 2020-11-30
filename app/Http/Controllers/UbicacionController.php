<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\relplace;
use App\Models\warehouse;
use App\Models\level;
use App\Models\locate;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('place.index');
    }

    public function all()
    {
        return [
            'relplace' => relplace::with(['warehouse', 'locate', 'level'])->get(),
            'warehouse' => warehouse::all(),
            'locate' => locate::all(),
            'level' => level::all()
        ];
    }

    public function warehouseAll()
    {
        return warehouse::all();
    }

    public function locateAll()
    {
        return locate::all();
    }

    public function levelAll()
    {
        return level::all();
    }

    public function warehouseCreate(Request $request)
    {
        return warehouse::create($request->except('_token'));
    }

    public function locateCreate(Request $request)
    {
        return locate::create($request->except('_token'));
    }

    public function levelCreate(Request $request)
    {
        return level::create($request->except('_token'));
    }

    public function warehouseDelete($id)
    {
        return warehouse::find($id)->delete();
    }

    public function locateDelete($id)
    {
        return locate::find($id)->delete();
    }

    public function levelDelete($id)
    {
        return level::find($id)->delete();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return relplace::create($request->except('_token'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return [
            'relplace' => relplace::with(['warehouse', 'locate', 'level'])->find($id),
            'warehouse' => warehouse::all(),
            'locate' => locate::all(),
            'level' => level::all()
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
        //var_dump($request->all());
        return relplace::find($id)->update($request->except('_token'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return relplace::find($id)->delete();
    }
}
