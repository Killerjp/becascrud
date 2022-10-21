<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    static $rules = [
		'idpostulantr' => 'required',
		'idperiod' => 'required',
		'fecha_r' => 'required',
		'estado_r' => 'required',		
		'monto_r' => 'required',
		'comentario_r' => 'required',
		
    ];
}
