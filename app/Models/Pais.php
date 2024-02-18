<?php

<<<<<<< HEAD
namespace App;
=======
namespace App\Models;
>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
<<<<<<< HEAD
    protected $table = 'paises'; // Nombre de la tabla de paises

    // Definición de la relación "hasMany" con el modelo "Usuario"
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'pais_id'); // 'pais_id' es la clave foránea en la tabla de usuarios que hace referencia a la tabla de paises
=======
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
>>>>>>> e69b14d5f192d1554bfb655307109c4cdcf2a66f
    }
}
