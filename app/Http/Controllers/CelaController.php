<?php
namespace App\Http\Controllers;

use App\Models\Cela;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        Cela::create($request->all());

        return redirect()->route('celas.index')->with('success', 'Cela cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $cela = Cela::find($id);
        return view('celas.edit', compact('cela'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        $cela = Cela::find($id);
        $cela->update($request->all());

        return redirect()->route('celas.index')->with('success', 'Cela atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $cela = Cela::find($id);
        $cela->delete();

        return redirect()->route('celas.index')->with('success', 'Cela excluída com sucesso!');
    }
}
