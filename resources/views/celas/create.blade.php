@extends('layouts.app')

@section('content')
    <div class="mt-1 mb-5">
        <h2 class="text-4xl text-white font-bold text-center">Adicionar Nova Cela</h2>
    </div>

    <form action="{{ route('celas.store') }}" method="POST" class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-xl max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        <!-- Nome da Cela -->
        <div>
            <label for="nome" class="block text-gray-300 font-semibold mb-2">Nome da Cela</label>
            <input
                type="text"
                name="nome"
                id="nome"
                value="{{ old('nome') }}"
                class="mt-2 p-4 w-full rounded-md bg-gray-700 text-white focus:ring-2 focus:ring-indigo-500 transition duration-200
                @error('nome') border-red-500 @else border-gray-600 @enderror"
            >
            @error('nome')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Capacidade -->
        <div>
            <label for="capacidade" class="block text-gray-300 font-semibold mb-2">Capacidade</label>
            <input
                type="number"
                name="capacidade"
                id="capacidade"
                value="{{ old('capacidade') }}"
                class="mt-2 p-4 w-full rounded-md bg-gray-700 text-white focus:ring-2 focus:ring-indigo-500 transition duration-200
                @error('capacidade') border-red-500 @else border-gray-600 @enderror"
                >
            @error('capacidade')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Descrição -->
        <div class="col-span-2">
            <label for="descricao" class="block text-gray-300 font-semibold mb-2">Descrição</label>
            <textarea
                name="descricao"
                id="descricao"
                rows="4"
                class="mt-2 p-4 w-full rounded-md bg-gray-700 text-white focus:ring-2 focus:ring-indigo-500 transition duration-200
                @error('descricao') border-red-500 @else border-gray-600 @enderror">{{ old('descricao') }}</textarea>
            @error('descricao')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botões -->
        <div class="mt-8 flex justify-between gap-6 col-span-2">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                Criar Cela
            </button>

            <a href="{{ route('celas.index') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                Voltar para a Lista
            </a>
        </div>
    </form>
@endsection
