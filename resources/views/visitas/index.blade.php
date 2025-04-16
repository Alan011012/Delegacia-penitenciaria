@extends('layouts.app')

@section('content')

    <h2 class="mt-9 text-3xl text-white font-semibold mb-6">Lista de Visitas</h2>

    <a href="{{ route('visitas.create') }}" class="mt-3 inline-block bg-gray-600 text-white py-2 px-4 rounded-lg hover:bg-gray-700 hover:bg-yellow-600 transition duration-300">
        Agendar Nova Visita
    </a>

    <div class="overflow-x-auto mt-8">
        <table class="min-w-full bg-black text-white rounded-lg shadow-xl overflow-hidden">
            <thead class="bg-gray-600 text-white rounded-t-lg">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold">ID</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Preso</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Visitante</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Data da Visita</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-gray-700">
                @foreach ($visitas as $visita)
                    <tr class="hover:bg-gray-600 border-b border-gray-600 rounded-lg">
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-800">{{ $visita->id }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-800">{{ $visita->preso->nome }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-800">{{ $visita->visitante->nome }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-800">{{ $visita->data_visita->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4 text-sm whitespace-nowrap bg-gray-800">
                            <div class="flex space-x-4">
                                <a href="{{ route('visitas.edit', $visita->id) }}" class="text-blue-500 hover:text-blue-700 font-semibold transition duration-300">
                                    Editar
                                </a>
                                <span class="text-gray-400">|</span>
                                <button onclick="openDeleteModal({{ $visita->id }})" class="text-red-500 hover:text-red-700 font-semibold">
                                    Excluir
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal de Exclusão -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50 transition duration-300">
        <div id="modalContent" class="bg-gray-900 p-6 rounded-lg shadow-lg w-96 transform transition duration-300 opacity-0 scale-95">
            <h3 class="text-lg font-semibold text-white">Tem certeza que deseja excluir esta visita?</h3>
            <div class="mt-4 flex justify-between">
                <button onclick="closeDeleteModal()" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                    Cancelar
                </button>
                <form id="deleteForm" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function openDeleteModal(visitaId) {
            const modal = document.getElementById('deleteModal');
            const modalContent = document.getElementById('modalContent');

            document.getElementById('deleteForm').action = '/visitas/' + visitaId;

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            setTimeout(() => {
                modalContent.classList.remove('opacity-0', 'scale-95');
                modalContent.classList.add('opacity-100', 'scale-100');
            }, 50);
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const modalContent = document.getElementById('modalContent');

            modalContent.classList.remove('opacity-100', 'scale-100');
            modalContent.classList.add('opacity-0', 'scale-95');

            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }, 300);
        }
    </script>

@endsection
