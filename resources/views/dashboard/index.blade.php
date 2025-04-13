<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-gray-200 font-sans">

    <div class="bg-black text-white p-4 fixed w-full top-0 left-0 z-10">
        <div class="flex justify-between items-center">
            <div class="text-lg font-semibold text-yellow-400">
                Delegacia
            </div>

            <div class="flex items-center space-x-6">
                <span
                    class="text-lg font-semibold bg-yellow-500 text-black px-4 py-2 rounded-full shadow-lg hover:bg-yellow-600 transition duration-300 ease-in-out">
                    Bem-vindo
                    {{ auth()->user()->name }}
                </span>
                <div class="relative">
                    <button id="dropdownButton"
                        class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded-lg focus:outline-none">
                        Opções
                    </button>
                    <div id="dropdownMenu"
                        class="dropdown-content absolute right-0 hidden bg-gray-700 text-white text-sm rounded-lg shadow-lg mt-2 w-48 hover:bg-red-500">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block py-2 px-4 hover:text-white rounded-md transition duration-300 ease-in-out">
                                Sair
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('#dropdownButton').addEventListener('click', function () {
            const dropdown = document.querySelector('#dropdownMenu');
            dropdown.classList.toggle('hidden');
        });
    </script>

    <div class="flex mt-16">
        <div class="w-64 h-screen bg-black text-white fixed top-0 left-0 shadow-xl transition-transform ease-in-out">
            <div class="px-6 py-4 border-b border-gray-800 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-white">Delegacia</h2>
            </div>
            <div class="space-y-6 mt-8">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center py-3 px-4 text-sm text-gray-200 hover:bg-yellow-600 hover:text-black rounded-md transition duration-200 ease-in-out">
                    Inicio
                </a>
                <a href="{{ route('presos.index') }}"
                    class="flex items-center py-3 px-4 text-sm text-gray-200 hover:bg-yellow-600 hover:text-black rounded-md transition duration-200 ease-in-out">
                    Presos
                </a>
                <a href="{{ route('celas.index') }}"
                    class="flex items-center py-3 px-4 text-sm text-gray-200 hover:bg-yellow-600 hover:text-black rounded-md transition duration-200 ease-in-out">
                    Celas
                </a>
                <a href="{{ route('visitas.index') }}"
                    class="flex items-center py-3 px-4 text-sm text-gray-200 hover:bg-yellow-600 hover:text-black rounded-md transition duration-200 ease-in-out">
                    Visitas
                </a>
                <a href="{{ route('visitantes.index') }}"
                    class="flex items-center py-3 px-4 text-sm text-gray-200 hover:bg-yellow-600 hover:text-black rounded-md transition duration-200 ease-in-out">
                    Visitantes
                </a>
            </div>
        </div>

        <div class="flex-1 ml-64 h-screen bg-gray-800 p-5 pt-16 overflow-y-auto border-l border-gray-700">
            <div class="bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg transition-shadow duration-300">
                <div class="p-6 text-gray-900">
                    <h2 class="text-4xl font-extrabold text-white mb-6">{{ __("Você está logado!") }}</h2>
                    <p class="text-lg text-gray-400 mb-8">Bem-vindo ao painel administrativo da delegacia. Aqui você
                        pode gerenciar todas as informações importantes com eficiência e rapidez.</p>

                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                        <a href="{{ route('presos.index') }}"
                            class="bg-yellow-400 text-black p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 hover:translate-y-2">
                            <h3 class="text-xl font-semibold mb-4">Total de Presos</h3>
                            <p class="text-5xl font-extrabold">{{ $quantidadePresos }}</p>
                            <div class="mt-6 flex items-center space-x-2 text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 10l4 4m0 0l4-4m-4 4l-4 4m4-4V6m-4 4V6m-6 12V9m6 3h6a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h6">
                                    </path>
                                </svg>
                                <span class="text-lg">Atualizado</span>
                            </div>
                        </a>

                        <a href="{{ route('celas.index') }}"
                            class="bg-gray-800 text-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 hover:translate-y-2">
                            <h3 class="text-xl font-semibold mb-4">Total de Celas</h3>
                            <p class="text-5xl font-extrabold">{{ $quantidadeCelas }}</p>
                            <div class="mt-6 flex items-center space-x-2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12h18M3 6h18M3 18h18"></path>
                                </svg>
                                <span class="text-lg">Atualizado</span>
                            </div>
                        </a>

                        <a href="{{ route('visitas.index') }}"
                            class="bg-yellow-400 text-black p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 hover:translate-y-2">
                            <h3 class="text-xl font-semibold mb-4">Total de Visitas</h3>
                            <p class="text-5xl font-extrabold">{{ $quantidadeVisitas }}</p>
                            <div class="mt-6 flex items-center space-x-2 text-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 10l4 4m0 0l4-4m-4 4l-4 4m4-4V6m-4 4V6m-6 12V9m6 3h6a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h6">
                                    </path>
                                </svg>
                                <span class="text-lg">Excelente</span>
                            </div>
                        </a>

                        <a href="{{ route('visitantes.index') }}"
                            class="bg-black text-white p-8 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 hover:translate-y-2">
                            <h3 class="text-xl font-semibold mb-4">Visitantes</h3>
                            <p class="text-5xl font-extrabold">{{ $quantidadeVisitantes }}</p>
                            <div class="mt-6 flex items-center space-x-2 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 3h8a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-8"></path>
                                </svg>
                                <span class="text-lg">Excelente</span>
                            </div>
                        </a>

                    </div>

                    <div class="mt-16 bg-red-600 text-white text-center py-2 font-semibold text-xl">
                        Aviso Importante: O sistema de registros de visitantes será atualizado em breve!
                    </div>

                    <!-- Área de Notificações -->
                    <div class="mt-8 p-4 bg-gray-800 text-center rounded-lg shadow-xl">
                        <h3 class="text-2xl font-bold text-white mb-2">Notificações</h3>
                        <ul class="list-disc list-inside text-lg text-gray-300">
                            <li>Registro de novo visitante realizado com sucesso.</li>
                            <li>A célula 23 foi inspecionada e está liberada.</li>
                            <li>Manutenção programada no sistema para atualização de dados, agendada para amanhã, das 2h
                                às 4h.</li>
                            <li>Aviso: O controle de entrada e saída de visitantes foi atualizado. Por favor, verifique
                                os novos procedimentos.</li>
                        </ul>
                    </div>

                    <footer class="mt-16 text-center text-gray-400">
                        <p>&copy; 2025 Delegacia XYZ. Todos os direitos reservados.</p>
                    </footer>
                </div>
            </div>
        </div>

</body>

</html>