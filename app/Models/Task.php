<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Importa el modelo Provincia
use App\Models\Provincia;

/**
 * @OA\Schema(
 *     schema="Task",
 *     type="object",
 *     title="Task",
 *     description="Modelo de Tarea",
 *     required={"id", "cif", "name", "phone", "email", "postal_code", "finish_date", "province_id", "status_id", "address", "description", "user_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="cif", type="string", example="B12345678"),
 *     @OA\Property(property="name", type="string", example="Instalación de software"),
 *     @OA\Property(property="phone", type="string", example="123456789"),
 *     @OA\Property(property="email", type="string", example="cliente@example.com"),
 *     @OA\Property(property="postal_code", type="string", example="28001"),
 *     @OA\Property(property="finish_date", type="string", format="date", example="2024-06-20"),
 *     @OA\Property(property="province_id", type="integer", example=28),
 *     @OA\Property(property="status_id", type="integer", example=3),
 *     @OA\Property(property="address", type="string", example="Calle Falsa 123"),
 *     @OA\Property(property="description", type="string", example="Instalación completa del ERP."),
 *     @OA\Property(property="pre_notes", type="string", example="Revisar requisitos antes de comenzar."),
 *     @OA\Property(property="post_notes", type="string", example="Todo funcionando correctamente."),
 *     @OA\Property(property="summary_uri", type="string", example="http://example.com/summary.pdf"),
 *     @OA\Property(property="creation_date", type="string", format="date-time", example="2024-05-01T09:00:00Z"),
 *     @OA\Property(property="user_id", type="integer", example=2),
 *     @OA\Property(property="employee_id", type="integer", nullable=true, example=5),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-05-01T09:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-05-01T10:00:00Z")
 * )
 */
class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function province() {
        return $this->belongsTo(Province::class, 'province_id', 'cod');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
