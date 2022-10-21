<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Descuento;
use App\Models\Postulant;
use App\Models\Grupof;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;



class AdmingfController extends Controller
{
    public function store(Request $request)
    {
        $newGrupof = new Grupof();                 
        $newGrupof->id_postulant = $request->id_postulant; 
        $newGrupof->id_user = $request->id_user; 
        $newGrupof->periodo = $request->periodo; 
        $newGrupof->nombre_gf = $request->nombre_gf;
        $newGrupof->rut_gf = $request->rut_gf; 
        $newGrupof->edad_gf = $request->edad_gf; 
        $newGrupof->parentesco_gf = $request->parentesco_gf; 
        $newGrupof->profesion_gf = $request->profesion_gf;
        $newGrupof->ingresos_gf = $request->ingresos_gf;

        if( $request->hasfile('documento')){
            $file = $request->file('documento');
            $destinationPath = 'images/documentos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('documento')->move($destinationPath, $filename);
            $newGrupof->documento = $destinationPath . $filename;

        } 
        $newGrupof->save();       

        return redirect()->back()   
            ->with('success2', 'Integrante creado satisfactoriamente.');
    }
}
