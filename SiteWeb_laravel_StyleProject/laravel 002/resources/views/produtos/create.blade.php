@extends('layouts.app')

@section('title', 'Novo Produto')
@section('header', 'Cadastrar Produto')

@section('content')

<h1>Novo Produto</h1>

@if($errors->any())
    <div style="color:red">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('produtos.store') }}" method="POST">
    @csrf
    <label>Nome</label>
    <input name="nome" type="text"/>
    <br/>
    <label>Descrição</label>
    <input name="descricao" type="text"/>
    <br/>
    <label>Preço</label>
    <input name="preco" type="text"/>
    <br/>
    <button type="submit">Cadatrar</button>
</form>

@endsection