<?php

namespace App\Providers;

use App\Models\Country;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Employee;
use App\Models\Province;
use App\Models\Status;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class ViewServiceProvider
 *
 * Service Provider encargado de inyectar datos globales a vistas específicas
 * mediante el uso de View Composers. Automatiza la carga de información
 * como empleados, roles, permisos, provincias, estados, usuarios y países
 * para los formularios de creación y edición del sistema.
 *
 * @package App\Providers
 */
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Registra los compositores de vistas.
     *
     * Asigna automáticamente los siguientes datos a sus vistas correspondientes:
     * 
     * - Tareas (`employee.task.create`, `employee.task.edit`):
     *   - Empleados con rol "operator".
     *   - Provincias disponibles.
     *   - Estados disponibles.
     *
     * - Cuotas (`employee.fee.create`, `employee.fee.edit`):
     *   - Usuarios disponibles.
     *
     * - Empleados (`employee.create`, `employee.edit`):
     *   - Roles disponibles.
     *
     * - Roles (`employee.role.create`, `employee.role.edit`, `employee.role.show`):
     *   - Permisos disponibles.
     *
     * - Usuarios (`employee.user.create`, `employee.user.edit`):
     *   - Países disponibles.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['employee.task.create', 'employee.task.edit'], function ($view) {
            $view->with([
                'employees' => Employee::role('operator')->get(), // 🔹 Solo empleados con rol "operator"
                'provinces' => Province::all(),
                'statuses' => Status::all(),
            ]);
        });
        View::composer(['employee.fee.create', 'employee.fee.edit'], function ($view) {
            $view->with([
                'users' => User::all()
            ]);
        });

        View::composer(['employee.create', 'employee.edit'], function ($view) {
            $view->with([
                'roles' => Role::all()
            ]);
        });

        View::composer(['employee.role.create','employee.role.edit', 'employee.role.show'], function ($view) {
            $view->with([
                'permissions' => Permission::all()
            ]);
        });

        View::composer(['employee.user.create','employee.user.edit'], function ($view) {
            $view->with([
                'countries' => Country::all()
            ]);
        });

    }
}
