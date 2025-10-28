@extends('layouts.app')

@section('title', 'Login')
@section('header', 'Acessar o Sistema')

@section('content')
    <!-- Mensagens de erro -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST" class="card p-4 shadow-sm" style="max-width: 400px; margin: auto;">
        @csrf

        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
@endsection
