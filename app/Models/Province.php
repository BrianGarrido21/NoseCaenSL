<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'tbl_provincias';

    // Clave primaria de la tabla
    protected $primaryKey = 'cod';

    // Indicar que la clave primaria no es autoincremental
    public $incrementing = false;

    // Indicar que el tipo de la clave primaria es string (CHAR(2))
    protected $keyType = 'string';

    // Desactivar timestamps (ya que la tabla no maneja campos created_at/updated_at)
    public $timestamps = false;

    // Campos que se pueden asignar de forma masiva (mass assignment)
    protected $fillable = [
        'cod',
        'nombre',
        'comunidad_id',
    ];

    /**
     * Relación: una provincia tiene muchas tareas (tasks).
     *
     * Se especifica el campo foráneo 'province_id' en la tabla tasks,
     * y la clave local 'cod' de la tabla tbl_provincias.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'province_id', 'cod');
    }
}
