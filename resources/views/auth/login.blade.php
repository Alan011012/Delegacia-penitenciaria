<x-guest-layout>
    <link rel="stylesheet" href="css/login.css">

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Formulário de Login, fica sobre a imagem de fundo -->
    <div class="login-container">
        <h2 class="title">Entrar</h2>

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf

            <div class="input-group">
                <!-- E-mail -->
                <div class="input-item">
                    <x-input-label for="email" :value="__('E-mail')" class="text-white text-sm" />
                    <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <!-- Senha -->
                <div class="input-item">
                    <x-input-label for="password" :value="__('Senha')" class="text-white text-sm" />
                    <x-text-input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>
            </div>

            <!-- Lembrar-me -->
            <div class="remember-me">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" class="checkbox" name="remember">
                    <span>{{ __('Lembrar-me') }}</span>
                </label>
            </div>

            <!-- Botão de Login -->
            <div class="login-button">
                <x-primary-button class="button">
                    {{ __('Entrar') }}
                </x-primary-button>
            </div>

            <!-- Links -->
            <div class="links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link">
                        {{ __('Esqueceu a senha?') }}
                    </a>
                @endif

                <a href="{{ route('register') }}" class="link">
                    {{ __('Ainda não tem uma conta? Registre-se') }}
                </a>
            </div>
        </form>
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

    /* Container principal do login */
    .login-container {
        max-width: 400px;
        background-color: rgba(0, 0, 0, 0.8);
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        margin: 100px auto;
        text-align: center;
    }

    /* Título */
    .title {
        color: #FFD700; /* Dourado */
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    /* Formulário */
    .login-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    /* Caixa de input */
    .input-group {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    /* Estilo dos campos de entrada */
    .input-item {
        display: flex;
        flex-direction: column;
        text-align: left;
    }

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

    /* Lembrar-me */
    .remember-me {
        text-align: left;
    }

    .checkbox {
        accent-color: #FFD700; /* Dourado */
    }

    /* Botão de Login */
    .login-button {
        margin-top: 20px;
    }

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

    /* Links */
    .links {
        display: flex;
        justify-content: space-between;
        margin-top: 15px;
        text-align: center;
    }

    .link {
        color: #FFD700; /* Dourado */
        text-decoration: none;
        font-size: 14px;
    }

    .link:hover {
        color: #FFA500; /* Dourado mais claro */
    }
</style>
