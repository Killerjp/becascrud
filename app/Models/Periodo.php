<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Periodo
 *
 * @property $id
 * @property $ano_pe
 * @property $inicio_pe
 * @property $termino_Pe
 * @property $montoanual
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Periodo extends Model
{
    
    static $rules = [
		'ano_pe' => 'required',
		'inicio_pe' => 'required',
		'termino_Pe' => 'required',
		'montoanual' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['ano_pe','inicio_pe','termino_Pe','montoanual'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postulante()
    {
        return $this->hasMany('App\Models\Postulant', 'periodo_id', 'id');
    }



}
