<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitante;

class VisitanteController extends Controller
{
    // Exibe a lista de visitantes
    public function index()
    {
        $visitantes = Visitante::all();
        return view('visitantes.index', compact('visitantes'));
    }

    // Exibe o formulário para adicionar um novo visitante
    public function create()
    {
        return view('visitantes.create');
    }

    // Cria um novo visitante e redireciona com mensagem de sucesso
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'documento_identidade' => 'required|string|max:255',
        ]);

        Visitante::create($request->all());

        return redirect()->route('visitantes.index')->with('success', 'Visitante criado com sucesso!');
    }

    // Exibe os dados de um visitante específico (não usado diretamente)
    public function show(string $id)
    {
        //
    }

    // Exibe o formulário de edição do visitante
    public function edit(string $id)
    {
        $visitante = Visitante::find($id);
        return view('visitantes.edit', ['visitante' => $visitante]);
    }

    // Atualiza os dados de um visitante e redireciona com mensagem de sucesso
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'documento_identidade' => 'required|string|max:255',
        ]);

        $visitante = Visitante::find($id);
        $visitante->update($request->all());

        return redirect()->route('visitantes.index')->with('success', 'Visitante atualizado com sucesso!');
    }

    // Exclui um visitante e redireciona com mensagem de sucesso
    public function destroy(string $id)
    {
        $visitante = Visitante::find($id);
        $visitante->delete();

        return redirect()->route('visitantes.index')->with('success', 'Visitante excluído com sucesso!');
    }
}
