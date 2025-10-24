@extends('layouts.app')

@section('title', 'Novo Produto')
@section('header', 'Cadastrar Produto')

@section('content')

<h1>Detalhes do Produto</h1>

<p><strong>ID:</strong> {{ $produto->id }}</p>
<p><strong>Nome:</strong> {{ $produto->nome }}</p>
<p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
<p><strong>Descrição:</strong> {{ $produto->descricao ?? 'Sem descrição' }}</p>
<p><strong>Criado em:</strong> {{ $produto->created_at->format('d/m/Y H:i') }}</p>
<p><strong>Atualizado em:</strong> {{ $produto->updated_at->format('d/m/Y H:i') }}</p>

<a href="{{ route('produtos.index') }}">← Voltar para lista</a>
<a href="{{ route('produtos.edit', $produto) }}">✏️ Editar</a>

@endsection