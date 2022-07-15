<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gasto
 *
 * @property $id
 * @property $id_postulant
 * @property $nombre_dg
 * @property $monto_dg
 * @property $observ_dg
 * @property $documento_dg
 * @property $created_at
 * @property $updated_at
 *
 * @property Postulant $postulant
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Gasto extends Model
{
    
    static $rules = [
		'id_postulant' => 'required',
		'nombre_dg' => 'required',
		'monto_dg' => 'required',
		'observ_dg' => 'required',
		'documento_dg' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_postulant','nombre_dg','monto_dg','observ_dg','documento_dg'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function postulant()
    {
        return $this->hasOne('App\Models\Postulant', 'id', 'id_postulant');
    }
    

}
