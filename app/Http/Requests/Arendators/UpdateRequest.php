<?php

namespace App\Http\Requests\Arendators;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'id' => 'integer',
            'name' => 'string',
            'history_operations' => 'string',
            'history_arends' => 'string',
            'money' => 'decimal',
            'status' => 'string'
        ];
    }
}
