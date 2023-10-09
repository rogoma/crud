<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cargos';

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
    protected $fillable = ['descripcion','estado'];

    use HasFactory;

    /**
     * Para obtener el vinculo con la tabla empleados
     */
    public function empleados(){
        return $this->hasMany('App\Models\Empleado');
    }

}
