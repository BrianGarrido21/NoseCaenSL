<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

/**
 * Class CurrencyConverterService
 *
 * Servicio encargado de realizar conversiones de divisas a EUR (Euro)
 * utilizando una API externa. Además, almacena las tasas de cambio
 * en caché durante 1 hora para optimizar el rendimiento.
 *
 * @package App\Services
 */
class CurrencyConverterService
{
    /**
     * URL de la API que proporciona las tasas de cambio.
     *
     * @var string
     */
    protected string $apiUrl = 'https://latest.currency-api.pages.dev/v1/currencies/eur.json';

    /**
     * Convierte un monto de una moneda específica a EUR.
     *
     * Si no se puede obtener la tasa de cambio, retorna null.
     *
     * @param float $amount Monto a convertir.
     * @param string $from Código de la moneda de origen (por ejemplo, "USD").
     * @return float|null Monto convertido a EUR o null si falla la conversión.
     */
    public function convert(float $amount, string $from): ?float
    {
        $rate = $this->getExchangeRate($from);

        if ($rate === null) {
            return null;
        }

        return round($amount * $rate, 2);
    }

    /**
     * Obtiene la tasa de cambio de una moneda a EUR.
     *
     * Almacena la tasa en caché por 1 hora para evitar solicitudes repetidas a la API.
     * Si la API no responde correctamente, retorna null.
     *
     * @param string $from Código de la moneda de origen.
     * @return float|null Tasa de cambio a EUR o null si no se puede obtener.
     */
    private function getExchangeRate(string $from): ?float
    {
        $cacheKey = "exchange_rate_{$from}_eur";

        return Cache::remember($cacheKey, now()->addHours(1), function () use ($from) {
            $response = Http::get($this->apiUrl);

            if ($response->failed()) {
                return null;
            }

            $rates = $response->json('eur');

            return $rates[strtolower($from)] ?? null;
        });
    }
}
