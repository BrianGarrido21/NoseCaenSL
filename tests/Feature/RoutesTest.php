<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use App\Models\Employee;
use App\Models\Fee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends TestCase
{

    /** @test */
    public function todas_las_rutas_existen_y_muestran_contenido()
    {
        $user = User::factory()->create();
        $employee = Employee::factory()->create();
        $task = Task::factory()->create();
        $fee = Fee::factory()->create();

        $rutas = [
            '/',
            'api/v1/employee',
            "api/v1/employee/{$employee->id}",
            'api/v1/fee',
            "api/v1/fee/{$fee->id}",
            'api/v1/task',
            "api/v1/task/{$task->id}",
            'api/v1/user',
            "api/v1/user/{$user->id}",
            'employee',
            'employee/employee',
            'employee/employee/create',
            "employee/employee/{$employee->id}",
            "employee/employee/{$employee->id}/edit",
            'employee/login',
            'employee/profile',
            'employee/role',
            'employee/role/create',
            'employee/status',
            'employee/status/create',
            'employee/task',
            'employee/task/create',
            "employee/task/{$task->id}",
            "employee/task/{$task->id}/edit",
            "employee/task/complete/{$task->id}",
            'employee/user',
            'employee/user/create',
            "employee/user/{$user->id}",
            "employee/user/{$user->id}/edit",
            'fee',
            'fee/create',
            "fee/{$fee->id}",
            "fee/{$fee->id}/edit",
            "fee/{$fee->id}/download-pdf",
            "fee/{$fee->id}/resend-pdf",
            'success',
            'task',
        ];

        foreach ($rutas as $ruta) {
            if ($ruta === 'employee/logout') {
                $response = $this->actingAs($user)->post($ruta);
            } else {
                $response = $this->get($ruta);
            }
        
            $this->assertTrue(in_array($response->status(), [200, 302, 403]), "Error en la ruta: $ruta");
        }
    }
}
