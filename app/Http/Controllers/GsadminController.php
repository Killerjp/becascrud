<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;


class GsadminController extends Controller
{
    public function store(Request $request)
    {
        request()->validate(Gasto::$rules);       

        $newGasto = new Gasto();                 
        $newGasto->id_postulant = $request->id_postulant; 
        $newGasto->nombre_dg = $request->nombre_dg; 
        $newGasto->monto_dg = $request->monto_dg; 
        $newGasto->observ_dg = $request->observ_dg;  
        

        if( $request->hasfile('documento_dg')){
            $file = $request->file('documento_dg');
            $destinationPath = 'images/documentos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento_dg')->move($destinationPath, $filename);
            $newGasto->documento_dg = $destinationPath . $filename;

        } 
        $newGasto->save();       

        return redirect()->back()        
            ->with('success3', 'Gasto creado .');
            



        
    }
}
