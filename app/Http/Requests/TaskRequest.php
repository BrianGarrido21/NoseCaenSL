<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'postal_code' => 'required|numeric|digits:5',
            'province_id' => 'required|exists:tbl_provincias,cod',
            'address' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:1000',
        ];
    }
    
}
