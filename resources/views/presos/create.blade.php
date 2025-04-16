@extends('layouts.app')

@section('content')
    <div class="mt-7 mb-2">
        <h2 class="text-4xl text-white font-bold text-center">Adicionar Novo Preso</h2>
    </div>

    <form action="{{ route('presos.store') }}" method="POST"
        class="space-y-6 bg-gray-800 p-1 rounded-lg shadow-xl max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        <!-- Nome -->
        <div>
            <label for="nome" class="block text-gray-300 font-semibold mb-2">Nome <span class="text-red-500">*</span></label>
            <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
                class="mt-2 p-4 w-full rounded-md bg-gray-700 text-white transition duration-200
                @error('nome') border border-red-500 @else border border-gray-600 @enderror">
            @error('nome')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Documento de Identidade -->
        <div>
            <label for="documento_identidade" class="block text-gray-300 font-semibold mb-2">Documento de Identidade <span class="text-red-500">*</span></label>
            <input type="text" name="documento_identidade" id="documento_identidade"
                value="{{ old('documento_identidade') }}"
                class="mt-2 p-4 w-full rounded-md bg-gray-700 text-white transition duration-200
                @error('documento_identidade') border border-red-500 @else border border-gray-600 @enderror">
            @error('documento_identidade')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Data de Nascimento -->
        <div>
            <label for="data_nascimento" class="block text-gray-300 font-semibold mb-2">Data de Nascimento <span class="text-red-500">*</span></label>
            <input type="date" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}"
                class="mt-2 p-4 w-full rounded-md bg-gray-700 text-white transition duration-200
                @error('data_nascimento') border border-red-500 @else border border-gray-600 @enderror">
            @error('data_nascimento')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Crime -->
        <div>
            <label for="crime" class="block text-gray-300 font-semibold mb-2">Crime <span class="text-red-500">*</span></label>
            <input type="text" name="crime" id="crime" value="{{ old('crime') }}"
                class="mt-2 p-4 w-full rounded-md bg-gray-700 text-white transition duration-200
                @error('crime') border border-red-500 @else border border-gray-600 @enderror">
            @error('crime')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Data de Condenação -->
        <div>
            <label for="data_condenacao" class="block text-gray-300 font-semibold mb-2">Data de Condenação <span class="text-red-500">*</span></label>
            <input type="date" name="data_condenacao" id="data_condenacao" value="{{ old('data_condenacao') }}"
                class="mt-2 p-4 w-full rounded-md bg-gray-700 text-white transition duration-200
                @error('data_condenacao') border border-red-500 @else border border-gray-600 @enderror">
            @error('data_condenacao')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-gray-300 font-semibold mb-2">Status <span class="text-red-500">*</span></label>
            <select name="status" id="status"
                class="mt-2 p-4 w-full rounded-md bg-gray-700 text-white transition duration-200
                @error('status') border border-red-500 @else border border-gray-600 @enderror">
                <option value="" disabled {{ old('status') ? '' : 'selected' }}>Selecione o Status</option>
                <option value="Detido" {{ old('status') == 'Detido' ? 'selected' : '' }}>Detido</option>
                <option value="Liberado" {{ old('status') == 'Liberado' ? 'selected' : '' }}>Liberado</option>
                <option value="Fugido" {{ old('status') == 'Fugido' ? 'selected' : '' }}>Fugido</option>
            </select>
            @error('status')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Cela -->
        <div>
            <label for="cela_id" class="block text-gray-300 font-semibold mb-2">Cela <span class="text-red-500">*</span></label>
            <select name="cela_id" id="cela_id"
                class="mt-2 p-4 w-full rounded-md bg-gray-700 text-white transition duration-200
                @error('cela_id') border border-red-500 @else border border-gray-600 @enderror">
                <option value="" disabled {{ old('cela_id') ? '' : 'selected' }}>Selecione a Cela</option>
                @foreach ($celas as $cela)
                    <option value="{{ $cela->id }}" {{ old('cela_id') == $cela->id ? 'selected' : '' }}>
                        {{ $cela->nome }} (Capacidade: {{ $cela->capacidade }})
                    </option>
                @endforeach
            </select>
            @error('cela_id')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Botões -->
        <div class="mt-8 flex justify-between gap-6 col-span-2">
            <button type="submit"
                class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 focus:outline-none transition duration-200">
                Criar Preso
            </button>

            <a href="{{ route('presos.index') }}"
                class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 focus:outline-none transition duration-200">
                Voltar
            </a>
        </div>
    </form>
@endsection
