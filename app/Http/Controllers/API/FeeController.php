<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeeRequest;
use App\Mail\FeeNotification;
use App\Models\Fee;
use App\Models\User;
use App\Services\CurrencyConverterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

/**
 * @OA\Tag(
 *     name="Fees",
 *     description="API para la gestión de Fees"
 * )
 */
class FeeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/fee",
     *     tags={"Fees"},
     *     summary="Listar Fees",
     *     description="Devuelve una lista de todos los Fees",
     *     @OA\Response(
     *         response=200,
     *         description="Listado de Fees obtenido correctamente",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Fee"))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $fees = Fee::all();
        return response()->json($fees);
    }

    /**
     * @OA\Post(
     *     path="/api/v1/fee",
     *     tags={"Fees"},
     *     summary="Crear un Fee",
     *     description="Crea un nuevo Fee y envía notificación por email",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"concept", "import", "due_date", "user_id"},
     *             @OA\Property(property="concept", type="string", example="Servicio mensual"),
     *             @OA\Property(property="import", type="number", format="float", example=100.50),
     *             @OA\Property(property="due_date", type="string", format="date", example="2024-06-15"),
     *             @OA\Property(property="is_paid", type="boolean", example=false),
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="notes", type="string", example="Pago pendiente"),
     *             @OA\Property(property="currency_iso", type="string", example="usd")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Fee creado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Fee created successfully."),
     *             @OA\Property(property="fee", ref="#/components/schemas/Fee")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Error en la conversión de divisa",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="Currency conversion failed.")
     *         )
     *     )
     * )
     */
    public function store(FeeRequest $request, CurrencyConverterService $currencyConverter): JsonResponse
    {
        $data = $request->all();

        $userCurrency = User::find($request->user_id)->currency_iso ?? 'eur';
        
        if ($userCurrency !== 'eur') {
            $convertedAmount = $currencyConverter->convert($data['import'], $userCurrency);
    
            if ($convertedAmount === null) {
                return response()->json(['error' => 'Currency conversion failed.'], 400);
            }
    
            $data['import'] = $convertedAmount;
            $data['currency_iso'] = $userCurrency;
        }
    
        $fee = Fee::create($data);
        Mail::to($fee->user->email)->send(new FeeNotification($fee));
    
        return response()->json(['message' => 'Fee created successfully.', 'fee' => $fee], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/fee/{id}",
     *     tags={"Fees"},
     *     summary="Obtener un Fee",
     *     description="Devuelve los datos de un Fee específico",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Fee obtenido correctamente",
     *         @OA\JsonContent(ref="#/components/schemas/Fee")
     *     )
     * )
     */
    public function show(Fee $fee): JsonResponse
    {
        return response()->json($fee);
    }

    /**
     * @OA\Put(
     *     path="/api/v1/fee/{id}",
     *     tags={"Fees"},
     *     summary="Actualizar un Fee",
     *     description="Actualiza los datos de un Fee existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="concept", type="string", example="Servicio actualizado"),
     *             @OA\Property(property="import", type="number", format="float", example=150.75),
     *             @OA\Property(property="due_date", type="string", format="date", example="2024-07-15"),
     *             @OA\Property(property="is_paid", type="boolean", example=true),
     *             @OA\Property(property="notes", type="string", example="Pago recibido"),
     *             @OA\Property(property="currency_iso", type="string", example="usd")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Fee actualizado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Fee updated successfully."),
     *             @OA\Property(property="fee", ref="#/components/schemas/Fee")
     *         )
     *     )
     * )
     */
    public function update(FeeRequest $request, Fee $fee): JsonResponse
    {
        $fee->update($request->all());
        return response()->json(['message' => 'Fee updated successfully.', 'fee' => $fee]);
    }

    /**
     * @OA\Delete(
     *     path="/api/v1/fee/{id}",
     *     tags={"Fees"},
     *     summary="Eliminar un Fee",
     *     description="Elimina un Fee existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Fee eliminado correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Fee deleted successfully.")
     *         )
     *     )
     * )
     */
    public function destroy(Fee $fee): JsonResponse
    {
        $fee->delete();
        return response()->json(['message' => 'Fee deleted successfully.']);
    }
}
