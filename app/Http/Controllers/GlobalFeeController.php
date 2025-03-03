<?php

namespace App\Http\Controllers;

use App\Jobs\SendFeeReminder;
use Illuminate\Http\Request;
use App\Models\Fee;
use App\Models\User;
use App\Services\CurrencyConverterService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeeNotification;

/**
 * Class GlobalFeeController
 *
 * Controlador encargado de crear fees globales para todos los usuarios del sistema.
 * Realiza la conversión de divisas individualmente para cada usuario,
 * envía notificaciones por correo y programa recordatorios mensuales.
 *
 * @package App\Http\Controllers
 */
class GlobalFeeController extends Controller
{
    /**
     * Crea fees globales para todos los usuarios.
     *
     * Valida los datos recibidos, recorre todos los usuarios del sistema y
     * crea una fee para cada uno, aplicando conversión de divisa si es necesario.
     * Además, envía una notificación por correo y programa un recordatorio mensual.
     *
     * @param Request $request Datos validados del formulario de creación global.
     * @param CurrencyConverterService $currencyConverter Servicio para la conversión de divisas.
     *
     * @return RedirectResponse Redirección al listado de fees con mensaje de éxito o error.
     */
    public function __invoke(Request $request, CurrencyConverterService $currencyConverter): RedirectResponse
    {
        $validated = $request->validate([
            'concept'   => 'required|string|max:255',
            'import'    => 'required|numeric|min:0',
            'due_date'  => 'required|date',
            'notes'     => 'nullable|string',
        ]);
        $users = User::all();
        foreach ($users as $user) {
            $userCurrency = $user->currency_iso ?? 'eur';
            $convertedAmount = $validated['import'];
            if ($userCurrency !== 'eur') {
                $convertedAmount = $currencyConverter->convert($validated['import'], $userCurrency);

                if ($convertedAmount === null) {
                    return redirect()->back()->with('error', __('Currency conversion failed.'));
                }
            }
            $fee = Fee::create([
                'user_id'      => $user->id,
                'concept'      => $validated['concept'],
                'import'       => $convertedAmount,
                'currency_iso' => $userCurrency !== 'eur' ? $userCurrency : 'eur',
                'due_date'     => $validated['due_date'],
                'notes'        => $validated['notes'] ?? null,
            ]);
            Mail::to($user->email)->send(new FeeNotification($fee));

            $this->scheduleFeeReminder($fee);
        }

        return redirect()->route('fee.index')->with('success', __('Global fees created successfully.'));
    }

    /**
     * Programa un recordatorio mensual para una fee específica.
     *
     * @param Fee $fee Fee para la cual se programa el recordatorio.
     *
     * @return void
     */
    private function scheduleFeeReminder(Fee $fee)
    {
        $job = (new SendFeeReminder($fee))->delay(now()->addMonth());
        dispatch($job);
    }
}
