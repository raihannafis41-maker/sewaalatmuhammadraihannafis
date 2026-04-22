<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    // HOME
    public function home()
    {
        return view('landing.home');
    }

   public function detailArtikel($id)
{
    return view('landing.detailartikel', compact('id'));
}

    // DAFTAR KATEGORI
    public function daftarKategori()
    {
        return view('landing.daftarkategori');
    }

    // KATEGORI
    public function kategori($id = null)
    {
        return view('landing.kategori');
    }

    // TAG
    public function tag($nama = null)
    {
        return view('landing.tag');
    }

    // TENTANG
    public function tentang()
    {
        return view('landing.tentang');
    }

    // KONTAK
    public function kontak()
    {
        return view('landing.kontak');
    }

    // DAFTAR ISI
    public function daftarIsi()
    {
        return view('landing.daftarisi');
    }
}