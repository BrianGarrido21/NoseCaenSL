<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $fillable = ['name', 'guard_name', 'color'];

    public function getColorAttribute()
    {
        return $this->attributes; // Gris por defecto si no tiene color
    }
}
