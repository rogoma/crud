<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regiones extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regiones';

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

    public function paises()
    {
        return $this->hasMany('App\Models\Pais');
    }

}
