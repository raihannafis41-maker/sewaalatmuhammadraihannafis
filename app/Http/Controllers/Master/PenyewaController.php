<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelPenyewa;
use Illuminate\Support\Facades\Hash;

class PenyewaController extends Controller
{
    public function index()
    {
        $data = ModelPenyewa::all();
        return view('user.Penyewa.index', compact('data'));
    }

    public function create()
    {
        return view('user.Penyewa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:penyewa,username',
            'password' => 'required',
            'nohp' => 'nullable',
            'alamat' => 'nullable'
        ]);

        ModelPenyewa::create([
            'nama' => $request->username, // 🔥 AUTO ISI
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('penyewa.index')
            ->with('success', 'Data penyewa berhasil ditambahkan');
    }

    public function show($id)
    {
        $penyewa = ModelPenyewa::findOrFail($id);
        return view('user.Penyewa.show', compact('penyewa'));
    }

    public function edit($id)
    {
        $penyewa = ModelPenyewa::findOrFail($id);
        return view('user.Penyewa.edit', compact('penyewa'));
    }

    public function update(Request $request, $id)
    {
        $penyewa = ModelPenyewa::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:penyewa,username,' . $id,
            'password' => 'nullable',
            'nohp' => 'nullable',
            'alamat' => 'nullable'
        ]);

        $data = [
            'nama' => $request->username, // 🔥 AUTO UPDATE
            'username' => $request->username,
            'nohp' => $request->nohp,
            'alamat' => $request->alamat
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $penyewa->update($data);

        return redirect()->route('penyewa.index')
            ->with('success', 'Data penyewa berhasil diupdate');
    }

    public function destroy($id)
    {
        $penyewa = ModelPenyewa::findOrFail($id);
        $penyewa->delete();

        return redirect()->route('penyewa.index')
            ->with('success', 'Data penyewa berhasil dihapus');
    }
}