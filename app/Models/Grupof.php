<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Grupof
 *
 * @property $id
 * @property $id_postulant
 * @property $id_user
 * @property $periodo
 * @property $nombre_gf
 * @property $rut_gf
 * @property $edad_gf
 * @property $parentesco_gf
 * @property $profesion_gf
 * @property $ingresos_gf
 * @property $documento
 * @property $created_at
 * @property $updated_at
 *
 * @property Postulant $postulant
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Grupof extends Model
{
    
    static $rules = [
		'id_postulant' => 'required',
    'id_user' => 'required',
    'periodo' => 'required',
		'nombre_gf' => 'required',
		'rut_gf' => 'required',
		'edad_gf' => 'required',
		'parentesco_gf' => 'required',
		'profesion_gf' => 'required',
		'ingresos_gf' => 'required',
		'documento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_postulant','id_user','periodo','nombre_gf','rut_gf','edad_gf','parentesco_gf','profesion_gf','ingresos_gf','documento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function postulant()
    {
        return $this->hasOne('App\Models\Postulant', 'id', 'id_postulant');
      
    }
    
    

}
