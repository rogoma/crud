<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'empleados';

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
    protected $fillable = ['foto', 'nombre', 'apellido', 'correo', 'cargo_id', 'estado'];


    /**
     * Para obtener el vinculo con la tabla cargos
     */
    public function cargo(){
        return $this->belongsTo('App\Models\Cargo');
    }


}
