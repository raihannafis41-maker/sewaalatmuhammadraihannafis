<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelMerk;

class MerkController extends Controller
{
    public function index()
    {
        $data = ModelMerk::orderBy('namamerk', 'asc')->get();
        return view('user.merk.index', compact('data'));
    }

    public function create()
    {
        return view('user.merk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namamerk' => 'required'
        ]);

        ModelMerk::create([
            'namamerk' => $request->namamerk
        ]);

        return redirect('dashboard/merk')->with('success', 'Merk berhasil ditambahkan');
    }

    public function show($id)
    {
        $merk = ModelMerk::findOrFail($id);
        return view('user.merk.show', compact('merk'));
    }

    public function edit($id)
    {
        $merk = ModelMerk::findOrFail($id);
        return view('user.merk.edit', compact('merk'));
    }

    public function update(Request $request, $id)
    {
        $merk = ModelMerk::findOrFail($id);

        $request->validate([
            'namamerk' => 'required'
        ]);

        $merk->update([
            'namamerk' => $request->namamerk
        ]);

        return redirect('dashboard/merk')->with('success', 'Merk berhasil diupdate');
    }

    public function destroy($id)
    {
        $merk = ModelMerk::findOrFail($id);
        $merk->delete();

        return redirect('dashboard/merk')->with('success', 'Merk berhasil dihapus');
    }
}