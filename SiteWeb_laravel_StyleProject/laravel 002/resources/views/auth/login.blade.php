{{-- Salvar em: resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark"> <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Login</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">
    
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 p-4">
        <div class="flex rounded-xl shadow-2xl w-full max-w-5xl overflow-hidden bg-white dark:bg-gray-800">

            {{-- Coluna Azul Esquerda (Formulário) --}}
            <div class="w-full md:w-1/2 bg-gradient-to-br from-blue-600 to-blue-800 text-white p-10 flex flex-col justify-center items-center">
                
                <h2 class="text-4xl font-extrabold mb-8 text-center tracking-wide">BEM-VINDO</h2>

                <x-auth-session-status class="mb-6 text-yellow-200" :status="session('status')" />
                
                {{-- Bloco de erro manual para evitar o erro do componente que tivemos --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-700 bg-opacity-70 text-white rounded-lg w-full max-w-sm">
                        <div class="font-medium">Opa! Algo deu errado.</div>
                        <ul class="mt-3 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('login') }}" class="w-full max-w-sm">
                    @csrf

                    <div class="mb-5">
                        {{-- Traduzido --}}
                        <x-text-input id="email" class="block w-full px-5 py-3 rounded-full border-none bg-white bg-opacity-20 text-white placeholder-white focus:ring-2 focus:ring-white focus:bg-opacity-30 transition duration-200" 
                                      type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                                      placeholder="Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-yellow-200" />
                    </div>

                    <div class="mb-6">
                        {{-- Traduzido --}}
                        <x-text-input id="password" class="block w-full px-5 py-3 rounded-full border-none bg-white bg-opacity-20 text-white placeholder-white focus:ring-2 focus:ring-white focus:bg-opacity-30 transition duration-200"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" 
                                        placeholder="Senha" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-yellow-200" />
                    </div>

                    <div class="flex items-center justify-between mb-8">
                        {{-- Traduzido --}}
                        <label for="remember_me" class="inline-flex items-center text-sm">
                            <input id="remember_me" type="checkbox" class="rounded border-none text-white bg-white bg-opacity-20 shadow-sm focus:ring-white focus:ring-opacity-50 checked:bg-white checked:text-blue-800" name="remember">
                            <span class="ml-2 text-sm text-white dark:text-gray-200">Lembrar de mim</span>
                        </label>

                        @if (Route::has('password.request'))
                            {{-- Traduzido --}}
                            <a class="text-sm font-semibold text-white hover:underline dark:text-gray-200" href="{{ route('password.request') }}">
                                Esqueceu sua senha?
                            </a>
                        @endif
                    </div>

                    {{-- Botão SUBMIT (Traduzido) --}}
                    <x-primary-button class="w-full justify-center py-3 rounded-full bg-green-500 hover:bg-green-600 focus:bg-green-600 active:bg-green-700 focus:ring-green-400 transition duration-200">
                        ENTRAR
                    </x-primary-button>
                </form>

                {{-- Link para registro (Traduzido) --}}
                <div class="mt-8 text-sm text-white">
                    Não tem uma conta? 
                    <a href="{{ route('register') }}" class="font-semibold hover:underline">
                        Cadastre-se
                    </a>
                </div>
            </div>

            {{-- Coluna Branca Direita (Ilustração) --}}
            <div class="hidden md:flex w-1/2 bg-white dark:bg-gray-900 p-10 items-center justify-center">
                <div class="text-center">
                    {{-- ESTE é o local que você mencionou. --}}
                    {{-- Para usar a imagem real da foto, você precisa baixá-la, colocar na pasta /public/img/ e trocar o src --}}
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/login-page-2527801-2117770.png" 
                         alt="Ilustração de Login" 
                         class="max-w-full h-auto rounded-lg mx-auto mb-4">
                    <p class="text-gray-600 dark:text-gray-400 text-lg">Gerencie seus produtos com facilidade!</p>
                </div>
            </div>

        </div>
    </div>
    
</body>
</html>