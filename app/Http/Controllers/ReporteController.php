<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\client;
use App\Models\catalogStatus;


class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function view()
    {
        return view('reportes.index');
    }

    public function all(){

    }

    public function status(){
        return catalogStatus::all();
    }
}
