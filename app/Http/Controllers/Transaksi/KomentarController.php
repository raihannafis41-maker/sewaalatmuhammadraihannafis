<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelKomentar;

class KomentarController extends Controller
{
    // ======================
    // LIST KOMENTAR (ADMIN)
    // ======================
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

    // ======================
    // STORE KOMENTAR / REPLY
    // ======================
    public function store(Request $request, $id = null)
    {
        $request->validate([
            'isikomentar' => 'required',
        ]);

        $artikelId = $id ?? $request->artikelid;

        ModelKomentar::create([
            'artikelid'   => $artikelId,
            'isikomentar' => $request->isikomentar,
            'parent_id'   => $request->parent_id ?? null,

            'penyewaid'   => auth('penyewa')->id(),
            'userid'      => auth()->id(),
        ]);

        return redirect()
            ->route('detailartikel', $artikelId)
            ->with('success', 'Komentar berhasil');
    }

    // ======================
    // HAPUS
    // ======================
    public function destroy($id)
    {
        $komentar = ModelKomentar::findOrFail($id);
        $komentar->delete();

        return redirect()
            ->route('admin.komentar.index')
            ->with('success', 'Komentar berhasil dihapus');
    }
}