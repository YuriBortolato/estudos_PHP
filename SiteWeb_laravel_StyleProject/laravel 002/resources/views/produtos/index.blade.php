@extends('layouts.app')

@section('title', 'Novo Produto')
@section('header', 'Cadastrar Produto')

@section('content')

<h1>Lista de Produtos</h1>
<a href="{{ route('produtos.create') }}">Novo Produto</a>
<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Acão</th>
        </tr>
    </thead>
    <tbody>
        @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->descricao }}</td >
                <td>{{ $produto->preco }}</td>
                <td>
                <a href="{{ route('produtos.show', $produto) }}">Ver</a>
                <a href="{{ route('produtos.edit', $produto) }}">Editar</a>
                <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection