<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'concept' => 'required|string|max:255',
            'import' => 'required|numeric|min:0',
            'due_date' => 'required|date|after_or_equal:today',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
