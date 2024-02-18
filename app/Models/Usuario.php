<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios'; // Nombre de la tabla de usuarios

    // Definición de la relación "belongsTo" con el modelo "Pais"
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id'); // 'pais_id' es la clave foránea en la tabla de usuarios que hace referencia a la tabla de paises
    }
}
