<?php

<<<<<<< HEAD
namespace App;
=======
namespace App\Models;
>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
<<<<<<< HEAD
    protected $table = 'usuarios'; // Nombre de la tabla de usuarios

    // Definición de la relación "belongsTo" con el modelo "Pais"
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id'); // 'pais_id' es la clave foránea en la tabla de usuarios que hace referencia a la tabla de paises
    }
=======
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

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

    public function pais()
    {
        return $this->belongsTo('App\Models\Pais');
    }


>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f
}
