<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use App\Models\Employee;
use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{

    /** @test */
    public function puede_crear_una_tarea()
    {
        $user = User::factory()->create();
        $employee = Employee::factory()->create();
        $status = Status::find(1);

        $task = Task::factory()->create([
            'cif' => 'B12345678',
            'name' => 'Instalación de software',
            'phone' => '123456789',
            'email' => 'cliente@example.com',
            'address' => 'Calle Falsa 123',
            'description' => 'Instalación de un software ERP',
            'postal_code' => '28001',
            'pre_notes' => 'Cliente necesita soporte remoto',
            'post_notes' => 'Instalación completada',
            'summary_uri' => null,
            'employee_id' => $employee->id,
            'user_id' => $user->id,
            'province_id' => '28',
            'status_id' => $status->id,
        ]);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'cif' => 'B12345678',
            'name' => 'Instalación de software',
        ]);
    }

    /** @test */
    public function puede_actualizar_una_tarea()
    {
        $task = Task::factory()->create();

        $task->update([
            'status_id' => Status::find(1)->id,
            'post_notes' => 'Actualización de notas después del servicio.',
        ]);

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'post_notes' => 'Actualización de notas después del servicio.',
        ]);
    }

    /** @test */
    public function puede_eliminar_una_tarea()
    {
        $task = Task::factory()->create();
        $task->delete();

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }

    /** @test */
    public function una_tarea_tiene_un_usuario_asociado()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->assertEquals($user->id, $task->user->id);
    }

    /** @test */
    public function una_tarea_puede_tener_un_empleado_asignado()
    {
        $employee = Employee::factory()->create();
        $task = Task::factory()->create(['employee_id' => $employee->id]);

        $this->assertEquals($employee->id, $task->employee->id);
    }

    /** @test */
    public function una_tarea_puede_pertenecer_a_una_provincia()
    {
        $task = Task::factory()->create(['province_id' => '28']);

        $this->assertEquals('28', $task->province_id);
    }
}
