<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class ValidDNI
 *
 * Regla de validación personalizada para verificar si un DNI (Documento Nacional de Identidad)
 * es válido según el formato español, que consiste en 8 dígitos seguidos de una letra calculada.
 *
 * @package App\Rules
 */
class ValidDNI implements Rule
{
    /**
     * Verifica si el DNI proporcionado es válido.
     *
     * Comprueba que el formato del DNI sea correcto y que la letra coincida
     * con la calculada a partir del número.
     *
     * @param string $attribute Nombre del atributo que se está validando.
     * @param mixed $value Valor del atributo proporcionado.
     *
     * @return bool True si el DNI es válido, False si no lo es.
     */
    public function passes($attribute, $value)
    {

        $dni = strtoupper(trim($value));


        if (!preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
            return false;
        }


        $numero = substr($dni, 0, 8);
        $letra = substr($dni, -1);


        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $letraCorrecta = $letras[$numero % 23];


        return $letra === $letraCorrecta;
    }

    /**
     * Mensaje de error personalizado.
     *
     * @return string
     */
    public function message()
    {
        return __('The :attribute is not a valid DNI.');
    }
}
