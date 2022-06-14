<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'cidade' => 'required|string|min:3|max:127',
            'uf' => 'required|string|min:2|max:2',
            'logradouro' => 'required|string|min:3|max:255',
            'bairro' => 'required|string|min:3|max:127',
            'cep' => 'required|string|min:8|max:8',
            'ddd' => 'required|numeric|max:2',
        ];
    }
}
