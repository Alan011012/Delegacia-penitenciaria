@extends('layouts.app')

@section('content')
    <div class="mt-12 mb-6">
        <h2 class="text-4xl text-white font-bold text-center">{{ isset($visita) ? 'Editar' : 'Adicionar' }} Visita</h2>
    </div>

    <form action="{{ isset($visita) ? route('visitas.update', $visita->id) : route('visitas.store') }}" method="POST" class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-xl max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf
        @if(isset($visita))
            @method('PUT')
        @endif

        <!-- Preso -->
        <div>
            <label for="preso_id" class="block text-gray-300 font-semibold mb-2">
                Preso <span class="text-red-500">*</span>
            </label>
            <select name="preso_id" id="preso_id" class="w-full px-4 py-3 bg-gray-700 text-white rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @foreach ($presos as $preso)
                    <option value="{{ $preso->id }}" {{ isset($visita) && $visita->preso_id == $preso->id ? 'selected' : '' }}>
                        {{ $preso->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Visitante -->
        <div>
            <label for="visitante_id" class="block text-gray-300 font-semibold mb-2">
                Visitante <span class="text-red-500">*</span>
            </label>
            <select name="visitante_id" id="visitante_id" class="w-full px-4 py-3 bg-gray-700 text-white rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                @foreach ($visitantes as $visitante)
                    <option value="{{ $visitante->id }}" {{ isset($visita) && $visita->visitante_id == $visitante->id ? 'selected' : '' }}>
                        {{ $visitante->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Data da Visita -->
        <div>
            <label for="data_visita" class="block text-gray-300 font-semibold mb-2">
                Data da Visita <span class="text-red-500">*</span>
            </label>
            <input
                type="datetime-local"
                name="data_visita"
                id="data_visita"
                class="w-full px-4 py-3 bg-gray-700 text-white rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                value="{{ isset($visita) ? $visita->data_visita->format('Y-m-d\TH:i') : old('data_visita') }}"
                required
            >
        </div>

        <!-- Botões -->
        <div class="mt-8 flex justify-between gap-6 col-span-2">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                {{ isset($visita) ? 'Atualizar' : 'Salvar' }} Visita
            </button>

            <a href="{{ route('visitas.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                Voltar
            </a>
        </div>
    </form>
@endsection
