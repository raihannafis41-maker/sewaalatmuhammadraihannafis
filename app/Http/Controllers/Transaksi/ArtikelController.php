<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ModelArtikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = ModelArtikel::orderBy('created_at', 'desc')->get();
        return view('user.artikel.index', compact('data'));
    }

    public function create()
    {
        return view('user.artikel.create');
    }
public function store(Request $request)
{
    $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $fileName = null;

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/artikel'), $fileName);
    }

    $user = Auth::guard('web')->user();

    if (!$user) {
        abort(403, 'User belum login');
    }

    ModelArtikel::create([
        'judul' => $request->judul,
        'isi' => $request->isi,
        'gambar' => $fileName,
        'userid' => (int) $user->id // 🔥 FIX FINAL
    ]);

    return redirect()->route('admin.artikel.index')->with('success','Berhasil tambah');
}    

    public function show($id)
    {
        $artikel = ModelArtikel::findOrFail($id);
        return view('user.artikel.show', compact('artikel'));
    }

    public function edit($id)
    {
        $artikel = ModelArtikel::findOrFail($id);
        return view('user.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = ModelArtikel::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $fileName = $artikel->gambar;

        if ($request->hasFile('gambar')) {

            // hapus gambar lama
            if ($artikel->gambar && file_exists(public_path('uploads/artikel/' . $artikel->gambar))) {
                unlink(public_path('uploads/artikel/' . $artikel->gambar));
            }

            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/artikel'), $fileName);
        }

        $artikel->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $fileName,
        ]);

        // 🔥 FIX REDIRECT
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diupdate');
    }

    public function destroy($id)
    {
        $artikel = ModelArtikel::findOrFail($id);

        // hapus gambar
        if ($artikel->gambar && file_exists(public_path('uploads/artikel/' . $artikel->gambar))) {
            unlink(public_path('uploads/artikel/' . $artikel->gambar));
        }

        $artikel->delete();

        // 🔥 FIX REDIRECT
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus');
    }
}
