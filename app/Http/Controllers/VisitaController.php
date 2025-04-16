<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreVisitas;
use App\Models\Visita;
use App\Models\Preso;
use App\Models\Visitante;
use Illuminate\Http\Request;

class VisitaController extends Controller
{
    public function index()
    {
        $visitas = Visita::with(['preso', 'visitante'])->get();
        return view('visitas.index', compact('visitas'));
    }

    public function create()
    {
        $presos = Preso::all();
        $visitantes = Visitante::all();
        return view('visitas.create', compact('presos', 'visitantes'));
    }

    public function store(StoreVisitas $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'preso_id' => 'required|exists:presos,id',
            'visitante_id' => 'required|exists:visitantes,id',
            'data_visita' => 'required|date',
        ]);

        // Criar a visita
        Visita::create($validated);

        return redirect()->route('visitas.index')->with('success', 'Visita registrada com sucesso!');
    }

    public function edit(string $id)
    {
        $visita = Visita::findOrFail($id);
        $presos = Preso::all();
        $visitantes = Visitante::all();

        return view('visitas.edit', compact('visita', 'presos', 'visitantes'));
    }

    public function update(StoreVisitas $request, string $id)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'preso_id' => 'required|exists:presos,id',
            'visitante_id' => 'required|exists:visitantes,id',
            'data_visita' => 'required|date',
        ]);

        $visita = Visita::find($id);

        // Atualizar a visita
        $visita->update($validated);

        return redirect()->route('visitas.index')->with('success', 'Visita atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $visita = Visita::find($id);

        if ($visita) {
            $visita->delete();
            return redirect()->route('visitas.index')->with('success', 'Visita excluída com sucesso!');
        }

        return redirect()->route('visitas.index')->with('error', 'Visita não encontrada!');
    }
}
