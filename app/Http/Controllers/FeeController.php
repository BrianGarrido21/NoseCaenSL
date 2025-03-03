<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeeRequest;
use App\Jobs\SendFeeReminder;
use App\Mail\FeeNotification;
use App\Models\Fee;
use App\Models\User;
use App\Services\CurrencyConverterService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
/**
 * Class FeeController
 *
 * Controlador encargado de la gestión completa de fees (cuotas), incluyendo su creación
 * con conversión de divisas, notificación por correo y recordatorios automáticos.
 *
 * @package App\Http\Controllers
 */
class FeeController extends Controller
{
    /**
     * Constructor que aplica los middleware de permisos según la acción.
     */
    public function __construct()
    {
        $this->middleware('permission:read fee')->only(['index', 'show']);
        $this->middleware('permission:create fee')->only(['create', 'store']);
        $this->middleware('permission:update fee')->only(['edit', 'update']);
        $this->middleware('permission:delete fee')->only('destroy');
    }
    /**
     * Muestra la lista paginada de fees.
     *
     * @return View Vista con el listado de fees.
     */

    public function index(): View
    {
        return view('employee.fee.index');
    }

    /**
     * Muestra el formulario para crear un nuevo fee.
     *
     * @return View Vista del formulario de creación.
     */
    public function create(): View
    {
        return view('employee.fee.create');
    }
    /**
     * Guarda un nuevo fee, realiza la conversión de divisa si aplica,
     * envía notificación por correo y programa un recordatorio mensual.
     *
     * @param FeeRequest $request Datos validados del fee.
     * @param CurrencyConverterService $currencyConverter Servicio para conversión de divisas.
     *
     * @return RedirectResponse Redirección al listado con mensaje de éxito o error.
     */

    public function store(FeeRequest $request, CurrencyConverterService $currencyConverter): RedirectResponse
    {
        $data = $request->except('globalFee');
    
        $user = User::findOrFail($request->user_id);
        $userCurrency = $user->currency_iso ?? 'eur';
        $convertedAmount = $data['import'];
    
        if ($userCurrency !== 'eur') {
            $convertedAmount = $currencyConverter->convert($data['import'], $userCurrency);
    
            if ($convertedAmount === null) {
                return redirect()->back()->with('error', __('Currency conversion failed.'));
            }
        }
    
        $fee = Fee::create([
            'user_id'      => $user->id,
            'concept'      => $data['concept'],
            'import'       => $convertedAmount,
            'currency_iso' => $userCurrency !== 'eur' ? $userCurrency : 'eur',
            'due_date'     => $data['due_date'],
            'notes'        => $data['notes'] ?? null,
        ]);
    
        // Enviar correo de notificación inicial
        Mail::to($fee->user->email)->send(new FeeNotification($fee));
    
        // Programar recordatorio mensual
        $this->scheduleFeeReminder($fee);
    
        return redirect()->route('fee.index')->with('success', __('Fee created successfully.'));
    }
    
    /**
     * Programa un recordatorio mensual para un fee.
     *
     * @param Fee $fee Fee para el cual se programa el recordatorio.
     *
     * @return void
     */
    private function scheduleFeeReminder(Fee $fee)
    {
        $job = (new SendFeeReminder($fee))->delay(now()->addMonth());
        dispatch($job);
    }
    
    
    /**
     * Muestra los detalles de un fee específico.
     *
     * @param Fee $fee Fee a mostrar.
     *
     * @return View Vista con los detalles del fee.
     */
    public function show(Fee $fee): View
    {
        return view('employee.fee.show', compact('fee'));
    }
    /**
     * Muestra el formulario para editar un fee.
     *
     * @param Fee $fee Fee a editar.
     *
     * @return View Vista del formulario de edición.
     */
    public function edit(Fee $fee): View
    {
        return view('employee.fee.edit', compact('fee'));
    }
    /**
     * Actualiza los datos de un fee.
     *
     * @param FeeRequest $request Datos validados del fee.
     * @param Fee $fee Fee a actualizar.
     *
     * @return RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function update(FeeRequest $request, Fee $fee): RedirectResponse
    {
        $fee->update($request->all());
        return redirect()->route('fee.index')->with('success', __('Fee updated successfully'));
    }
    /**
     * Elimina un fee del sistema.
     *
     * @param Fee $fee Fee a eliminar.
     *
     * @return RedirectResponse Redirección al listado con mensaje de éxito.
     */
    public function destroy(Fee $fee): RedirectResponse
    {
        $fee->delete();
        return redirect()->route('fee.index')->with('success', __('Fee deleted successfully'));
    }
}
