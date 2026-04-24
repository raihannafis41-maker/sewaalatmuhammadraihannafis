<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelKategori;

class KategoriController extends Controller
{
    public function index()
    {
        $data = ModelKategori::orderBy('namakategori', 'asc')->get();
        return view('user.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('user.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namakategori' => 'required'
        ]);

        ModelKategori::create([
            'namakategori' => $request->namakategori
        ]);

        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function show($id)
    {
        $kategori = ModelKategori::findOrFail($id);
        return view('user.kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = ModelKategori::findOrFail($id);
        return view('user.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = ModelKategori::findOrFail($id);

        $request->validate([
            'namakategori' => 'required'
        ]);

        $kategori->update([
            'namakategori' => $request->namakategori
        ]);

        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy($id)
    {
        $kategori = ModelKategori::findOrFail($id);
        $kategori->delete();

        return redirect('/dashboard/kategori')->with('success', 'Kategori berhasil dihapus');
    }
}