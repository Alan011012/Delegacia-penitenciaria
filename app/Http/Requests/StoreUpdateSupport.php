<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSupport extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->routeIs('presos.*')) {
            return [
                'nome' => [
                    'required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'
                ],
                'documento_identidade' => [
                    'required', 'string', 'max:255',
                    'unique:presos,documento_identidade,' . $this->id
                ],
                'data_nascimento' => ['required', 'date'],
                'crime' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
                'data_condenacao' => ['required', 'date', 'after_or_equal:data_nascimento'],
                'status' => ['required', 'string', 'in:Detido,Liberado,Fugido'],
                'cela_id' => ['required', 'exists:celas,id'],
            ];
        }

        if ($this->routeIs('celas.*')) {
            return [
                'nome' => ['required', 'string', 'max:255', 'regex:/^[\pL\s\-0-9]+$/u'],
                'capacidade' => ['required', 'integer', 'min:1', 'max:1000'],
                'descricao' => ['nullable', 'string', 'max:1000'],
            ];
        }

        return [];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.regex' => 'O nome deve conter apenas letras, espaços ou hífens.',
            'documento_identidade.required' => 'O documento de identidade é obrigatório.',
            'documento_identidade.unique' => 'Este documento de identidade já está cadastrado.',
            'data_nascimento.required' => 'A data de nascimento é obrigatória.',
            'data_nascimento.date' => 'Informe uma data de nascimento válida.',
            'crime.required' => 'O crime é obrigatório.',
            'crime.regex' => 'O campo de crime deve conter apenas letras, espaços ou hífens.',
            'data_condenacao.required' => 'A data de condenação é obrigatória.',
            'data_condenacao.after_or_equal' => 'A data de condenação deve ser igual ou posterior à data de nascimento.',
            'status.required' => 'O status é obrigatório.',
            'status.in' => 'O status deve ser Detido, Liberado ou Fugido.',
            'cela_id.required' => 'A cela é obrigatória.',
            'cela_id.exists' => 'A cela selecionada não existe.',

            'capacidade.required' => 'A capacidade é obrigatória.',
            'capacidade.integer' => 'A capacidade deve ser um número inteiro.',
            'capacidade.min' => 'A capacidade deve ser no mínimo 1.',
            'capacidade.max' => 'A capacidade não pode exceder 1000.',
            'descricao.max' => 'A descrição não pode exceder 1000 caracteres.',
            'descricao.string' => 'A descrição deve ser um texto.',
        ];
    }
}
