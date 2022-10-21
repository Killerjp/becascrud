<?php

namespace App\Exports;

use App\Models\Postulant;
use Illuminate\Support\Facades\DB;
use App\Models\Periodo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\shouldAutoSize;

class PostulantBeca implements FromCollection, shouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $date = date('Y', time());
        return Postulant::join('results', 'results.idpostulantr', '=', 'postulants.id')
        ->join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
        ->select('postulants.rut_post','postulants.nombre_post','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','periodos.ano_pe','results.estado_r','periodos.montoanual','results.monto_r')        
        ->where('periodos.ano_pe', '=', $date)
        ->whereIn('results.estado_r', ['Finalizado'])                                           
            ->get();      
            
    }

    public function headings() :array
    {
                return ["Rut postulante","Nombre postulante","Curso a que postula","Nombre del apoderado","Correo de apoderado","Año al que postula","Estado","Monto anual","Monto de beca %"];
                
    }
}
