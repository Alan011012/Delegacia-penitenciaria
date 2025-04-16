<x-guest-layout>
    <!-- Container de fundo para toda a tela -->
    <div class="flex justify-center items-center min-h-screen bg-black bg-opacity-60">
        <!-- Formulário Centralizado -->
        <div class="w-full max-w-md bg-gray-800 bg-opacity-80 p-6 rounded-lg shadow-lg mx-auto">
            <h2 class="text-3xl text-white font-semibold text-center mb-4">Registrar-se</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Nome -->
                <div>
                    <x-input-label for="name" :value="__('Nome')" class="text-white text-sm" />
                    <x-text-input id="name" class="input-field" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="error-message" />
                </div>

                <!-- E-mail -->
                <div>
                    <x-input-label for="email" :value="__('E-mail')" class="text-white text-sm" />
                    <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <!-- Senha -->
                <div>
                    <x-input-label for="password" :value="__('Senha')" class="text-white text-sm" />
                    <x-text-input id="password" class="input-field" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>

                <!-- Confirmar Senha -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" class="text-white text-sm" />
                    <x-text-input id="password_confirmation" class="input-field" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
                </div>

                <!-- Links e botão -->
                <div class="flex justify-between items-center mt-2"> <!-- Ajuste a margem superior do botão -->
                    <!-- Link para login -->
                    <a class="text-white hover:text-indigo-400 text-sm" href="{{ route('login') }}">
                        {{ __('Já possui uma conta? Entre') }}
                    </a>

                    <x-primary-button class="button mt-3"> <!-- Ajuste a margem superior do botão -->
                        {{ __('Registrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

<!-- CSS -->
<style>
    /* Estilos gerais */
    body {
        font-family: Arial, sans-serif;
        background-color: #1d1d1d;
        color: #fff;
        margin: 0;
        padding: 0;
    }

    /* Container principal do registro */
    .flex {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: rgba(0, 0, 0, 0.6);
    }

    /* Formulário */
    .w-full {
        max-width: 400px;
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 10px;
        padding: 25px;  /* Menos espaçamento */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
    }

    /* Título */
    .text-3xl {
        color: #FFD700; /* Dourado */
        font-size: 28px; /* Reduzido */
        font-weight: bold;
        margin-bottom: 15px;
    }

    /* Estilo dos campos de entrada */
    .input-field {
        padding: 12px;
        background-color: #333;
        color: white;
        border: 1px solid #444;
        border-radius: 5px;
        font-size: 16px;
        width: 100%;
        margin-top: 5px;
    }

    .input-field:focus {
        border-color: #FFD700; /* Dourado */
        outline: none;
    }

    /* Erro */
    .error-message {
        color: #FF6347; /* Vermelho para erros */
        font-size: 12px;
        margin-top: 5px;
    }

    /* Link de login */
    .text-sm {
        color: #FFD700; /* Dourado */
        text-decoration: none;
        font-size: 14px;
    }

    .text-sm:hover {
        color: #FFA500; /* Dourado mais claro */
    }

    /* Botão de Registro */
    .button {
        background-color: #FFD700; /* Dourado */
        color: black;
        padding: 12px;
        border-radius: 5px;
        font-size: 16px;
        width: 100%;
        cursor: pointer;
        transition: 0.3s;
    }

    .button:hover {
        background-color: #FFA500; /* Dourado mais claro */
    }

    /* Ajustando espaços */
    .space-y-4 {
        gap: 12px; /* Menor espaçamento */
    }

    /* Ajuste da margem do botão */
    .mt-3 {
        margin-top: 15px;
    }
</style>
