<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    // ======================
    // TAMPILKAN LOGIN
    // ======================
    public function showLogin()
    {
        return view('auth.loginuser');
    }

    // ======================
    // PROSES LOGIN
    // ======================
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            // ======================
            // REDIRECT BERDASARKAN ROLE
            // ======================
            if ($user->role == 'admin') {
                return redirect()->route('dashboardadmin');
            } elseif ($user->role == 'petugas') {
                return redirect()->route('dashboardpetugas');
            }

            return redirect('/');
        }

        return back()->with('error', 'Username atau Password salah');
    }

    // ======================
    // LOGOUT
    // ======================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginuser');
    }
}