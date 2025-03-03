<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

/**
 * Class EmployeeController
 *
 * Controlador encargado de la gestión CRUD de empleados, incluyendo asignación de roles
 * y protección mediante permisos.
 *
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{
    /**
     * Constructor que aplica los middleware de permisos según la acción.
     */
    public function __construct()
    {
        $this->middleware('permission:read employee')->only(['index', 'show']);
        $this->middleware('permission:create employee')->only(['create', 'store']);
        $this->middleware('permission:update employee')->only(['edit', 'update']);
        $this->middleware('permission:delete employee')->only('destroy');
    }
    /**
     * Muestra la lista paginada de empleados.
     *
     * @return View Vista con el listado de empleados.
     */
    public function index(): View
    {
        return view("employee.index");
    }
    /**
     * Muestra el formulario para crear un nuevo empleado.
     *
     * @return View Vista del formulario de creación.
     */
    public function create(): View
    {
        return view('employee.create');
    }

    /**
     * Guarda un nuevo empleado y le asigna un rol si se proporciona.
     *
     * @param EmployeeRequest $request Datos validados del empleado.
     *
     * @return RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        $employee = Employee::create([
            'dni' => $request->dni,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::find($request->input('role_id'));
        if ($role) {
            $employee->assignRole($role->name);
        }

        return redirect()->route('employee.index')->with('success', __('Employee created successfully'));
    }
    /**
     * Muestra los detalles de un empleado específico.
     *
     * @param Employee $employee Empleado a mostrar.
     *
     * @return View Vista con los detalles del empleado.
     */
    public function show(Employee $employee): View
    {
        return view('employee.show', compact('employee'));
    }
    /**
     * Muestra el formulario para editar un empleado.
     *
     * @param Employee $employee Empleado a editar.
     *
     * @return View Vista del formulario de edición.
     */
    public function edit(Employee $employee): View
    {
        return view('employee.edit', compact('employee'));
    }
    /**
     * Actualiza la información de un empleado y sincroniza su rol.
     *
     * @param EmployeeRequest $request Datos validados del empleado.
     * @param Employee $employee Empleado a actualizar.
     *
     * @return RedirectResponse Redirección al listado con mensaje de éxito o error.
     */
    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $data = [
            'dni' => $request->dni,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $employee->update($data);

        $roleId = $request->input('role_id');
        $role = Role::find($roleId);

        if ($role) {
            $employee->syncRoles([$role->name]);
        } else {
            return redirect()->route('employee.index')->with('error', __('Role not found.'));
        }

        return redirect()->route('employee.index')->with('success', __('Employee updated successfully'));
    }
    /**
     * Elimina un empleado del sistema.
     *
     * @param Employee $employee Empleado a eliminar.
     *
     * @return RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('success', __('Employee deleted successfully'));
    }
}
