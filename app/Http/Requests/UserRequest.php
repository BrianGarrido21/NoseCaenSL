<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a hacer esta petición.
     */
    public function authorize(): bool
    {
        return true; // Cambia esto según tus políticas de acceso
    }

    /**
     * Reglas de validación para la creación y actualización de un usuario.
     */
    public function rules(): array
    {
        return [
            'cif' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'cif')->ignore($this->user)
            ],
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user)
            ],
            'credit_card' => [
                'required',
                'string',
                'regex:/^[0-9]{13,19}$/',
            ],
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'country_id' => 'required|exists:paises,id',
        ];
    }
}
