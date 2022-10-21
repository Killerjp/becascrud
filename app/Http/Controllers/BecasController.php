<?php

namespace App\Http\Controllers;
use App\Models\Curso;
use App\Models\Grupof;
use App\Models\Postulant;
use App\Models\Periodo;
use App\Models\Descuento;
use App\Models\Document;
use App\Models\User;
use App\Models\Result;
use App\Models\Gasto;
use Illuminate\Http\Request;
use Auth;


class BecasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $postulanteid = $request->id;
        
        $date = date('Y', time());
        $user_id = Auth::user()->id;
        $gastos2 = Gasto::paginate();
        $gastos = Gasto::join('postulants', 'postulants.id', '=', 'gastos.id_postulant')
        ->select('postulants.id', 'postulants.periodo_id','postulants.users_id','gastos.id','gastos.id_postulant','gastos.nombre_dg','gastos.monto_dg','gastos.observ_dg','gastos.documento_dg')
        ->where('gastos.id_postulant','LIKE',$postulanteid) 
        ->get();
               
        

        $grupofs= Grupof::select('id','id_postulant','id_user','periodo','nombre_gf','rut_gf','edad_gf','parentesco_gf','profesion_gf','ingresos_gf','documento')
                                        
                                        ->where('id_postulant','LIKE',$postulanteid)                                                                                                             
                                        ->get();

        $documentos= Document::join('postulants', 'postulants.id', '=', 'documents.id_postulant')
                                        ->select('postulants.id', 'postulants.periodo_id','postulants.users_id','documents.id','documents.id_postulant','documents.nombre_doc','documents.nombre_doc','documents.documento_doc')
                                        ->where('postulants.id', '=', $postulanteid)
                                       
                                                    ->get();                                
                                                    
        $postulants= Postulant::join('results', 'results.idpostulantr', '=', 'postulants.id')
                                 ->join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                                ->select('postulants.id','postulants.rut_post','postulants.nombre_post','postulants.periodo_id','postulants.users_id','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','postulants.descuento_post','results.id','results.idpostulantr','results.idperiod','results.fecha_r','results.estado_r','results.monto_r','results.comentario_r','periodos.ano_pe','periodos.montoanual')
                                ->where('postulants.id','LIKE',$postulanteid)                                        
                                        ->get(); 
                                        

        $postulantsadmin= Postulant::select('id','rut_post','nombre_post','periodo_id','users_id','curso_post','apod_post','correoapo_post','descuento_post')
                                        ->where('id','LIKE',$postulanteid)
                                        ->get();
                                        
                                        
        
        $periodo = Periodo::all();
        $user = User::all();       
        return view('postulant.show', compact('postulants','periodo','user','grupofs','gastos','postulantsadmin','documentos'));
    }
}
