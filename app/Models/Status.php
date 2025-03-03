<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Status
 *
 * Modelo que representa un estado dentro del sistema.
 * Un estado puede estar asociado a múltiples tareas.
 *
 * @package App\Models
 */
class Status extends Model
{
    use HasFactory;

    /**
     * Atributos protegidos contra asignación masiva.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Atributos ocultos al serializar el modelo.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Relación uno a muchos con las tareas.
     *
     * Un estado puede tener varias tareas asociadas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
