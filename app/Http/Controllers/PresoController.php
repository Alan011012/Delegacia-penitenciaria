<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateSupport;
use App\Models\Preso;
use App\Models\Cela;
use Illuminate\Http\Request;

class PresoController extends Controller
{

    public function index()
    {
        $presos = Preso::all();
        return view('presos.index', compact('presos'));
    }

    public function create()
    {
        $celas = Cela::all();
        return view('presos.create', compact('celas'));
    }

    public function store(StoreUpdateSupport $request)
    {
        $preso = new Preso();
        $preso->nome = $request->nome;
        $preso->documento_identidade = $request->documento_identidade;
        $preso->data_nascimento = $request->data_nascimento;
        $preso->crime = $request->crime;
        $preso->data_condenacao = $request->data_condenacao;
        $preso->status = $request->status;
        $preso->cela_id = $request->cela_id;
        $preso->save();

        return redirect()->route('presos.index');
    }

    public function edit($id)
    {
        $preso = Preso::find($id);
        $celas = Cela::all();
        return view('presos.edit', compact('preso', 'celas'));
    }

    public function update(Request $request, $id)
    {
        $preso = Preso::find($id);
        $preso->update([
            'nome' => $request->nome,
            'documento_identidade' => $request->documento_identidade,
            'data_nascimento' => $request->data_nascimento,
            'crime' => $request->crime,
            'data_condenacao' => $request->data_condenacao,
            'status' => $request->status,
            'cela_id' => $request->cela_id,
        ]);

        return redirect()->route('presos.index');
    }

    public function destroy($id)
    {
        $preso = Preso::find($id);

        $preso->delete();

        return redirect()->route('presos.index');
    }
    }

