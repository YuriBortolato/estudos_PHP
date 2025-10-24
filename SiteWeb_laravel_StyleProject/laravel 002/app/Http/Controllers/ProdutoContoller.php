<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();
        //dd($produtos);
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required|numeric'
        ],
        [
            'nome.required' => 'O campo nome esta vazio',
            'descricao.required' => 'O campo descricao esta vazio',
            'preco.required' => 'O campo preco esta vazio',
            'preco.numeric' => 'O campo preço precisa ser numero',
        ]
        );

        Produto::create($request->all());
        return redirect()->route('produtos.index');
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {

        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     return view('produtos.edit', compact('produto'));
    // }

    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome'  => 'required',
            'preco' => 'required|numeric',
        ], [
            'nome.required'  => 'O campo Nome é obrigatório.',
            'preco.required' => 'O campo Preço é obrigatório.',
            'preco.numeric'  => 'O campo Preço deve ser numérico.',
        ]);
    
        $produto->update($request->all());
    
        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído!');
    }
}
