<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'onda' => 'required|integer',
            'notaParcial1' => 'required|double',
            'notaParcial2' => 'required|double',
            'notaParcial3' => 'required|double',
            
        ];
    }
}
