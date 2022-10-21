<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\Postulant;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Periodo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\shouldAutoSize;
use Maatwebsite\Excel\Concerns\FromQuery;

class PostulantAno implements FromQuery, shouldAutoSize, WithHeadings
{
   use Exportable;

   public function __construct(int $anope)
   {
       $this->ano_pe = $anope;
       
   }

   public function query()
   {
       

    return Postulant::join('results', 'results.idpostulantr', '=', 'postulants.id')
                     ->join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                     ->select('postulants.rut_post','postulants.nombre_post','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','periodos.ano_pe','results.estado_r','periodos.montoanual','results.monto_r')        
                     ->whereIn('results.estado_r', ['Postulando', 'Finalizado',''])    
                     ->whereAno_pe($this->ano_pe);
                                                            
                        
   }

   public function headings() :array
    {
                return ["Rut postulante","Nombre postulante","Curso a que postula","Nombre del apoderado","Correo de apoderado","Año al que postula","Estado","Monto anual","Monto de beca %"];
                
    }
}

