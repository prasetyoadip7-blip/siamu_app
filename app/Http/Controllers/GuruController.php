<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }
    
    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_tlpn' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        // buat user dulu
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guru'
        ]);

        // buat guru
        Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_tlpn' => $request->no_tlpn,
            'user_id' => $user->user_id,
        ]);

        return redirect()->route('admin.guru.index')
                         ->with('success','Data Guru berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('admin.guru.index')
                         ->with('success','Data Guru berhasil dihapus');
    }

    public function edit($id)
    {
        $guru = Guru::with('user')->findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::with('user')->findOrFail($id);

        // update data guru
        $guru->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_tlpn' => $request->no_tlpn,
        ]);

        // update email user
        $guru->user->update([
            'email' => $request->email,
        ]);

        // update password jika diisi
        if($request->password){
            $guru->user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        return redirect()->route('admin.guru.index')
            ->with('success','Data guru berhasil diupdate');
    }

    /**
     * Menampilkan dashboard untuk guru
     */
    public function dashboard()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        // Ambil data guru berdasarkan user yang login
        $guru = Guru::where('user_id', $user->id)->first();
        
        if (!$guru) {
            return redirect()->route('login')
                ->with('error', 'Data guru tidak ditemukan');
        }

        // Hitung jumlah jadwal untuk guru ini
        $jadwalCount = Jadwal::where('guru_id', $guru->id)->count();
        
        // Ambil data jadwal terbaru (opsional)
        $jadwalTerbaru = Jadwal::where('guru_id', $guru->id)
            ->with('kelas', 'mapel')
            ->latest()
            ->take(5)
            ->get();
        
        // Data lain yang mungkin diperlukan di dashboard
        $data = [
            'guru' => $guru,
            'jadwalCount' => $jadwalCount,
            'jadwalTerbaru' => $jadwalTerbaru,
            // tambahkan data lain sesuai kebutuhan
        ];

        return view('guru.dashboard', $data);
    }
}