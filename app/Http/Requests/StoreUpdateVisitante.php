<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateVisitante extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'nome' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\s\-]+$/u',
            ],
            'documento_identidade' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-z0-9\-\.]+$/',
                'unique:visitantes,documento_identidade' . ($id ? ",$id" : ''),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres.',
            'nome.regex' => 'O nome deve conter apenas letras e espaços.',

            'documento_identidade.required' => 'O documento de identidade é obrigatório.',
            'documento_identidade.max' => 'O documento não pode ter mais que 255 caracteres.',
            'documento_identidade.regex' => 'O documento deve conter apenas letras, números, pontos ou hífens.',
            'documento_identidade.unique' => 'Este documento já está cadastrado.',
        ];
    }
}
