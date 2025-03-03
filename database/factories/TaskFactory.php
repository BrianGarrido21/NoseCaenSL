<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use App\Models\Employee;  // Se asume que tienes la factory de Employee
use App\Models\Status;    // Se asume que tienes la factory de Status
use App\Models\Province;  // Se asume que tienes la factory de Province
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class TaskFactory
 *
 * Factory encargada de generar datos ficticios para el modelo Task,
 * incluyendo relaciones automáticas con Employee, User, Status y Province.
 * 
 * Utiliza Faker para crear valores realistas que permiten poblar la base de datos
 * durante pruebas y desarrollo.
 *
 * @package Database\Factories
 */
class TaskFactory extends Factory
{
    /**
     * El modelo asociado a esta factory.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define los atributos por defecto para el modelo Task.
     *
     * Genera datos ficticios para:
     * - CIF único con formato personalizado.
     * - Nombre, teléfono, email, dirección y descripción.
     * - Fechas de creación y finalización opcional.
     * - Notas previas y posteriores opcionales.
     * 
     * Además, asocia la tarea a:
     * - Un empleado generado por la factory de Employee.
     * - Un usuario generado por la factory de User.
     * - Un estado aleatorio entre 1 y 4.
     * - Una provincia aleatoria tomada de la tabla provinces.
     *
     * @return array Datos generados para el modelo.
     */
    public function definition()
    {
        return [
            'cif'               => $this->faker->unique()->regexify('[A-Z]\d{8}'),
            'name'           => $this->faker->name,
            'phone'          => $this->faker->phoneNumber,
            'email'          => $this->faker->safeEmail,
            'address'        => $this->faker->address,
            'description'    => $this->faker->paragraph,
            'creation_date'  => $this->faker->dateTimeThisYear,
            'finish_date'    => $this->faker->optional()->dateTimeBetween('now', '+1 month'),
            'postal_code'    => $this->faker->postcode,
            'pre_notes'      => $this->faker->optional()->text,
            'post_notes'     => $this->faker->optional()->text,
            // Relaciones: se crean registros asociados mediante sus factories
            'employee_id'    => Employee::factory(),
            'user_id'        => User::factory(),
            'status_id'      => $this->faker->numberBetween(1,4),
            'province_id' => function () {
                return Province::inRandomOrder()->value('cod');
            },
        ];
    }
}
