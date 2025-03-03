<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

/**
 * @OA\Tag(
 *     name="Employees",
 *     description="API para la gestión de empleados"
 * )
 */
class EmployeeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/employee",
     *     tags={"Employees"},
     *     summary="Listar empleados",
     *     description="Obtiene el listado completo de empleados",
     *     @OA\Response(
     *         response=200,
     *         description="Listado de empleados obtenido correctamente",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Employee"))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $employees = Employee::all();
        return response()->json($employees);
    }
   /**
     * @OA\Post(
     *     path="/api/v1/employee",
     *     tags={"Employees"},
     *     summary="Crear un empleado",
     *     description="Crea un nuevo empleado con sus datos y rol",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"dni", "name", "email", "phone", "address", "password", "role_id"},
     *             @OA\Property(property="dni", type="string", example="12345678A"),
     *             @OA\Property(property="name", type="string", example="Juan Pérez"),
     *             @OA\Property(property="email", type="string", example="juan@example.com"),
     *             @OA\Property(property="phone", type="string", example="123456789"),
     *             @OA\Property(property="address", type="string", example="Calle Falsa 123"),
     *             @OA\Property(property="password", type="string", example="secret123"),
     *             @OA\Property(property="role_id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Empleado creado exitosamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Employee created successfully"),
     *             @OA\Property(property="employee", ref="#/components/schemas/Employee")
     *         )
     *     )
     * )
     */
    public function store(EmployeeRequest $request): JsonResponse
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

        return response()->json(['message' => 'Employee created successfully', 'employee' => $employee], 201);
    }
    /**
     * @OA\Get(
     *     path="/api/v1/employee/{id}",
     *     tags={"Employees"},
     *     summary="Obtener un empleado",
     *     description="Devuelve los datos de un empleado específico",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Empleado obtenido correctamente",
     *         @OA\JsonContent(ref="#/components/schemas/Employee")
     *     )
     * )
     */
    public function show(Employee $employee): JsonResponse
    {
        return response()->json($employee);
    }
    /**
     * @OA\Put(
     *     path="/api/v1/employee/{id}",
     *     tags={"Employees"},
     *     summary="Actualizar un empleado",
     *     description="Actualiza los datos de un empleado existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"dni", "name", "email", "phone", "address"},
     *             @OA\Property(property="dni", type="string", example="12345678A"),
     *             @OA\Property(property="name", type="string", example="Juan Pérez"),
     *             @OA\Property(property="email", type="string", example="juan@example.com"),
     *             @OA\Property(property="phone", type="string", example="123456789"),
     *             @OA\Property(property="address", type="string", example="Calle Falsa 123"),
     *             @OA\Property(property="password", type="string", example="secret123"),
     *             @OA\Property(property="role_id", type="integer", example=2)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Empleado actualizado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Employee updated successfully"),
     *             @OA\Property(property="employee", ref="#/components/schemas/Employee")
     *         )
     *     )
     * )
     */
    public function update(EmployeeRequest $request, Employee $employee): JsonResponse
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
            return response()->json(['error' => 'Role not found.'], 404);
        }

        return response()->json(['message' => 'Employee updated successfully', 'employee' => $employee]);
    }
    
    /**
     * @OA\Delete(
     *     path="/api/v1/employee/{id}",
     *     tags={"Employees"},
     *     summary="Eliminar un empleado",
     *     description="Elimina un empleado existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Empleado eliminado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Employee deleted successfully")
     *         )
     *     )
     * )
     */
    public function destroy(Employee $employee): JsonResponse
    {
        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
