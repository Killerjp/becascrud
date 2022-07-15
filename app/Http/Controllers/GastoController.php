<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

/**
 * Class GastoController
 * @package App\Http\Controllers
 */
class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $postulanteid = $request->id;
        $gastos = Gasto::select('id','id_postulant','nombre_dg','monto_dg','observ_dg','documento_dg')
                        ->where('id_postulant','LIKE',$postulanteid)                                                                
                        ->get();

        return view('gasto.index', compact('gastos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $postulanteid = $request->id;
        $gasto = new Gasto();
        return view('gasto.create', compact('gasto','postulanteid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('postulants.index')
            ->with('success3', 'Gasto creado .');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gasto = Gasto::find($id);

        return view('gasto.show', compact('gasto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gasto = Gasto::find($id);

        return view('gasto.edit', compact('gasto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Gasto $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {
        request()->validate(Gasto::$rules);

        $gasto->update($request->all());

        return redirect()->back()
            ->with('success3', 'Gasto actualizado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $gasto = Gasto::find($id)->delete();

        return redirect()->back()
            ->with('success3', 'Gasto eliminado');
    }
}
