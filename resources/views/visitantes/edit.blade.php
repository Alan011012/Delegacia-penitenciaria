@extends('layouts.app')

@section('content')
    <h2 class="mt-9 text-3xl text-white font-semibold mb-6">Editar Visitante</h2>

    <form action="{{ route('visitantes.update', $visitante->id) }}" method="POST" class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-lg max-w-3xl mx-auto">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="nome" class="block text-white font-semibold mb-2">
                    Nome <span class="text-red-500">*</span>
                </label>
                <input type="text" id="nome" name="nome"
                    class="mt-2 p-4 w-full bg-gray-700 text-white rounded-md focus:ring-2 focus:ring-indigo-500 transition duration-200
                    @error('nome') border border-red-500 @enderror
                    @if(old('nome', $visitante->nome) && !$errors->has('nome')) border border-green-500 @else border border-gray-600 @endif"
                    value="{{ old('nome', $visitante->nome) }}" required>
                @error('nome')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="documento_identidade" class="block text-white font-semibold mb-2">
                    Documento de Identidade <span class="text-red-500">*</span>
                </label>
                <input type="text" id="documento_identidade" name="documento_identidade"
                    class="mt-2 p-4 w-full bg-gray-700 text-white rounded-md focus:ring-2 focus:ring-indigo-500 transition duration-200
                    @error('documento_identidade') border border-red-500 @enderror
                    @if(old('documento_identidade', $visitante->documento_identidade) && !$errors->has('documento_identidade')) border border-green-500 @else border border-gray-600 @endif"
                    value="{{ old('documento_identidade', $visitante->documento_identidade) }}" required>
                @error('documento_identidade')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-between">
            <button type="submit" class="inline-block bg-indigo-600 text-white py-3 px-6 rounded-lg hover:bg-indigo-700 transition duration-300 focus:outline-none focus:ring-4 focus:ring-indigo-500">
                Atualizar Visitante
            </button>
            <a href="{{ route('visitantes.index') }}" class="inline-block bg-gray-600 text-white py-3 px-6 rounded-lg hover:bg-gray-700 transition duration-300 mt-4 ml-4">
                Voltar
            </a>
        </div>
    </form>
@endsection
