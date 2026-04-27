<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// MODEL
use App\Models\ModelArtikel;
use App\Models\ModelKategori;
use App\Models\ModelKomentar;

class LandingController extends Controller
{
    public function home(Request $request)
    {
        $query = ModelArtikel::query();

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $artikel = $query->orderBy('created_at', 'desc')->paginate(6);

        $kategori = ModelKategori::orderBy('namakategori', 'asc')->get();
        $artikelTerbaru = ModelArtikel::orderBy('created_at', 'desc')->take(5)->get();

        return view('landing.home', compact('artikel', 'kategori', 'artikelTerbaru'));
    }

    public function detailArtikel($id)
    {
        $artikel = ModelArtikel::findOrFail($id);

        $kategori = ModelKategori::orderBy('namakategori', 'asc')->get();
        $artikelTerbaru = ModelArtikel::orderBy('created_at', 'desc')->take(5)->get();

        $komentar = ModelKomentar::with([
            'penyewa',
            'user',
            'replies'
        ])
            ->where('artikelid', $id)
            ->whereNull('parent_id')
            ->latest()
            ->get();

        return view('landing.detailartikel', compact(
            'artikel',
            'komentar',
            'kategori',
            'artikelTerbaru'
        ));
    }
    public function storeKomentar(Request $request, $id)
    {
        if (!auth()->check() && !auth('penyewa')->check()) {
            abort(403, 'Login dulu untuk komentar');
        }

        $request->validate([
            'isikomentar' => 'required|min:3'
        ]);

        // 🔥 PAKSA INTEGER ID
        $userId = null;
        $penyewaId = null;

        if (auth('penyewa')->check()) {
            $penyewaId = (int) auth('penyewa')->id();
        }

        if (auth()->check()) {
            $user = auth()->user();

            // 🔥 PAKSA AMBIL ID NUMERIK
            $userId = $user->id ?? null;

            // kalau ternyata string (BUG SISTEM)
            if (!is_numeric($userId)) {
                abort(500, 'User ID harus angka, cek model user kamu');
            }
        }

        ModelKomentar::create([
            'artikelid'   => $id,
            'penyewaid'   => $penyewaId,
            'userid'      => $userId,
            'parent_id'   => $request->parent_id,
            'isikomentar' => $request->isikomentar
        ]);

        return redirect()->route('detailartikel', $id)
            ->with('success', 'Komentar berhasil dikirim!');
    }
    public function daftarKategori()
    {
        $kategori = ModelKategori::orderBy('namakategori', 'asc')->get();
        $artikelTerbaru = ModelArtikel::orderBy('created_at', 'desc')->take(5)->get();

        return view('landing.daftarkategori', compact('kategori', 'artikelTerbaru'));
    }

    public function kategori($id = null)
    {
        $kategori = ModelKategori::orderBy('namakategori', 'asc')->get();
        $artikelTerbaru = ModelArtikel::orderBy('created_at', 'desc')->take(5)->get();

        return view('landing.kategori', compact('kategori', 'artikelTerbaru'));
    }

    public function tag($nama = null)
    {
        $kategori = ModelKategori::orderBy('namakategori', 'asc')->get();
        $artikelTerbaru = ModelArtikel::orderBy('created_at', 'desc')->take(5)->get();

        return view('landing.tag', compact('kategori', 'artikelTerbaru'));
    }

    public function tentang()
    {
        $kategori = ModelKategori::orderBy('namakategori', 'asc')->get();
        $artikelTerbaru = ModelArtikel::orderBy('created_at', 'desc')->take(5)->get();

        return view('landing.tentang', compact('kategori', 'artikelTerbaru'));
    }

    public function kontak()
    {
        $kategori = ModelKategori::orderBy('namakategori', 'asc')->get();
        $artikelTerbaru = ModelArtikel::orderBy('created_at', 'desc')->take(5)->get();

        return view('landing.kontak', compact('kategori', 'artikelTerbaru'));
    }

    public function daftarIsi()
    {
        $kategori = ModelKategori::orderBy('namakategori', 'asc')->get();
        $artikelTerbaru = ModelArtikel::orderBy('created_at', 'desc')->take(5)->get();

        return view('landing.daftarisi', compact('kategori', 'artikelTerbaru'));
    }
}
