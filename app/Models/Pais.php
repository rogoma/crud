<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paises';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];

    public function usuarios()
    {
        // return $this->hasMany('App\Models\Empleado');
        return $this->hasMany('App\Models\Usuario');
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Regiones');
    }
}
