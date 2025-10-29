@extends('layouts.app')

@section('title', 'Lista de Produtos')
@section('header', 'Lista de Produtos')

@section('content')

<style>
    /* Card personalizado */
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

    /* Título do cabeçalho */
    .product-card-header h1 {
        margin: 0;
        font-size: 1.75rem; 
        font-weight: 600;
    }

    /* Botão "Novo Produto" estilizado */
    .btn-new-product {
        background-color: #34d399; 
        border-color: #34d399;
        border-radius: 9999px; 
        font-weight: 700;
        text-transform: uppercase;
        padding: 0.6rem 1.35rem;
        font-size: 0.9rem;
        color: #ffffffff; 
        text-decoration: none;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    /* Hover do botão "Novo Produto" */
    .btn-new-product:hover {
        background-color: #2cae82; 
        border-color: #2cae82;
        color: #0069d9;
        text-decoration: none;
        box-shadow: 0 6px 15px rgba(0,0,0,0.15);
        transform: translateY(-2px);
    }

    /* Tabela de Produtos */
    .product-table {
        vertical-align: middle; 
    }

    /* Células da tabela */
    .product-table tbody td {
    vertical-align: middle;
    }

    /* Cabeçalho da tabela */
    .product-table thead th {
        border-bottom-width: 2px;
        color: #007bff; 
        text-transform: uppercase;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    /* Linhas da tabela */
    .product-table tbody tr:hover {
        background-color: #f8f9fa; 
    }

    /* Célula de Preço */
    .price-cell {
        white-space: nowrap;
    }

    /* Contêiner dos Botões de Ação */
    .action-buttons {
        min-width: 200px; 
        display: flex;           
        justify-content: center; 
        align-items: center;     
        gap: 0.25rem;            
    }

    /* Estiliza os botões de ação para ficarem arredondados */
    .action-buttons .btn {
        border-radius: 9999px; 
        font-weight: 600;
        font-size: 0.8rem;
        padding: 0.35rem 0.85rem;
    }
    
    /* Formulário de exclusão inline */
    .form-delete-btn {
        display: inline-block;
        margin: 0;
        padding: 0;
    }

</style>

<div class="container">

     <!-- Mensagens de sucesso  -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-lg product-card">
        
        <!-- CABEÇALHO DO CARD -->
        <div class="product-card-header">
            
            
            <span></span> 
            
            <a href="{{ route('produtos.create') }}" class="btn-new-product">Novo Produto</a>
        </div>

        <!-- CORPO DO CARD -->
        <div class="card-body p-0"> 
            
            @if($produtos->isEmpty())
                <div class="alert alert-light m-4 text-center">
                    <h4 class="alert-heading">Nenhum produto encontrado</h4>
                    <p class="mb-0">Cadastre seu primeiro produto clicando no botão "Novo Produto" acima.</p>
                </div>
            @else
                <!-- Tabela Responsiva -->
                <div class="table-responsive">
                    <table class="table table-hover product-table mb-0">
                        <thead>
                            <tr>
                                <th class="py-3 px-4">Nome</th>
                                <th class="py-3 px-4">Descrição</th>
                                <th class="py-3 px-4">Preço</th>
                                <th class="py-3 px-4 text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td class="py-3 px-4">{{ $produto->nome }}</td>
                                    <td class="py-3 px-4">{{ $produto->descricao }}</td>
                                    
                                    <td class="py-3 px-4 price-cell">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                    <td class="py-3 px-4 text-center action-buttons" style="vertical-align: middle;">
                                    
                                    <td class="py-3 px-4 text-center action-buttons">
                                        
                                        <a href="{{ route('produtos.show', $produto) }}" class="btn btn-sm btn-info text-white">
                                            Ver
                                        </a>
                                        
                                        <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-sm btn-warning text-dark">
                                            Editar
                                        </a>
                                        
                                        <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="form-delete-btn">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                                Excluir
                                            </button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif 
            
        </div>
    </div>
</div>
@endsection


