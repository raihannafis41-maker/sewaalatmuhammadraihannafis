<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelPenyewa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PenyewaAuthController extends Controller
{
    public function login()
    {
        return view('auth.loginpenyewa');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $penyewa = ModelPenyewa::where('username', $request->username)->first();

        if (!$penyewa || !Hash::check($request->password, $penyewa->password)) {
            return back()->with('error', 'Username atau password salah');
        }

        // 🔥 INI KUNCI UTAMA
        Auth::guard('penyewa')->login($penyewa);

        return redirect()->route('penyewa.dashboard');
    }

    public function logout()
    {
        Auth::guard('penyewa')->logout();
        return redirect()->route('auth.penyewa.login');
    }
}