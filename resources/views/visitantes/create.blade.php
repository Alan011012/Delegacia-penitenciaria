@extends('layouts.app')

@section('content')
    <div class="mt-12 mb-6">
        <h2 class="text-4xl text-white font-bold text-center">Adicionar Novo Visitante</h2>
    </div>

    <form action="{{ route('visitantes.store') }}" method="POST" class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-xl max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        <div>
            <label for="nome" class="block text-gray-300 font-semibold mb-2">
                Nome <span class="text-red-500">*</span>
            </label>
            <input type="text" id="nome" name="nome" 
                class="mt-2 p-4 w-full bg-gray-700 text-white rounded-md focus:ring-2 focus:ring-indigo-500 transition duration-200
                @error('nome') border border-red-500 @enderror
                @if(old('nome') && !$errors->has('nome')) border border-green-500 @else border border-gray-600 @endif"
                value="{{ old('nome') }}" required>
            @error('nome')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="documento_identidade" class="block text-gray-300 font-semibold mb-2">
                Documento de Identidade <span class="text-red-500">*</span>
            </label>
            <input type="text" id="documento_identidade" name="documento_identidade" 
                class="mt-2 p-4 w-full bg-gray-700 text-white rounded-md focus:ring-2 focus:ring-indigo-500 transition duration-200
                @error('documento_identidade') border border-red-500 @enderror
                @if(old('documento_identidade') && !$errors->has('documento_identidade')) border border-green-500 @else border border-gray-600 @endif"
                value="{{ old('documento_identidade') }}" required>
            @error('documento_identidade')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-8 flex justify-between gap-6 col-span-2">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                Salvar Visitante
            </button>
            <a href="{{ route('visitantes.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                Voltar
            </a>
        </div>
    </form>
@endsection
