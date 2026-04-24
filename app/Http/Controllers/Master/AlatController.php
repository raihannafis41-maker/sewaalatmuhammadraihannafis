<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelAlat;
use App\Models\ModelMerk;
use App\Models\ModelKondisi;
use App\Models\ModelKategori;

class AlatController extends Controller
{
    public function index()
    {
        $data = ModelAlat::join('merk', 'alat.merkid', '=', 'merk.id')
            ->join('kondisi', 'alat.kondisiid', '=', 'kondisi.id')
            ->join('kategori', 'alat.kategoriid', '=', 'kategori.id')
            ->select(
                'alat.*',
                'merk.namamerk',
                'kondisi.namakondisi',
                'kategori.namakategori'
            )
            ->orderBy('alat.created_at', 'desc')
            ->get();

        return view('user.alat.index', compact('data'));
    }

    public function create()
    {
        $merk = ModelMerk::orderBy('namamerk', 'asc')->get();
        $kondisi = ModelKondisi::orderBy('namakondisi', 'asc')->get();
        $kategori = ModelKategori::orderBy('namakategori', 'asc')->get();

        return view('user.alat.create', compact('merk', 'kondisi', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaalat' => 'required',
            'merkid' => 'required',
            'kondisiid' => 'required',
            'kategoriid' => 'required',
            'stok' => 'required|integer|min:0',
            'hargasewa' => 'required|integer|min:0',
        ]);

        ModelAlat::create([
            'namaalat' => $request->namaalat,
            'merkid' => $request->merkid,
            'kondisiid' => $request->kondisiid,
            'kategoriid' => $request->kategoriid,
            'stok' => $request->stok,
            'hargasewa' => $request->hargasewa,
        ]);

        return redirect('dashboard/alat')->with('success', 'Alat berhasil ditambahkan');
    }

    public function show($id)
    {
        $alat = ModelAlat::join('merk', 'alat.merkid', '=', 'merk.id')
            ->join('kondisi', 'alat.kondisiid', '=', 'kondisi.id')
            ->join('kategori', 'alat.kategoriid', '=', 'kategori.id')
            ->select(
                'alat.*',
                'merk.namamerk',
                'kondisi.namakondisi',
                'kategori.namakategori'
            )
            ->where('alat.id', $id)
            ->firstOrFail();

        return view('user.alat.show', compact('alat'));
    }

    public function edit($id)
    {
        $alat = ModelAlat::findOrFail($id);

        $merk = ModelMerk::orderBy('namamerk', 'asc')->get();
        $kondisi = ModelKondisi::orderBy('namakondisi', 'asc')->get();
        $kategori = ModelKategori::orderBy('namakategori', 'asc')->get();

        return view('user.alat.edit', compact('alat', 'merk', 'kondisi', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $alat = ModelAlat::findOrFail($id);

        $request->validate([
            'namaalat' => 'required',
            'merkid' => 'required',
            'kondisiid' => 'required',
            'kategoriid' => 'required',
            'stok' => 'required|integer|min:0',
            'hargasewa' => 'required|integer|min:0',
        ]);

        $alat->update([
            'namaalat' => $request->namaalat,
            'merkid' => $request->merkid,
            'kondisiid' => $request->kondisiid,
            'kategoriid' => $request->kategoriid,
            'stok' => $request->stok,
            'hargasewa' => $request->hargasewa,
        ]);

        return redirect('dashboard/alat')->with('success', 'Alat berhasil diupdate');
    }

    public function destroy($id)
    {
        $alat = ModelAlat::findOrFail($id);
        $alat->delete();

        return redirect('dashboard/alat')->with('success', 'Alat berhasil dihapus');
    }
}