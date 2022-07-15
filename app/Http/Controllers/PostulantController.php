<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\Grupof;
use App\Models\Postulant;
use App\Models\Periodo;
use App\Models\Descuento;
use App\Models\User;
use App\Models\Gasto;
use Illuminate\Http\Request;
use Auth;

/**
 * Class PostulantController
 * @package App\Http\Controllers
 */
class PostulantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $date = date('Y', time());
        $user_id = Auth::user()->id;
        $gastos2 = Gasto::paginate();
        $gastos = Gasto::join('postulants', 'postulants.id', '=', 'gastos.id_postulant')
        ->select('postulants.id', 'postulants.periodo_id','postulants.users_id','gastos.id','gastos.id_postulant','gastos.nombre_dg','gastos.monto_dg','gastos.observ_dg','gastos.documento_dg')
        ->where('postulants.periodo_id', '=', $date)
        ->where('postulants.users_id', '=', $user_id)
        ->get();
               
        

        $grupofs= Grupof::select('id','id_postulant','id_user','periodo','nombre_gf','rut_gf','edad_gf','parentesco_gf','profesion_gf','ingresos_gf','documento')
                                        ->where('id_user','LIKE',$user_id)
                                        ->where('periodo','LIKE',$date)                                                                                                             
                                        ->get();
                                                    
        $postulants= Postulant::select('id','rut_post','nombre_post','periodo_id','users_id','curso_post','apod_post','correoapo_post','descuento_post')
                                        ->where('periodo_id','LIKE',$date)
                                        ->where('users_id','LIKE',$user_id)
                                        ->get(); 

        $postulantsadmin= Postulant::select('id','rut_post','nombre_post','periodo_id','users_id','curso_post','apod_post','correoapo_post','descuento_post')
                                        
                                        ->get();                                
        
        $periodo = Periodo::all();
        $user = User::all();       
        return view('postulant.index', compact('postulants','periodo','user','grupofs','gastos','postulantsadmin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $user_id = Auth::user()->id;              
        $postulant = new Postulant();
        $period=Periodo::pluck('ano_pe','ano_pe');
        $cursos = Curso::pluck('nombre_c','nombre_c');
        $descuentos = Descuento::pluck('nombre_d','nombre_d');
        return view('postulant.create', compact('postulant','period','cursos','descuentos','user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Postulant::$rules);

        $postulant = Postulant::create($request->all());

        return redirect()->route('postulants.index')
            ->with('success', 'Postulante creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postulant = Postulant::find($id);

        return view('postulant.show', compact('postulant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
              
        $postulant = Postulant::find($id);       
        $period=Periodo::pluck('ano_pe','id'); 
        $cursos = Curso::pluck('nombre_c','nombre_c');
        $descuentos = Descuento::pluck('nombre_d','nombre_d');
        return view('postulant.edit', compact('postulant','period','cursos','descuentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Postulant $postulant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postulant $postulant)
    {
        request()->validate(Postulant::$rules);

        $postulant->update($request->all());

        return redirect()->route('postulants.index')
            ->with('success', 'Postulante actualizado satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $postulant = Postulant::find($id)->delete();

        return redirect()->route('postulants.index')
            ->with('success', 'Postulante eliminado satisfactoriamente');
    }
}
