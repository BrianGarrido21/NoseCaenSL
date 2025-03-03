<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Tag(
 *     name="Tasks",
 *     description="API para la gestión de Tareas"
 * )
 */
class TaskController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/task",
     *     tags={"Tasks"},
     *     summary="Listar Tareas",
     *     description="Devuelve una lista de todas las tareas registradas",
     *     @OA\Response(
     *         response=200,
     *         description="Listado de tareas obtenido correctamente",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Task"))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/task",
     *     tags={"Tasks"},
     *     summary="Crear una Tarea",
     *     description="Crea una nueva tarea y la asocia a un usuario por CIF",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"cif", "name", "phone", "email", "postal_code", "finish_date", "province_id", "status_id", "address", "description"},
     *             @OA\Property(property="cif", type="string", example="B12345678"),
     *             @OA\Property(property="name", type="string", example="Instalación de software"),
     *             @OA\Property(property="phone", type="string", example="123456789"),
     *             @OA\Property(property="email", type="string", example="cliente@example.com"),
     *             @OA\Property(property="postal_code", type="string", example="28001"),
     *             @OA\Property(property="finish_date", type="string", format="date", example="2024-06-20"),
     *             @OA\Property(property="province_id", type="integer", example=28),
     *             @OA\Property(property="status_id", type="integer", example=3),
     *             @OA\Property(property="address", type="string", example="Calle Falsa 123"),
     *             @OA\Property(property="description", type="string", example="Instalación completa del ERP."),
     *             @OA\Property(property="pre_notes", type="string", example="Verificar acceso remoto antes de iniciar.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Tarea creada correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Task created successfully"),
     *             @OA\Property(property="task", ref="#/components/schemas/Task")
     *         )
     *     )
     * )
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'cif' => ['required', 'string'],
            'name' => 'required|string|max:255',
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
    
        $user = User::where('cif', $validated['cif'])->first();
    
        $task = Task::create([
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
    
        return response()->json(['message' => 'Task created successfully', 'task' => $task], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/task/{id}",
     *     tags={"Tasks"},
     *     summary="Obtener una Tarea",
     *     description="Devuelve los datos de una tarea específica",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tarea obtenida correctamente",
     *         @OA\JsonContent(ref="#/components/schemas/Task")
     *     )
     * )
     */
    public function show(Task $task): JsonResponse
    {
        return response()->json($task);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/task/{id}",
     *     tags={"Tasks"},
     *     summary="Actualizar una Tarea",
     *     description="Actualiza los datos de una tarea existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Revisión de software"),
     *             @OA\Property(property="phone", type="string", example="987654321"),
     *             @OA\Property(property="description", type="string", example="Actualización de módulos."),
     *             @OA\Property(property="pre_notes", type="string", example="Preparar entorno de pruebas."),
     *             @OA\Property(property="finish_date", type="string", format="date", example="2024-06-30")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tarea actualizada correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Task updated successfully"),
     *             @OA\Property(property="task", ref="#/components/schemas/Task")
     *         )
     *     )
     * )
     */
    public function update(TaskRequest $request, Task $task): JsonResponse
    {
        $task->update($request->all());
        return response()->json(['message' => 'Task updated successfully', 'task' => $task]);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/task/{id}",
     *     tags={"Tasks"},
     *     summary="Eliminar una Tarea",
     *     description="Elimina una tarea específica",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tarea eliminada correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Task deleted successfully")
     *         )
     *     )
     * )
     */
    public function destroy(Task $task): JsonResponse
    {
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }
}
