<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelKomentar;
use App\Models\ModelArtikel;

class KomentarController extends Controller
{
    public function index()
    {
        $data = ModelKomentar::with([
            'penyewa',
            'user',
            'replies'
        ])
            ->whereNull('parent_id')
            ->latest()
            ->get();

        return view('user.komentar.index', compact('data'));
    }
    public function store(Request $request)
{
    $request->validate([
        'isikomentar' => 'required'
    ]);

    ModelKomentar::create([
        'artikelid' => $request->artikelid,
        'isikomentar' => $request->isikomentar,
        'parent_id' => $request->parent_id,

        // AUTO DETECT LOGIN
        'penyewaid' => auth('penyewa')->id(),
        'userid' => auth()->id()
    ]);

    return back()->with('success', 'Komentar berhasil');
}

    public function show($id)
    {
        $komentar = ModelKomentar::join('artikel', 'komentar.artikelid', '=', 'artikel.id')
            ->join('penyewa', 'komentar.penyewaid', '=', 'penyewa.id')
            ->select(
                'komentar.*',
                'artikel.judul as judul_artikel',
                'penyewa.nama as nama_penyewa'
            )
            ->where('komentar.id', $id)
            ->firstOrFail();

        return view('user.komentar.show', compact('komentar'));
    }

    public function destroy($id)
    {
        $komentar = ModelKomentar::findOrFail($id);
        $komentar->delete();

        return redirect()->to('/dashboard/komentar')->with('success', 'Komentar berhasil dihapus');
    }
}
