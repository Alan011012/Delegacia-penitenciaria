<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVisita;
use App\Models\Visita;
use App\Models\Preso;
use App\Models\Visitante;
use Carbon\Carbon;

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

    public function store(StoreUpdateVisita $request)
    {
        $dataVisita = Carbon::createFromFormat('Y-m-d\TH:i', $request->data_visita)->format('Y-m-d H:i:s');

        Visita::create([
            'preso_id' => $request->preso_id,
            'visitante_id' => $request->visitante_id,
            'data_visita' => $dataVisita,
        ]);

        return redirect()->route('visitas.index')->with('success', 'Visita registrada com sucesso!');
    }

    public function edit(string $id)
    {
        $visita = Visita::findOrFail($id);
        $presos = Preso::all();
        $visitantes = Visitante::all();

        return view('visitas.edit', compact('visita', 'presos', 'visitantes'));
    }

    public function update(StoreUpdateVisita $request, string $id)
    {
        $dataVisita = Carbon::createFromFormat('Y-m-d\TH:i', $request->data_visita)->format('Y-m-d H:i:s');

        $visita = Visita::findOrFail($id);

        $visita->update([
            'preso_id' => $request->preso_id,
            'visitante_id' => $request->visitante_id,
            'data_visita' => $dataVisita,
        ]);

        return redirect()->route('visitas.index')->with('success', 'Visita atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $visita = Visita::findOrFail($id);
        $visita->delete();

        return redirect()->route('visitas.index')->with('success', 'Visita excluída com sucesso!');
    }
}
