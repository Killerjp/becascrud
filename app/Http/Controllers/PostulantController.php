<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\Grupof;
use App\Models\Postulant;
use App\Models\Periodo;
use App\Models\Descuento;
use App\Models\User;
use App\Models\Document;
use App\Models\Result;
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

    public function index(Request $request)
    {
        
        $date = date('Y', time());
        $date2= date('Y-m-d',time());
        $date3= date('Ymd',time());
        $buscarpor=$request->get('buscarpor');
        $buscarpor2=$request->get('buscarpor2');
        $anope=$request->get('anope');
        
        $user_id = Auth::user()->id;        
        $gastos2 = Gasto::paginate();
        $period=Periodo::pluck('ano_pe','id');

        $gastos = Gasto::join('postulants', 'postulants.id', '=', 'gastos.id_postulant')
                         ->join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                        ->select('postulants.id', 'postulants.periodo_id','postulants.users_id','gastos.id','gastos.id_postulant','gastos.nombre_dg','gastos.monto_dg','gastos.observ_dg','gastos.documento_dg','periodos.ano_pe')
                        ->where('periodos.ano_pe', '=', $date)
                        ->where('postulants.users_id', '=', $user_id)
                        ->get();
               
        $grupofs= Grupof::select('id','id_postulant','id_user','periodo','nombre_gf','rut_gf','edad_gf','parentesco_gf','profesion_gf','ingresos_gf','documento')
                        ->where('id_user','LIKE',$user_id)
                        ->where('periodo','LIKE',$date)                                                                                                             
                        ->get();       

                        
                                                    
        $postulants= Postulant::join('periodos', 'periodos.id', '=', 'postulants.periodo_id')                                
                                ->select('postulants.id','postulants.rut_post','postulants.nombre_post','postulants.periodo_id','postulants.users_id','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','postulants.descuento_post','periodos.ano_pe','periodos.inicio_pe','periodos.termino_Pe','periodos.montoanual')
                                ->where('periodos.ano_pe','LIKE',$date)
                                ->where('users_id','LIKE',$user_id)
                                ->get();
        
        $documentos= Document::join('postulants', 'postulants.id', '=', 'documents.id_postulant')
                            ->join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                            ->select('postulants.id', 'postulants.periodo_id','postulants.users_id','documents.id','documents.id_postulant','documents.nombre_doc','documents.nombre_doc','documents.documento_doc','periodos.ano_pe')
                            ->where('periodos.ano_pe', '=', $date)
                            ->where('postulants.users_id', '=', $user_id)
                            ->get();

        $postulantsadmin= Postulant::join('results', 'results.idpostulantr', '=', 'postulants.id')
                                    ->join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                                    ->join('users', 'users.id', '=', 'postulants.users_id')
                                    ->select('users.name','postulants.id','postulants.rut_post','postulants.nombre_post','postulants.periodo_id','postulants.users_id','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','postulants.descuento_post','results.idpostulantr','results.idperiod','results.fecha_r','results.estado_r','results.monto_r','results.comentario_r','periodos.ano_pe')                                       
                                    ->where('postulants.nombre_post', 'like','%'.$buscarpor.'%') 
                                    ->where('postulants.rut_post', 'like','%'.$buscarpor2.'%') 
                                    ->where('periodos.ano_pe', '=', $anope)                                 
                                    ->whereIn('results.estado_r', ['Postulando', 'Finalizado'])
                                    ->get();

          $postulantsadmin2= Postulant::join('periodos', 'periodos.id', '=', 'postulants.periodo_id')  
                                    ->select('postulants.id','postulants.rut_post','postulants.nombre_post','postulants.periodo_id','postulants.users_id','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','postulants.descuento_post','periodos.ano_pe')                                       
                                    ->where('postulants.nombre_post', 'like','%'.$buscarpor.'%') 
                                    ->where('postulants.rut_post', 'like','%'.$buscarpor2.'%') 
                                    ->where('periodos.ano_pe', '=', $anope)                                
                                    
                                    ->get();

        $result= Result::join('postulants', 'postulants.id', '=', 'results.idpostulantr')
                                 ->join('periodos', 'periodos.id', '=', 'results.idperiod')
                                 ->select('results.id','results.idpostulantr','results.idperiod','results.fecha_r','results.estado_r','results.monto_r','results.comentario_r','postulants.users_id','periodos.*','periodos.ano_pe')
                                 ->where('periodos.ano_pe','LIKE',$date)
                                 ->where('postulants.users_id','LIKE',$user_id)
                                 ->get();

        $postulantf= Postulant::join('results', 'results.idpostulantr', '=', 'postulants.id')
                                 ->join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                                ->select('postulants.id','postulants.rut_post','postulants.nombre_post','postulants.periodo_id','postulants.users_id','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','postulants.descuento_post','results.id','results.idpostulantr','results.idperiod','results.fecha_r','results.estado_r','results.monto_r','results.comentario_r','periodos.ano_pe','periodos.montoanual')
                                ->where('postulants.users_id','LIKE',$user_id)
                                ->where('periodos.ano_pe', '=', $date)                                                                     
                                ->get();                        

                                 
                                 
                                        
        
        
        $periodo = Periodo::all();
        $user = User::all();       
        return view('postulant.index', compact('postulants','periodo','user','grupofs','gastos','postulantsadmin','postulantsadmin2','documentos','date2','period','result','date3','buscarpor','buscarpor2','anope','postulantf'));
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
        $period=Periodo::pluck('ano_pe','id');
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
