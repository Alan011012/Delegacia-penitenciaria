@extends('layouts.app')

@section('content')

    <h2 class="mt-9 text-3xl text-white font-semibold mb-6">Lista de Presos</h2>

    <a href="{{ route('presos.create') }}"
        class="mt-3 inline-block bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition duration-300">
        Adicionar Novo Preso
    </a>

    @if (session('success'))
        <div id="successModal"
            class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-500">
            <div class="bg-gray-900 p-6 rounded-lg shadow-lg w-96 transform transition-all duration-500 scale-75 opacity-0">
                <h3 class="text-xl font-semibold text-white mb-4">{{ session('success') }}</h3>
                <div class="flex justify-center">
                    <button onclick="closeSuccessModal()"
                        class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Fechar</button>
                </div>
            </div>
        </div>
    @endif

    <div class="overflow-x-auto mt-8">
        <table class="min-w-full bg-black text-white rounded-lg shadow-xl overflow-hidden">
            <thead class="bg-gray-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nome</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Data de Nascimento</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Crime</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Data de Condenação</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Cela</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-gray-700">
                @foreach ($presos as $preso)
                    <tr class="hover:bg-gray-500 transition duration-300 ease-in-out">
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-800">{{ $preso->id }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-800">{{ $preso->nome }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-800">
                            {{ \Carbon\Carbon::parse($preso->data_nascimento)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm max-w-xs overflow-hidden text-ellipsis whitespace-nowrap bg-gray-800" style="max-width: 150px;">
                            {{ $preso->crime }}
                        </td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-800">
                            {{ \Carbon\Carbon::parse($preso->data_condenacao)->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-800">
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
                                {{ trim($preso->status) == 'Fugido'
                                    ? 'bg-red-500 text-white'
                                    : (trim($preso->status) == 'Liberado'
                                        ? 'bg-green-500 text-white'
                                        : (trim($preso->status) == 'Preso'
                                            ? 'bg-yellow-500 text-white'
                                            : 'bg-gray-500 text-white')) }}">
                                {{ $preso->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-800">{{ $preso->cela->nome ?? 'Não atribuída' }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-800">
                            <div class="flex space-x-3">
                                <a href="{{ route('presos.edit', $preso->id) }}"
                                    class="text-blue-500 hover:text-blue-700 font-semibold transition duration-300">Editar</a>
                                <span class="text-gray-400">|</span>
                                <button onclick="openDeleteModal({{ $preso->id }})"
                                    class="text-red-500 hover:text-red-700 font-semibold transition duration-300">Excluir</button>

                                <form id="delete-form-{{ $preso->id }}"
                                    action="{{ route('presos.destroy', $preso->id) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="deleteModal"
        class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-500">
        <div class="bg-gray-900 p-6 rounded-lg shadow-lg w-96 transform transition-all duration-500 scale-75 opacity-0">
            <h3 class="text-xl font-semibold text-white mb-4">Tem certeza que deseja excluir este preso?</h3>
            <div class="flex justify-between">
                <button onclick="closeDeleteModal()"
                    class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancelar</button>
                <button id="confirmDeleteBtn"
                    class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Excluir</button>
            </div>
        </div>
    </div>

    <script>
        @if (session('success'))
            const successModal = document.getElementById('successModal');
            const successModalContent = successModal.querySelector('div');
            successModal.classList.remove('opacity-0', 'pointer-events-none');
            successModal.classList.add('opacity-100', 'pointer-events-auto');
            successModalContent.classList.remove('scale-75', 'opacity-0');
            successModalContent.classList.add('scale-100', 'opacity-100');
        @endif

        function closeSuccessModal() {
            const successModal = document.getElementById('successModal');
            const successModalContent = successModal.querySelector('div');
            successModal.classList.add('opacity-0', 'pointer-events-none');
            successModal.classList.remove('opacity-100', 'pointer-events-auto');
            successModalContent.classList.add('scale-75', 'opacity-0');
            successModalContent.classList.remove('scale-100', 'opacity-100');
        }

        function openDeleteModal(presoId) {
            const modal = document.getElementById('deleteModal');
            const modalContent = modal.querySelector('div');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100', 'pointer-events-auto');
            modalContent.classList.remove('scale-75', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');

            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
            confirmDeleteBtn.onclick = function() {
                document.getElementById('delete-form-' + presoId).submit();
            }
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const modalContent = modal.querySelector('div');
            modal.classList.add('opacity-0', 'pointer-events-none');
            modal.classList.remove('opacity-100', 'pointer-events-auto');
            modalContent.classList.add('scale-75', 'opacity-0');
            modalContent.classList.remove('scale-100', 'opacity-100');
        }
    </script>

@endsection
