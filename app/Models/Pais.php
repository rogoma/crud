<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises'; // Nombre de la tabla de paises

    // Definición de la relación "hasMany" con el modelo "Usuario"
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'pais_id'); // 'pais_id' es la clave foránea en la tabla de usuarios que hace referencia a la tabla de paises
    }
}
