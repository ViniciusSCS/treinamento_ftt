<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {
        $data = $request->all();

        $validacao = Validator::make($data, [
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'valor' => 'required',
            'categoria' => 'required',
        ]);

        if ($validacao->fails()) {
            return redirect()->back()->withInput($data);
        }

        $produto = new Produtos();

        $produto->nome = $data['nome'];
        $produto->descricao = $data['descricao'];
        $produto->valor = $data['valor'];
        $produto->categoria_id = $data['categoria'];

        $produto->save();

        return redirect()->route('produto.listar');


    }

    public function cadastrar()
    {
        $categorias = Categorias::pluck('descricao', 'id');

        return view('produto.cadastrar', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function listar(Request $request)
    {
        $produtos = Produtos::with('categoria')
            ->paginate(10);

        return view('produto.listar', compact('produtos'));
    }
}
