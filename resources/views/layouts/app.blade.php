<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Presos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body class="bg-black text-white">

    <!-- Navbar -->
    <nav class="bg-black text-white shadow-md fixed w-full z-10 top-0 border-b border-gray-700">
        <div class="flex justify-between items-center p-4 px-6">
            <h2 class="text-xl font-bold text-yellow-400">Delegacia</h2>
            <button class="lg:hidden text-white">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 h-screen bg-black text-white fixed top-0 left-0 pt-16 border-r border-gray-800">
            <div class="px-6 py-4 border-b border-gray-800">
                <h2 class="text-lg font-semibold text-center text-yellow-400">Painel Administrativo</h2>
            </div>
            <div class="space-y-4 mt-6 px-4">
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded-md text-gray-300 hover:text-yellow-400 hover:bg-gray-800 transition">
                    Início
                </a>
                <a href="{{ route('presos.index') }}" class="block py-2 px-4 rounded-md text-gray-300 hover:text-yellow-400 hover:bg-gray-800 transition">
                    Presos
                </a>
                <a href="{{ route('celas.index') }}" class="block py-2 px-4 rounded-md text-gray-300 hover:text-yellow-400 hover:bg-gray-800 transition">
                    Celas
                </a>
                <a href="{{ route('visitas.index') }}" class="block py-2 px-4 rounded-md text-gray-300 hover:text-yellow-400 hover:bg-gray-800 transition">
                    Visitas
                </a>
                <a href="{{ route('visitantes.index') }}" class="block py-2 px-4 rounded-md text-gray-300 hover:text-yellow-400 hover:bg-gray-800 transition">
                    Visitantes
                </a>
            </div>
        </div>

        <!-- Conteúdo Principal -->
        <main class="flex-1 ml-64 pt-20 pb-20 px-6 bg-black min-h-screen border-l border-gray-700">
            @yield('content')
        </main>
    </div>

    <!-- Rodapé fixo -->
    <footer class="fixed bottom-0 left-64 right-0 bg-gray-900 border-t border-gray-700 text-center text-sm text-gray-400 py-3 z-10">
        &copy; {{ now()->year }} Sistema de Gestão Penitenciária — Todos os direitos reservados.
    </footer>

</body>
</html>
