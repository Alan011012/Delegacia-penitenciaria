<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateVisita extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'preso_id' => 'required|exists:presos,id',
            'visitante_id' => 'required|exists:visitantes,id',
            'data_visita' => 'required|date|date_format:Y-m-d\TH:i',
        ];
    }

    public function messages(): array
    {
        return [
            'preso_id.required' => 'O campo "Preso" é obrigatório. Por favor, selecione um preso.',
            'preso_id.exists' => 'O preso selecionado não existe. Verifique se o ID está correto.',
            'visitante_id.required' => 'O campo "Visitante" é obrigatório. Por favor, selecione um visitante.',
            'visitante_id.exists' => 'O visitante selecionado não existe. Verifique se o ID está correto.',
            'data_visita.required' => 'A data da visita é obrigatória. Por favor, forneça a data e hora.',
            'data_visita.date' => 'A data da visita deve ser uma data válida.',
            'data_visita.date_format' => 'O formato da data da visita deve ser no formato correto (ex: 2025-04-16T14:00).',
        ];
    }
}
