<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelUser;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ======================
    // TAMPIL DATA
    // ======================
    public function index()
    {
        $data = ModelUser::all();
        return view('user.user.index', compact('data'));
    }

    // ======================
    // FORM TAMBAH
    // ======================
    public function create()
    {
        return view('user.user.create');
    }

    // ======================
    // SIMPAN DATA
    // ======================
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user,username',
            'password' => 'required',
            'role' => 'required'
        ]);

        ModelUser::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil ditambahkan');
    }

    // ======================
    // DETAIL DATA
    // ======================
    public function show($id)
    {
        $user = ModelUser::findOrFail($id);
        return view('user.user.show', compact('user'));
    }

    // ======================
    // FORM EDIT
    // ======================
    public function edit($id)
    {
        $user = ModelUser::findOrFail($id);
        return view('user.user.edit', compact('user'));
    }

    // ======================
    // UPDATE DATA
    // ======================
    public function update(Request $request, $id)
    {
        $user = ModelUser::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:user,username,' . $id,
            'password' => 'nullable',
            'role' => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'role' => $request->role
        ];

        // jika password diisi
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil diupdate');
    }

    // ======================
    // HAPUS DATA
    // ======================
    public function destroy($id)
    {
        $user = ModelUser::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil dihapus');
    }
}