<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * @return array
     */
    public function listar()
    {
        $categorias = Categorias::paginate(10);

        return view('categoria.listar', compact('categorias'));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function cadastrar(Request $request)
    {
        $data = $request->all();

        $validacao = Validator::make($data, [
            'descricao' => 'required|string',
        ]);

        if ($validacao->fails()) {
            return ['status' => false, 'validacao' => true, "erros" => $validacao->errors()];
        }

        $categoria = new Categorias();

        $categoria->descricao = $data['descricao'];

        $categoria->save();

        return ['status' => true, "categoria" => $categoria];
    }
}
