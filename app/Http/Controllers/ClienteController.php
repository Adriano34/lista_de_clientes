<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::select('*')->get();
        return response()->json($clientes);
    }
    
    public function store(ClienteRequest $request)
    {
        $cliente=Cliente::create($request->all());
        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);
        if (empty($cliente)){
            return response()->json('Não encontrado', 404);
        }
        return response()->json($cliente);
    }

    public function update(Request $request, $id)
    {
       
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json('Não encontrado', 404);
        }
        $cliente->update($request->all());
        return response()->json($cliente);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json('Not found', 404);
        }
        $cliente->delete();
        return response()->json('Deletado com sucesso');
    }
}
