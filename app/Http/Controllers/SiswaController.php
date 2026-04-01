<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nis' => 'required|string|max:20|unique:siswa,nis',
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'no_tlpn' => 'required|string|max:15',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'email' => 'required|email|max:50',
            'password' => 'required|string|max:10',
        ]);

        // buat user
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa'
        ]);

        $validasi['user_id'] = $user->user_id;

        Siswa::create($validasi);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->update($request->all());

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}