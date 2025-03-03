<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Employee;
use App\Models\Province;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use App\Rules\ExistsUserByCIF;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

/**
 * Class TaskController
 *
 * Controlador encargado de la gestión completa de tareas (tasks), incluyendo su creación,
 * visualización, actualización y eliminación, con validación de permisos y relación con usuarios.
 *
 * @package App\Http\Controllers
 */
class TaskController extends Controller
{
    /**
     * Constructor que aplica middleware de permisos según la acción.
     */
    public function __construct()
    {
        $this->middleware('permission:read task')->only(['index', 'show']);
        $this->middleware('permission:create task')->only(['create', 'store']);
        $this->middleware('permission:update task')->only(['edit', 'update']);
        $this->middleware('permission:delete task')->only('destroy');
    }
    /**
     * Muestra la lista de tareas.
     *
     * @return View Vista con el listado de tareas.
     */
    public function index(): View
    {

        return view('employee.task.index');
    }
    /**
     * Muestra el formulario para crear una nueva tarea.
     *
     * @return View Vista del formulario de creación de tarea.
     */
    public function create(): View
    {
        return view('employee.task.create');
    }
    /**
     * Guarda una nueva tarea en el sistema.
     *
     * Valida los datos del formulario, obtiene el usuario por CIF
     * y crea la tarea vinculada al usuario.
     *
     * @param Request $request Datos validados de la tarea.
     *
     * @return RedirectResponse Redirección al listado de tareas con mensaje de éxito.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'cif' => ['required', 'string'],
            'name' => 'required|string|max:255,',
            'phone' => ['required', 'string'],
            'email' => 'required|email|max:255|unique:users,email',
            'postal_code' => 'required|string|max:10|regex:/^\d{4,10}$/',
            'finish_date' => 'required|date|after_or_equal:today',
            'province_id' => 'required|integer|exists:tbl_provincias,cod',
            'status_id' => 'required|integer|exists:statuses,id',
            'address' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'pre_notes' => 'nullable|string|max:500',
        ]);

        // Obtener el usuario
        $user = User::where('cif', $validated['cif'])->first();
        // Crear la tarea
        Task::create([
            'user_id' => $user->id,
            'cif' => $validated['cif'],
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'postal_code' => $validated['postal_code'],
            'finish_date' => $validated['finish_date'],
            'province_id' => $validated['province_id'],
            'status_id' => $validated['status_id'],
            'address' => $validated['address'],
            'description' => $validated['description'],
            'pre_notes' => $validated['pre_notes'] ?? null,
        ]);

        return redirect()->route('task.index')->with('success', __('Task created successfully'));
    }
    /**
     * Muestra los detalles de una tarea específica.
     *
     * Verifica si el empleado autenticado puede visualizar la tarea
     * y lanza un error 403 si no tiene permisos.
     *
     * @param Task $task Tarea a mostrar.
     *
     * @return View Vista con los detalles de la tarea.
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException Si el empleado no tiene permisos.
     */
    public function show(Task $task): View
    {
        $employee = Auth::guard('employee')->user();
        if ($task->employee_id !== $employee->id && $employee->hasRole('operator')) {
            abort(403, __('Unauthorized'));
        }
        return view('employee.task.show', compact('task'));
    }
    /**
     * Muestra el formulario para editar una tarea.
     *
     * @param Task $task Tarea a editar.
     *
     * @return View Vista del formulario de edición.
     */
    public function edit(Task $task): View
    {
        return view('employee.task.edit', compact('task'));
    }
    /**
     * Actualiza los datos de una tarea.
     *
     * @param TaskRequest $request Datos validados de la tarea.
     * @param Task $task Tarea a actualizar.
     *
     * @return RedirectResponse Redirección al listado de tareas con mensaje de éxito.
     */
    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        $task->update($request->all());
        return redirect()->route('task.index')->with('success', __('Task updated successfully'));
    }
    /**
     * Elimina una tarea del sistema.
     *
     * @param Task $task Tarea a eliminar.
     *
     * @return RedirectResponse Redirección al listado de tareas con mensaje de éxito.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('task.index')->with('success', __('Task deleted successfully'));
    }
}
