<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    static $rules = [
		'id_postulant' => 'required',
		'nombre_doc' => 'required',
		'documento_doc' => 'required',
		
    ];
}
