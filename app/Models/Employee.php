<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method bool hasRole(string|array $roles, string|null $guard = null)
 * @method bool hasPermissionTo(string|array $permission, string|null $guard = null)
 * @method \Illuminate\Database\Eloquent\Builder role(string|array $roles, string|null $guard = null)
 */
/**
 * @OA\Schema(
 *     schema="Employee",
 *     type="object",
 *     title="Employee",
 *     description="Modelo de empleado",
 *     required={"id", "dni", "name", "email", "phone", "address"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="dni", type="string", example="12345678A"),
 *     @OA\Property(property="name", type="string", example="Juan Pérez"),
 *     @OA\Property(property="email", type="string", example="juan@example.com"),
 *     @OA\Property(property="phone", type="string", example="123456789"),
 *     @OA\Property(property="address", type="string", example="Calle Falsa 123"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-01-01T00:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-01-02T00:00:00Z")
 * )
 */
class Employee extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory, HasRoles;

    protected $table = 'employees';

    protected $guard_name = 'web';

    protected $guarded = [];

    protected $hidden = ['password', 'created_at', 'updated_at'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function getRememberTokenName()
    {
        return null; // Esto evita que Laravel intente usar remember_token
    }
}
