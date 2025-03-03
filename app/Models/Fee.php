<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Fee",
 *     type="object",
 *     title="Fee",
 *     description="Modelo de Fee",
 *     required={"id", "concept", "import", "due_date", "user_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="concept", type="string", example="Servicio mensual"),
 *     @OA\Property(property="import", type="number", format="float", example=100.50),
 *     @OA\Property(property="due_date", type="string", format="date", example="2024-06-15"),
 *     @OA\Property(property="is_paid", type="boolean", example=false),
 *     @OA\Property(property="user_id", type="integer", example=2),
 *     @OA\Property(property="notes", type="string", example="Pago pendiente"),
 *     @OA\Property(property="currency_iso", type="string", example="USD"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-01-01T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-01-02T12:00:00Z")
 * )
 */
class Fee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];
    
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    
}
