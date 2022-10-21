<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Descuento;
use App\Models\Postulant;
use App\Models\Grupof;
use App\Models\Gasto;
use App\Models\Result;
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
               
        
               
        $grupofs= Grupof::join('postulants', 'postulants.id', '=', 'grupofs.id_postulant')
        ->select('postulants.nombre_post', 'grupofs.id','grupofs.id_postulant','grupofs.id_user','grupofs.periodo','grupofs.nombre_gf','grupofs.rut_gf','grupofs.edad_gf','grupofs.parentesco_gf','grupofs.profesion_gf','grupofs.ingresos_gf','grupofs.documento')
        ->where('grupofs.id_postulant', 'LIKE',$postulanteid)
        ->where('grupofs.periodo', 'LIKE',$date2)
        ->get();
        
        $gastos = Gasto::join('postulants', 'postulants.id', '=', 'gastos.id_postulant')
                         ->join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                        ->select('postulants.id', 'postulants.periodo_id','postulants.users_id','gastos.id','gastos.id_postulant','gastos.nombre_dg','gastos.monto_dg','gastos.observ_dg','gastos.documento_dg','periodos.ano_pe')
                        ->where('periodos.ano_pe', '=', $date2)
                        ->where('gastos.id_postulant', '=', $postulanteid)
                        ->get();

         $result= Result::join('postulants', 'postulants.id', '=', 'results.idpostulantr')
                        ->join('periodos', 'periodos.id', '=', 'results.idperiod')
                        ->select('results.id','results.idpostulantr','results.idperiod','results.fecha_r','results.estado_r','results.monto_r','results.comentario_r','postulants.users_id','periodos.*','periodos.ano_pe')
                        ->where('periodos.ano_pe','LIKE',$date2)
                        ->where('results.idpostulantr','LIKE',$postulanteid)
                        ->get();   
                        
        $postulants= Postulant::join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                                ->select('postulants.id','postulants.rut_post','postulants.nombre_post','postulants.periodo_id','postulants.users_id','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','postulants.descuento_post','periodos.ano_pe','periodos.inicio_pe','periodos.termino_Pe','periodos.montoanual')
                                ->where('periodos.ano_pe','LIKE',$date2)
                                ->where('postulants.id','LIKE',$postulanteid)
                                ->get();
                                        
        
        return view('grupof.index', compact('grupofs','user_name','postulanteid','gastos','postulants','result'));
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
                      
        request()->validate(Grupof::$rules);        
        $grupof->update($request->all());
        
            return redirect()->back()            
            ->with('success3', 'Integrante actualizado satisfactoriamente');
        
        
        
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
