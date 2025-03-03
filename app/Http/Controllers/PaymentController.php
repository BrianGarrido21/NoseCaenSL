<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

class PaymentController extends Controller
{
    private $client;

    public function __construct()
    {
        $paypalConfig = Config::get('paypal');
        $environment = new SandboxEnvironment(
            $paypalConfig['client_id'],
            $paypalConfig['secret']
        );
        $this->client = new PayPalHttpClient($environment);
    }

    public function payWithPayPal(Fee $fee)
    {
        $importeFormateado = number_format((float)$fee->import, 2, '.', '');
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "amount" => [
                    "currency_code" => "EUR",
                    "value" => $importeFormateado
                ],
                "description" => 'Pago de la factura #' . $fee->id . ' - ' . $fee->concept
            ]],
            "application_context" => [
                "cancel_url" => url('/paypal/failed'),
                "return_url" => url('/paypal/status')
            ]
        ];

        try {
            $response = $this->client->execute($request);
            foreach ($response->result->links as $link) {
                if ($link->rel === 'approve') {
                    $fee->update(['is_paid' => true]);
                    return redirect()->away($link->href);
                }
            }
            throw new \Exception('No se encontró la URL de aprobación.');
        } catch (\Exception $e) {
            \Log::error('Error creando la orden PayPal: ' . $e->getMessage());
            return redirect()->route('paypal.failed')->with('status', 'Error al crear el pago: ' . $e->getMessage());
        }
    }
}
