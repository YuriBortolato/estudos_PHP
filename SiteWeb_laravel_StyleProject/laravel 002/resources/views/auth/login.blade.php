@extends('layouts.app')

@section('title', 'Login')

@section('header')
    <div class="text-center">
        BEM-VINDO
    </div>
@endsection

@section('content')

<style>

/* Centraliza o texto do cabeçalho */
    .text-center {
    text-align: center;
    }

    /* Card de login */
    .login-card-custom {
        background: linear-gradient(135deg, #007bff, #00c6ff);
        border: none;
        border-radius: 1rem; 
        color: white;
    }

    /* Labels do formulário */
    .login-card-custom .form-label {
        color: white;
        text-transform: uppercase;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    /* Inputs arredondados */
    .login-card-custom .form-control {
        border-radius: 9999px; 
        padding: 0.75rem 1.25rem;
        border: none;
        color: #333;
    }

    /* Foco nos inputs */
    .login-card-custom .form-control:focus {
        border-color: #34d399;
        box-shadow: 0 0 0 3px rgba(52, 211, 153, 0.4);
    }

    /* Botão de submit */
    .btn-submit-custom {
        background-color: #34d399;
        border-color: #34d399;
        border-radius: 9999px; 
        font-weight: 700;
        text-transform: uppercase;
        padding: 0.75rem;
        color: #ffffffff; 
        transition: all 0.2s ease-in-out;
    }

    /* Hover do botão de submit */
    .btn-submit-custom:hover {
        background-color: #2cae82; 
        border-color: #2cae82;
        color: #0069d9;
    }

    /* Estilo das mensagens de erro */
    .login-card-custom .alert-danger {
        background-color: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
        border-radius: 0.5rem;
    }
    .login-card-custom .alert-danger ul {
        margin-bottom: 0;
    }

    /* Links do formulário */
    .login-links {
        font-size: 0.9rem;
    }
    .login-links a {
        color: #f8f9fa;
        text-decoration: none;
    }
    .login-links a:hover {
        color: #ffffff;
        text-decoration: underline;
    }
    .form-check-label {
        color: #f8f9fa;
    }
    .form-check-input:checked {
        background-color: #34d399;
        border-color: #34d399;
    }
</style>


<div class="container">
    <!-- Mensagens de erro -->
    @if ($errors->any())
        <div class="alert alert-danger" style="max-width: 450px; margin: 0 auto 1rem auto;">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
    <form action="{{ route('login.submit') }}" method="POST" class="card p-4 p-md-5 shadow-lg login-card-custom" style="max-width: 450px; margin: auto;">
        @csrf

        <div class="mb-4"> 
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email@exemplo.com">
        </div>

        <div class="mb-4"> 
            <label class="form-label">Senha</label>
            <input type="password" name="password" class="form-control" placeholder="Sua senha">
        </div>

        
        <div class="d-flex justify-content-between align-items-center mb-4 login-links">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                    Lembrar-me
                </label>
            </div>
            <a href="#">Esqueceu a senha?</a>
        </div>
        
        <button type="submit" class="btn btn-submit-custom w-100">Entrar</button>
    </form>
</div>
@endsection
