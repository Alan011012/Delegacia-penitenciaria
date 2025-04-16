<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVisitante;
use App\Models\Visitante;

class VisitanteController extends Controller
{
    public function index()
    {
        $visitantes = Visitante::all();
        return view('visitantes.index', compact('visitantes'));
    }

    public function create()
    {
        return view('visitantes.create');
    }

    public function store(StoreUpdateVisitante $request)
    {
        Visitante::create($request->all());

        return redirect()->route('visitantes.index')->with('success', 'Visitante criado com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $visitante = Visitante::find($id);
        return view('visitantes.edit', compact('visitante'));
    }

    public function update(StoreUpdateVisitante $request, string $id)
    {
        $visitante = Visitante::find($id);
        $visitante->update($request->all());

        return redirect()->route('visitantes.index')->with('success', 'Visitante atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $visitante = Visitante::find($id);
        $visitante->delete();

        return redirect()->route('visitantes.index')->with('success', 'Visitante excluído com sucesso!');
    }
}
