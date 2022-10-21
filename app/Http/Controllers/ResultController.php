<?php

namespace App\Http\Controllers;
use App\Models\Result;
use App\Models\Gasto;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Descuento;
use App\Models\Postulant;
use App\Models\Grupof;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;



class ResultController extends Controller
{
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
                                 
        
        return view('result.index', compact('grupofs','user_name','postulanteid','gastos','postulants','result'));
    
    }

    

    public function store(Request $request)
    {
        
        $newResult = new Result();                 
        $newResult->idpostulantr = $request->idpostulantr; 
        $newResult->idperiod = $request->idperiod; 
        $newResult->fecha_r = $request->fecha_r; 
        $newResult->estado_r = $request->estado_r;  
        $newResult->monto_r = $request->monto_r; 
        $newResult->comentario_r = $request->comentario_r;       
        $newResult->save();  
        

        return redirect()->route('postulants.index')
            ->with('success', 'Postulante creado satisfactoriamente.');
    }



    public function update(Request $request, $id)    {
        
        
        
        $result= Result::find($id);       
        $result->idpostulantr = $request->idpostulantr; 
        $result->idperiod = $request->idperiod; 
        $result->fecha_r = $request->fecha_r; 
        $result->estado_r = $request->estado_r; 
        $result->monto_r = $request->monto_r; 
        $result->comentario_r = $request->comentario_r; 
        $result->save();
 
         return redirect()->back();

       
    }
}
