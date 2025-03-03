<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Cambiar según lógica de autorización
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'currency' => 'required|string|size:3',
            'total_amount' => 'required|numeric|min:0',
            'exchange_rate' => 'nullable|numeric|min:0',
            'amount_eur' => 'nullable|numeric|min:0',
            'paid_at' => 'nullable|date',
            'is_paid' => 'required|boolean',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
