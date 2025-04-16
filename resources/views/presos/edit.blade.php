@extends('layouts.app')

@section('content')
    <h2 class="mt-1 text-3xl text-white font-semibold mb-5">Editar Preso</h2>

    <form action="{{ route('presos.update', $preso->id) }}" method="POST" class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-lg max-w-5xl mx-auto mt-0">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="nome" class="block text-white font-semibold mb-2">
                    Nome <span class="text-red-500">*</span>
                </label>
                <input type="text" name="nome" id="nome" class="mt-2 p-4 w-full bg-gray-700 text-white rounded-md transition duration-200
                    @error('nome') border border-red-500 @enderror
                    @if(old('nome', $preso->nome) && !$errors->has('nome')) border border-green-500 @endif"
                    value="{{ old('nome', $preso->nome) }}" required>
                @error('nome')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="documento_identidade" class="block text-white font-semibold mb-2">
                    Documento de Identidade <span class="text-red-500">*</span>
                </label>
                <input type="text" name="documento_identidade" id="documento_identidade" class="mt-2 p-4 w-full bg-gray-700 text-white rounded-md transition duration-200
                    @error('documento_identidade') border border-red-500 @enderror
                    @if(old('documento_identidade', $preso->documento_identidade) && !$errors->has('documento_identidade')) border border-green-500 @endif"
                    value="{{ old('documento_identidade', $preso->documento_identidade) }}" required>
                @error('documento_identidade')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="data_nascimento" class="block text-white font-semibold mb-2">
                    Data de Nascimento <span class="text-red-500">*</span>
                </label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="mt-2 p-4 w-full bg-gray-700 text-white rounded-md transition duration-200
                    @error('data_nascimento') border border-red-500 @enderror
                    @if(old('data_nascimento', $preso->data_nascimento) && !$errors->has('data_nascimento')) border border-green-500 @endif"
                    value="{{ old('data_nascimento', $preso->data_nascimento) }}" required>
                @error('data_nascimento')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="crime" class="block text-white font-semibold mb-2">
                    Crime <span class="text-red-500">*</span>
                </label>
                <input type="text" name="crime" id="crime" class="mt-2 p-4 w-full bg-gray-700 text-white rounded-md transition duration-200
                    @error('crime') border border-red-500 @enderror
                    @if(old('crime', $preso->crime) && !$errors->has('crime')) border border-green-500 @endif"
                    value="{{ old('crime', $preso->crime) }}" required>
                @error('crime')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div>
                <label for="data_condenacao" class="block text-white font-semibold mb-2">
                    Data de Condenação <span class="text-red-500">*</span>
                </label>
                <input type="date" name="data_condenacao" id="data_condenacao" class="mt-2 p-4 w-full bg-gray-700 text-white rounded-md transition duration-200
                    @error('data_condenacao') border border-red-500 @enderror
                    @if(old('data_condenacao', $preso->data_condenacao) && !$errors->has('data_condenacao')) border border-green-500 @endif"
                    value="{{ old('data_condenacao', $preso->data_condenacao) }}" required>
                @error('data_condenacao')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="status" class="block text-white font-semibold mb-2">
                    Status <span class="text-red-500">*</span>
                </label>
                <select name="status" id="status" class="mt-2 p-4 w-full bg-gray-700 text-white rounded-md transition duration-200
                    @error('status') border border-red-500 @enderror
                    @if(old('status', $preso->status) && !$errors->has('status')) border border-green-500 @endif" required>
                    <option value="Detido" {{ $preso->status == 'Detido' ? 'selected' : '' }}>Detido</option>
                    <option value="Liberado" {{ $preso->status == 'Liberado' ? 'selected' : '' }}>Liberado</option>
                    <option value="Fugido" {{ $preso->status == 'Fugido' ? 'selected' : '' }}>Fugido</option>
                </select>
                @error('status')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label for="cela_id" class="block text-white font-semibold mb-2">
                Cela <span class="text-red-500">*</span>
            </label>
            <select name="cela_id" id="cela_id" class="mt-2 p-4 w-full bg-gray-700 text-white rounded-md transition duration-200
                @error('cela_id') border border-red-500 @enderror
                @if(old('cela_id', $preso->cela_id) && !$errors->has('cela_id')) border border-green-500 @endif" required>
                <option value="" disabled>Selecione a Cela</option>
                @foreach ($celas as $cela)
                    <option value="{{ $cela->id }}" {{ $cela->id == $preso->cela_id ? 'selected' : '' }}>
                        {{ $cela->nome }} (Capacidade: {{ $cela->capacidade }})
                    </option>
                @endforeach
            </select>
            @error('cela_id')
                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-6 flex justify-between">
            <button type="submit" class="bg-indigo-600 text-white px-8 py-3 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                Atualizar Preso
            </button>
            <a href="{{ route('presos.index') }}" class="bg-gray-500 text-white px-8 py-3 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200">
                Voltar
            </a>
        </div>
    </form>
@endsection
