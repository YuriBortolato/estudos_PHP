<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CRUD do Yuri')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    
    @if(Auth::check())
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button class="btn btn-danger btn-sm">Sair</button>
        </form>
    @endif

    <header class="mb-4">
        <h1>@yield('header', 'CRUD Laravel')</h1>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="mt-4 text-center text-muted">
        <hr>
        <p>&copy; {{ date('Y') }} - Yuri CRUD </p>
    </footer>

</body>
</html>
