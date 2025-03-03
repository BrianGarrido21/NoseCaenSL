<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'paises';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Indicar que la clave primaria no es autoincremental
    public $incrementing = false;

    // Tipo de la clave primaria (entero)
    protected $keyType = 'int';

    // Campos rellenables mediante mass assignment
    protected $fillable = [
        'id',
        'iso2',
        'iso3',
        'prefijo',
        'nombre',
        'continente',
        'subcontinente',
        'iso_moneda',
        'nombre_moneda',
    ];
    
    /**
     * Relación: Un país puede tener muchos usuarios.
     * Se asume que en la tabla users la columna que almacena la relación es `country_id`
     * y que la clave local es `id`.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'country_id', 'id');
    }
}
