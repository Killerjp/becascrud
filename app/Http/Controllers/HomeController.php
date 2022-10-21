<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Postulant;
use App\Models\Periodo;
use App\Exports\PostulantBeca;
use App\Exports\PostulantPostu;
use App\Exports\PostulantReguis;
use App\Exports\PostulantAno;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');    
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = date('Y', time());
        $user_id = Auth::user()->id;
        $period=Periodo::pluck('ano_pe','id');

        $postulantsregis= Postulant::join('results', 'results.idpostulantr', '=', 'postulants.id')
                                    ->join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                                    ->select('postulants.id','postulants.rut_post','postulants.nombre_post','postulants.periodo_id','postulants.users_id','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','postulants.descuento_post','results.idpostulantr','results.idperiod','results.fecha_r','results.estado_r','results.monto_r','results.comentario_r','periodos.ano_pe')                                                                 
                                    ->get();

        $postulantsregis2= Postulant::join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                                    ->select('postulants.rut_post','postulants.nombre_post','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','periodos.ano_pe')
                                     ->where('periodos.ano_pe', '=', $date)
                                    ->get();
        $periodo= Periodo::all();
                                   
         $postulantspost= Postulant::join('results', 'results.idpostulantr', '=', 'postulants.id')
                                    ->join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                                    ->select('postulants.id','postulants.rut_post','postulants.nombre_post','postulants.periodo_id','postulants.users_id','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','postulants.descuento_post','results.idpostulantr','results.idperiod','results.fecha_r','results.estado_r','results.monto_r','results.comentario_r','periodos.ano_pe')                                        
                                    ->whereIn('results.estado_r', ['Postulando'])                                    
                                    ->get();

         $postulantsfin= Postulant::join('results', 'results.idpostulantr', '=', 'postulants.id')
                                    ->join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                                    ->select('postulants.id','postulants.rut_post','postulants.nombre_post','postulants.periodo_id','postulants.users_id','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','postulants.descuento_post','results.idpostulantr','results.idperiod','results.fecha_r','results.estado_r','results.monto_r','results.comentario_r','periodos.ano_pe')                                        
                                    ->whereIn('results.estado_r', ['Finalizado'])                                    
                                    ->get();

        $postulants= Postulant::join('results', 'results.idpostulantr', '=', 'postulants.id')
                                 ->join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                                ->select('postulants.id','postulants.rut_post','postulants.nombre_post','postulants.periodo_id','postulants.users_id','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','postulants.descuento_post','results.id','results.idpostulantr','results.idperiod','results.fecha_r','results.estado_r','results.monto_r','results.comentario_r','periodos.ano_pe','periodos.montoanual')
                                ->where('postulants.users_id','LIKE',$user_id)
                                ->where('periodos.ano_pe', '=', $date)                                                                     
                                ->get();

                            
        $users = User::all();
        return view('home', compact ('users','postulantsregis','postulantspost','postulantsregis2','postulantsfin','postulants','periodo'));
    }


    public function expopostulantr()
    {
        
        return Excel::download(new PostulantReguis, 'postulantesreguistrados.xlsx');
    }

    public function expopostulantb()
    {
        
        return Excel::download(new PostulantBeca, 'postulantesbacados.xlsx');
    }

    public function expopostulantp()
    {
        
        return Excel::download(new PostulantPostu, 'postulantesPostulando.xlsx');
    }

  
        
     public function expopostulanta(Request $request)
            {   
                
                $anope = $request->anope;
                
                $excel = Excel::download(
                new PostulantAno($anope), // aquí inyectas el valor
                'expopostulanta.xls'
                         );

                    return $excel;
                    }    
        
    
}
