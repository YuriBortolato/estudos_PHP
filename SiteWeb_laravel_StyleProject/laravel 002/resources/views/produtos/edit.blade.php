@extends('layouts.app')

@section('title', 'Novo Produto')
@section('header', 'Cadastrar Produto')

@section('content')

<h1>Editar Produto</h1>

@if($errors->any())
    <div style="color:red">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('produtos.update', $produto) }}" method="POST">
    @csrf
    @method('PUT')
    Nome: <input type="text" name="nome" value="{{ $produto->nome }}"><br>
    Preço: <input type="text" name="preco" value="{{ $produto->preco }}"><br>
    <button type="submit">Atualizar</button>
</form>


@endsection