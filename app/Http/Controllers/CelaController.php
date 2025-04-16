<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCela;
use App\Models\Cela;

class CelaController extends Controller
{
    public function index()
    {
        $celas = Cela::all();
        return view('celas.index', compact('celas'));
    }

    public function create()
    {
        return view('celas.create');
    }

    public function store(StoreUpdateCela $request)
    {
        Cela::create($request->all());

        return redirect()->route('celas.index')->with('success', 'Cela cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $cela = Cela::findOrFail($id);
        return view('celas.edit', compact('cela'));
    }

    public function update(StoreUpdateCela $request, $id)
    {
        $cela = Cela::findOrFail($id);
        $cela->update($request->all());

        return redirect()->route('celas.index')->with('success', 'Cela atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $cela = Cela::findOrFail($id);
        $cela->delete();

        return redirect()->route('celas.index')->with('success', 'Cela excluída com sucesso!');
    }
}
