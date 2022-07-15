<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Postulant
 *
 * @property $id
 * @property $rut_post
 * @property $nombre_post
 * @property $periodo_id
 * @property $users_id 
 * @property $curso_post
 * @property $apod_post
 * @property $correoapo_post
 * @property $descuento_post
 * @property $created_at
 * @property $updated_at
 *
 * @property Periodo $periodo
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Postulant extends Model
{
    
    static $rules = [
		'rut_post' => 'required',
		'nombre_post' => 'required',
		'periodo_id' => 'required',
		'users_id' => 'required',		
		'curso_post' => 'required',
		'apod_post' => 'required',
		'correoapo_post' => 'required',
		'descuento_post' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rut_post','nombre_post','periodo_id','users_id','curso_post','apod_post','correoapo_post','descuento_post'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function periodo()
    {
        return $this->hasOne('App\Models\Periodo', 'id', 'periodo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }
    

}
