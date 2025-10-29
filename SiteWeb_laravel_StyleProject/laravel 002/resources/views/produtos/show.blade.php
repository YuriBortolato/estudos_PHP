@extends('layouts.app')

@section('title', 'Detalhes do Produto')
@section('header', 'Detalhes do Produto')

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

    /* Botão "Editar" no cabeçalho */
    .btn-edit-custom {
        background-color: #34d399; 
        border: none;
        border-radius: 9999px; 
        font-weight: 600;
        padding: 0.5rem 1.25rem;
        font-size: 0.9rem;
        color: white; 
        text-decoration: none;
        transition: all 0.2s ease-in-out;
    }
    /* Hover do botão "Editar" */
    .btn-edit-custom:hover {
        background-color: #2cae82; 
        color: white;
        transform: translateY(-2px);
    }
    
    /* Lista de detalhes */
    .details-list dt { 
        font-weight: 600;
        color: #0056b3; 
        margin-bottom: 0.5rem; 
    }
    .details-list dd { 
        font-weight: 500;
        color: #212529; 
        margin-bottom: 1.5rem;
        display: flex; 
    }

    /* Caixa de informação */
    .info-box {
        background-color: #f8f9fa; 
        padding: 0.75rem 1.25rem;
        border-radius: 0.5rem;
        border: 1px solid #e9ecef; 
        width: 100%; 
        box-shadow: inset 0 1px 2px rgba(0,0,0,.075); 
        line-height: 1.5; 
        white-space: pre-wrap;
    }
</style>

<div class="container" style="max-width: 800px;"> 
    
    <div class="card shadow-lg product-card">
        
        <!-- CABEÇALHO DO CARD -->
        <div class="product-card-header">
            
            {{-- Botão Voltar (Esquerda) --}}
            <a href="{{ route('produtos.index') }}" class="btn-back">
                &larr; Voltar para lista
            </a>
            
            <!-- Botão Editar (Direita) -->
            <a href="{{ route('produtos.edit', $produto) }}" class="btn-edit-custom">
                ✏️ Editar
            </a>
        </div>

        <!-- CORPO DO CARD -->
        <div class="card-body p-4 p-md-5">
            
            <!-- Lista de Detalhes do Produto -->
            <dl class="row details-list">
                
                <!-- ID -->
                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9"><div class="info-box">{{ $produto->id }}</div></dd>

                <!-- Nome -->
                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9"><div class="info-box">{{ $produto->nome }}</div></dd>

                <!-- Preço -->
                <dt class="col-sm-3">Preço</dt>
                <dd class="col-sm-9"><div class="info-box">R$ {{ number_format($produto->preco, 2, ',', '.') }}</div></dd>

                <!-- Descrição -->
                <dt class="col-sm-3">Descrição</dt>
                <dd class="col-sm-9"><div class="info-box">{{ $produto->descricao ?? 'Sem descrição' }}</div></dd>

                <!-- Criado em -->
                <dt class="col-sm-3">Data de Cadastro</dt>
                <dd class="col-sm-9"><div class="info-box">{{ $produto->created_at->format('d/m/Y \à\s H:i') }}</div></dd>

                <!-- Atualizado em -->
                <dt class="col-sm-3">Última Atualização</dt>
                <dd class="col-sm-9"><div class="info-box">{{ $produto->updated_at->format('d/m/Y \à\s H:i') }}</div></dd>

            </dl>
            
        </div>
    </div>
</div>
@endsection

