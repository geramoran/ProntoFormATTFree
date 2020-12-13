<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prontoform;
use App\Models\despacho;
use App\Models\product;
use App\Models\unitdelivery;
use App\Models\unit;
use App\Models\catalogStatus;

class ProntoFormController extends Controller
{
    public function webhook(Request $request){
        $id = $request->pages[0]['sections'][0]['answers'][0]['values'][0];
        $comment = $request->pages[0]['sections'][0]['answers'][19]['values'];
        $prontoform = new prontoform;
        $prontoform->REFERENCENUMBER = $request->referenceNumber;
        $prontoform->PRONTOFORM_USER = $request->user['username'];
        $prontoform->FOLIO = $request->pages[0]['sections'][0]['answers'][0]['values'][0];
        $prontoform->MONTOACOBRAR = $request->pages[0]['sections'][0]['answers'][1]['values'][0];
        $prontoform->FECHAYHORA = date('Y-m-d H:i:s', strtotime($request->pages[0]['sections'][0]['answers'][15]['values'][0]['shifted']));
        $entrego = $request->pages[0]['sections'][0]['answers'][2]['values'][0];
        $prontoform->SEENTREGO = $entrego;
        $prontoform->LOCALIZACIONGPS = json_encode($request->pages[0]['sections'][0]['answers'][16]['values'][0]['coordinates']);
        if(!empty($comment)){
            $prontoform->COMENTARIOS = $comment[0];
        }
        if($entrego == 'SI'){
            if(!empty($request->pages[0]['sections'][0]['answers'][3]['values'])){
                $prontoform->NOMBREDEQUIENRECIBE = $request->pages[0]['sections'][0]['answers'][3]['values'][0];
            }
        } else if($entrego == 'NO'){
            if(!empty($request->pages[0]['sections'][0]['answers'][17]['values'])){
                $prontoform->MOTIVODENORECIBIR = $request->pages[0]['sections'][0]['answers'][17]['values'][0];
            }
            if(!empty($request->pages[0]['sections'][0]['answers'][18]['values'])){
                $prontoform->HORAYFECHADEREAGENDA = $request->pages[0]['sections'][0]['answers'][18]['values'][0];
            }
        }
        $prontoform->save();
        //return $prontoform;
        //return $request->pages[0]['sections'][0]['answers'][16]['values'][0]['coordinates'];
        if($entrego == 'SI'){
            $unit = unit::where('barcode', $id)->first();
            $ud = unitdelivery::where('unit', $unit->id)->update(['visitStatus' => 6]);
            return $ud;
            //$cid = product::find($unit[0]->unit()->first()->idProduct)->client_id;
            //$cs = catalogStatus::where('client_id', $cid)->where('type', 'Despacho - Entregado')->first();
            //$csid = 0;
            //if(empty($cs)){
            //    $csid = catalogStatus::where('type', 'Despacho - Entregado')->where('client_id', null)->first()->id;
            //} else{
            //    $csid = $cs->id;
            //}
            // foreach($unit as $u){
            //     $ud = unitdelivery::find($u->id);
            //     $ud->visitStatus = 6;
            //     $ud->visitDate = date('Y-m-d H:i:s');
            //     $ud->save();
            // }
        } else{
            $unit = unit::where('barcode', $id)->get();
            $ud = unitdelivery::where('unit', $unit->id)->update(['visitStatus' => 7]);
            return true;
            //$cid = product::find($unit[0]->unit()->first()->idProduct)->client_id;
            //$cs = catalogStatus::where('client_id', $cid)->where('type', 'Despacho - Cancelado')->first();
            //$csid = 0;
            //if(empty($cs)){
            //    $csid = catalogStatus::where('type', 'Despacho - Cancelado')->where('client_id', null)->first()->id;
            //} else{
            //    $csid = $cs->id;
            //}
            // foreach($unit as $u){
            //     $ud = unitdelivery::find($u->id);
            //     $ud->visitStatus = 7;
            //     $ud->visitDate = date('Y-m-d H:i:s');
            //     $ud->save();
            // }
        }
    }
}
