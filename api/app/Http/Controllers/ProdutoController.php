<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;


class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        return response()->json($produtos);
    }

    public function show($id)
    {
        $produto = Produto::with('categoria')->findOrFail($id);
        return response()->json($produto);
    }

    public function store(Request $request)
    {
        $produto = Produto::create($request->all());
        return response()->json($produto);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());
        return response()->json($produto);
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return response()->json(['message' => 'Produto deletado com sucesso!']);
    }


}
