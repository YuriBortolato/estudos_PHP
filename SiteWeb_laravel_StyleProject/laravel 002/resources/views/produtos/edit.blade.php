@extends('layouts.app')

@section('title', 'Editar Produto')
@section('header', 'Editar Produto')

@section('content')

<style>
    /* Card principal */
    .product-card {
        border-radius: 1rem;
        border: none;
        overflow: hidden; 
    }

    /* Cabeçalho do card com gradiente */
    .product-card-header {
        background: linear-gradient(135deg, #007bff, #00c6ff);
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.25rem 1.75rem;
    }
    
    .product-card-header h1 {
        margin: 0;
        font-size: 1.75rem;
        font-weight: 600;
    }

    /* Botão Voltar */
    .btn-back {
        text-decoration: none;
        color: white;
        font-size: 0.9rem;
        font-weight: 500;
        border: 1px solid rgba(255, 255, 255, 0.7);
        border-radius: 9999px;
        padding: 0.4rem 1rem;
        transition: all 0.2s ease;
    }
    .btn-back:hover {
        background-color: white;
        color: #007bff;
    }

    /* Inputs arredondados */
    .form-control-custom {
        border-radius: 9999px; 
        padding: 0.75rem 1.25rem;
        border: 1px solid #ced4da;
    }
    /* Foco nos inputs */
    .form-control-custom:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.25rem rgba(0,123,255,.25);
    }

    /* Labels */
    .form-label-custom {
        font-weight: 600;
        color: #007bff;
        margin-left: 0.75rem; 
        margin-bottom: 0.25rem;
    }

    /* Botão de submit verde */
    .btn-submit-custom {
        background-color: #34d399; 
        border-color: #34d399;
        border-radius: 9999px; 
        font-weight: 700;
        text-transform: uppercase;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        color: white; 
        width: 100%; 
        transition: all 0.2s ease-in-out;
    }
    /* Hover do botão de submit */
    .btn-submit-custom:hover {
        background-color: #2cae82;
        border-color: #2cae82;
        color: white;
        transform: translateY(-2px);
    }
</style>

<div class="container" style="max-width: 700px;"> 
    
    <div class="card shadow-lg product-card">
        
        <!-- CABEÇALHO DO CARD -->
        <div class="product-card-header">
            
            <span></span> 
            
            <a href="{{ route('produtos.index') }}" class="btn-back">
                &larr; Voltar
            </a>
        </div>

        <!-- CORPO DO CARD (Formulário) -->
        <div class="card-body p-4 p-md-5">

            <!-- MENSAGENS DE ERRO (Estilizadas) -->
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <h5 class="alert-heading">Ocorreram erros:</h5>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('produtos.update', $produto) }}" method="POST">
                @csrf
                @method('PUT') {{-- Importante para o método UPDATE --}}

                <!-- Campo Nome -->
                <div class="mb-4">
                    <label for="nome" class="form-label form-label-custom">Nome</label>
                    <input id="nome" name="nome" type="text" 
                           class="form-control form-control-custom" 
                           {{-- 
                             old() checa se há um valor antigo (por falha na validação), 
                             senão, usa o valor do produto.
                           --}}
                           value="{{ old('nome', $produto->nome) }}"
                           placeholder="Ex: Teclado Mecânico">
                </div>
                
                <!-- Campo Descrição -->
                <div class="mb-4">
                    <label for="descricao" class="form-label form-label-custom">Descrição</label>
                    <textarea id="descricao" name="descricao" 
                              class="form-control" 
                              rows="4" 
                              placeholder="Ex: Teclado com switches blue, ABNT2...">{{ old('descricao', $produto->descricao) }}</textarea>
                </div>

                <!-- Campo Preço -->
                <div class="mb-4">
                    <label for="preco" class="form-label form-label-custom">Preço</label>
                    <input id="preco" name="preco" type="number" step="0.01" 
                           class="form-control form-control-custom" 
                           value="{{ old('preco', $produto->preco) }}"
                           placeholder="Ex: 299.90">
                </div>

                <!-- Botão Atualizar -->
                <div class="mt-5">
                    <button type="submit" class="btn btn-submit-custom">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

