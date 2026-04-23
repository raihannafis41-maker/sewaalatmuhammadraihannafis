<?php

namespace App\Http\Controllers\Penyewa;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelPemesanan;
use App\Models\ModelAlat; // ✅ INI YANG KURANG

class PemesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:penyewa');
    }

    public function index()
    {
        // ✅ AMBIL DARI AUTH GUARD
        $penyewa = auth()->guard('penyewa')->user();

        $data = ModelPemesanan::with('detail.alat')
            ->where('penyewaid', $penyewa->id)
            ->get();

        return view('zonaPenyewa.pemesanan.index', compact('data'));
    }

    public function create()
    {
        $alat = ModelAlat::all();

        return view('zonaPenyewa.pemesanan.create', compact('alat'));
    }

    public function store(Request $request)
    {
        $penyewa = auth()->guard('penyewa')->user();

        // ✅ VALIDASI
        $request->validate([
            'tanggalpesan' => 'required|date',
            'tanggalkembali' => 'required|date',
        ]);

        // ✅ SIMPAN PEMESANAN
        $pemesanan = ModelPemesanan::create([
            'userid' => 1, // sementara (nanti bisa ambil dari admin/petugas)
            'penyewaid' => $penyewa->id,
            'tanggalpesan' => $request->tanggalpesan,
            'tanggalkembali' => $request->tanggalkembali,
            'status' => 'pending', // 🔥 WAJIB (biar tidak null error)
        ]);

        return redirect()->route('penyewa.pemesanan.index')
            ->with('success', 'Pemesanan berhasil dibuat');
    }

    public function show($id)
    {
        $penyewa = auth()->guard('penyewa')->user();

        $data = ModelPemesanan::with('detail.alat')
            ->where('penyewaid', $penyewa->id)
            ->findOrFail($id);

        return view('zonaPenyewa.pemesanan.show', compact('data'));
    }

    public function edit($id)
    {
        $penyewa = auth()->guard('penyewa')->user();

        $data = ModelPemesanan::with('detail.alat')
            ->where('penyewaid', $penyewa->id)
            ->findOrFail($id);

        $alat = ModelAlat::all(); // 🔥 TAMBAHKAN INI

        return view('zonaPenyewa.pemesanan.edit', compact('data', 'alat'));
    }

    public function update(Request $request, $id)
    {
        $penyewa = auth()->guard('penyewa')->user();

        $data = ModelPemesanan::where('penyewaid', $penyewa->id)
            ->findOrFail($id);

        $data->update([
            'tanggalpesan' => $request->tanggalpesan,
            'tanggalkembali' => $request->tanggalkembali,
            // 🔥 HAPUS status
        ]);

        return redirect()->route('penyewa.pemesanan.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $penyewa = auth()->guard('penyewa')->user();

        $data = ModelPemesanan::where('penyewaid', $penyewa->id)
            ->findOrFail($id);

        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
