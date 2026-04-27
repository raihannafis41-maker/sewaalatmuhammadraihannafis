<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelUser;

class UserAuthController extends Controller
{
    // ======================
    // HALAMAN LOGIN
    // ======================
    public function login()
    {
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user());
        }

        return view('auth.loginuser');
    }

    // ======================
    // PROSES LOGIN
    // ======================
    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Ambil user berdasarkan username
        $user = ModelUser::where('username', $request->username)->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return back()
                ->withInput()
                ->with('error', 'Username tidak ditemukan');
        }

        // Jika password salah
        if (!Hash::check($request->password, $user->password)) {
            return back()
                ->withInput()
                ->with('error', 'Password salah');
        }

        // Login
        Auth::guard('web')->login($user);

        // Regenerate session (security)
        $request->session()->regenerate();

        // Redirect sesuai role
        return $this->redirectByRole($user);
    }

    // ======================
    // LOGOUT
    // ======================
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.user.login');
    }

    // ======================
    // REDIRECT BERDASARKAN ROLE
    // ======================
    private function redirectByRole($user)
    {
        // ADMIN
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // PETUGAS
        if ($user->role === 'petugas') {
            return redirect()->route('petugas.dashboard');
        }

        // DEFAULT
        return redirect()->route('home');
    }
}