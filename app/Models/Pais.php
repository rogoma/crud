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
        return $this->hasMany(Usuario::class, 'pais_id'); // 'pais_id' es la clave foránea en la tabla de usuarios que hace referencia a la tabla de paises
    }
}
