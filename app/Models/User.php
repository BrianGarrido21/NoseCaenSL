<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     title="User",
 *     description="Modelo de Usuario",
 *     required={"id", "cif", "name", "email", "phone", "address", "country_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="cif", type="string", example="B12345678"),
 *     @OA\Property(property="name", type="string", example="Carlos Gómez"),
 *     @OA\Property(property="email", type="string", example="carlos@example.com"),
 *     @OA\Property(property="phone", type="string", example="987654321"),
 *     @OA\Property(property="address", type="string", example="Avenida Principal 456"),
 *     @OA\Property(property="country_id", type="integer", example=5),
 *     @OA\Property(property="currency_iso", type="string", example="usd"),
 *     @OA\Property(property="email_verified_at", type="string", format="date-time", example="2024-06-01T12:00:00Z"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-05-01T09:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-05-02T10:00:00Z")
 * )
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'credit_card',
        'cif',
        'address',
        'country_id',
        'currency_iso'
    ];

    protected $guard_name = 'web';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación con el país.
     *
     * Se asume que en la migración de users el campo se llama `country_id`
     * y que en la tabla `paises` la clave primaria es `id`.
     */
    public function country() {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function fees() {
        return $this->hasMany(Fee::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
