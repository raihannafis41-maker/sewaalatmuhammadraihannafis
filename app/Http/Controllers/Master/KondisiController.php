<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelKondisi;

class KondisiController extends Controller
{
    public function index()
    {
        $data = ModelKondisi::orderBy('namakondisi', 'asc')->get();
        return view('user.kondisi.index', compact('data'));
    }

    public function create()
    {
        return view('user.kondisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namakondisi' => 'required'
        ]);

        ModelKondisi::create([
            'namakondisi' => $request->namakondisi
        ]);

        return redirect('dashboard/kondisi')->with('success', 'Kondisi berhasil ditambahkan');
    }

    public function show($id)
    {
        $kondisi = ModelKondisi::findOrFail($id);
        return view('user.kondisi.show', compact('kondisi'));
    }

    public function edit($id)
    {
        $kondisi = ModelKondisi::findOrFail($id);
        return view('user.kondisi.edit', compact('kondisi'));
    }

    public function update(Request $request, $id)
    {
        $kondisi = ModelKondisi::findOrFail($id);

        $request->validate([
            'namakondisi' => 'required'
        ]);

        $kondisi->update([
            'namakondisi' => $request->namakondisi
        ]);

        return redirect('dashboard/kondisi')->with('success', 'Kondisi berhasil diupdate');
    }

    public function destroy($id)
    {
        $kondisi = ModelKondisi::findOrFail($id);
        $kondisi->delete();

        return redirect('dashboard/kondisi')->with('success', 'Kondisi berhasil dihapus');
    }
}