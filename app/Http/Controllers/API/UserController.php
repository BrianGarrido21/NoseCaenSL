<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Tag(
 *     name="Users",
 *     description="API para la gestión de Usuarios"
 * )
 */
class UserController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/v1/user",
     *     tags={"Users"},
     *     summary="Listar Usuarios",
     *     description="Obtiene una lista de todos los usuarios registrados",
     *     @OA\Response(
     *         response=200,
     *         description="Listado de usuarios obtenido correctamente",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/User"))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/user",
     *     tags={"Users"},
     *     summary="Crear un Usuario",
     *     description="Crea un nuevo usuario con su información y país asociado",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"cif", "name", "email", "phone", "address", "country_id"},
     *             @OA\Property(property="cif", type="string", example="B12345678"),
     *             @OA\Property(property="name", type="string", example="Carlos Gómez"),
     *             @OA\Property(property="email", type="string", example="carlos@example.com"),
     *             @OA\Property(property="phone", type="string", example="987654321"),
     *             @OA\Property(property="address", type="string", example="Avenida Principal 456"),
     *             @OA\Property(property="country_id", type="integer", example=5)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuario creado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="User created successfully"),
     *             @OA\Property(property="user", ref="#/components/schemas/User")
     *         )
     *     )
     * )
     */
    public function store(UserRequest $request): JsonResponse
    {
        $country = DB::table('paises')->where('id', $request->country_id)->first();

        $user = User::create([
            'cif'          => $request->cif,
            'name'         => $request->name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'address'      => $request->address,
            'country_id'   => $request->country_id,
            'currency_iso' => $country ? strtolower($country->iso_moneda) : null,
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user'    => $user
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/user/{id}",
     *     tags={"Users"},
     *     summary="Obtener un Usuario",
     *     description="Devuelve los datos de un usuario específico",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Usuario obtenido correctamente",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     )
     * )
     */
    public function show(User $user): JsonResponse
    {
        return response()->json($user, 200);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/user/{id}",
     *     tags={"Users"},
     *     summary="Actualizar un Usuario",
     *     description="Actualiza los datos de un usuario existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="cif", type="string", example="B12345678"),
     *             @OA\Property(property="name", type="string", example="Carlos Gómez"),
     *             @OA\Property(property="email", type="string", example="carlos@example.com"),
     *             @OA\Property(property="phone", type="string", example="987654321"),
     *             @OA\Property(property="address", type="string", example="Avenida Principal 456"),
     *             @OA\Property(property="country_id", type="integer", example=5)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Usuario actualizado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="User updated successfully"),
     *             @OA\Property(property="user", ref="#/components/schemas/User")
     *         )
     *     )
     * )
     */
    public function update(UserRequest $request, User $user): JsonResponse
    {
        $country = DB::table('paises')->where('id', $request->country_id)->first();

        $user->update([
            'cif'          => $request->cif,
            'name'         => $request->name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'address'      => $request->address,
            'country_id'   => $request->country_id,
            'currency_iso' => $country ? strtolower($country->iso_moneda) : null,
        ]);

        return response()->json([
            'message' => 'User updated successfully',
            'user'    => $user
        ], 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/user/{id}",
     *     tags={"Users"},
     *     summary="Eliminar un Usuario",
     *     description="Elimina un usuario específico",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Usuario eliminado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="User deleted successfully")
     *         )
     *     )
     * )
     */
    public function destroy(User $user): JsonResponse
    {
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
