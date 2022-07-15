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

/**
 * Class GrupofController
 * @package App\Http\Controllers
 */
class GrupofController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date2 = date('Y', time());
        $postulanteid = $request->id;
        $user_name = Auth::user()->name;        
        
               
        $grupofs= Grupof::select('id','id_postulant','id_user','periodo','nombre_gf','rut_gf','edad_gf','parentesco_gf','profesion_gf','ingresos_gf','documento')
                                        ->where('id_postulant','LIKE',$postulanteid)
                                        ->where('periodo','LIKE',$date2)                                        
                                        ->get(); 
                                  
                                        
        
        return view('grupof.index', compact('grupofs','user_name','postulanteid'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $date = date('Y', time());
        $user_id = Auth::user()->id;
        $postulanteid = $request->id;                        
        $grupof = new Grupof();
        dd($postulanteid);
        
        return view('grupof.create', compact('grupof','postulanteid','user_id','date'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('postulants.index')
            ->with('success2', 'Integrante creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $grupof = Grupof::find($id);

        return view('grupof.show', compact('grupof'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request )
    {
        
        
        $id = $request->id;          
                 
        $grupof = Grupof::find($id);
        $user_id = Grupof::pluck('id_user','id_user')->toArray();
        $date = Grupof::pluck('periodo','periodo');
        $postulanteid = Grupof::pluck('id_postulant','id_postulant');
        return view('grupof.edit', compact('grupof','postulanteid', 'user_id','date'));
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Grupof $grupof
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupof $grupof)
    {
        $rol = Auth::user()->rol;        
        request()->validate(Grupof::$rules);
        $admin = 1;
        $grupof->update($request->all());
        if( $rol = $admin ){
            return redirect()->back()            
            ->with('success3', 'Integrante actualizado satisfactoriamente');
        }
        else
        {
        return redirect()->route('postulants.index')
            ->with('success2', 'Integrante actualizado satisfactoriamente');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rol = Auth::user()->rol; 
        $grupof = Grupof::find($id)->delete();
        if( $rol = 1){
            return redirect()->back()
            ->with('success3', 'Integrante eliminado satisfactoriamente');

        }else{
        return redirect()->route('postulants.index')
            ->with('success2', 'Integrante eliminado satisfactoriamente');
        }
    }
}
