<?php

namespace App\Exports;

use App\Models\Postulant;
use App\Models\Periodo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\shouldAutoSize;

class PostulantReguis implements FromCollection, shouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $date = date('Y', time());
        return Postulant::join('periodos', 'periodos.id', '=', 'postulants.periodo_id')
                        ->select('postulants.rut_post','postulants.nombre_post','postulants.curso_post','postulants.apod_post','postulants.correoapo_post','periodos.ano_pe')
                        ->where('periodos.ano_pe', '=', $date)
                        ->get();    
    }

    public function headings() :array
    {
                return ["Rut postulante","Nombre postulante","Curso a que postula","Nombre del apoderado","Correo de apoderado","Año al que postula"];
                
    }
}
