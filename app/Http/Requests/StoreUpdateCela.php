<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCela extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => [
                'required',
                'string',
                'max:255',
                'regex:/^[\pL\s\-0-9]+$/u',
            ],
            'capacidade' => [
                'required',
                'integer',
                'min:1',
                'max:1000',
            ],
            'descricao' => [
                'required',
                'string',
                'max:1000',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome da cela é obrigatório.',
            'nome.string' => 'O nome deve ser um texto.',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres.',
            'nome.regex' => 'O nome deve conter apenas letras, números, espaços ou hífens.',

            'capacidade.required' => 'A capacidade da cela é obrigatória.',
            'capacidade.integer' => 'A capacidade deve ser um número inteiro.',
            'capacidade.min' => 'A capacidade deve ser no mínimo 1.',
            'capacidade.max' => 'A capacidade não pode exceder 1000.',

            'descricao.required' => 'A descrição da cela é obrigatória.',
            'descricao.string' => 'A descrição deve ser um texto.',
            'descricao.max' => 'A descrição não pode passar de 1000 caracteres.',
        ];
    }
}
