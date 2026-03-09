<?php

namespace App\Http\Controllers\Siswa;  // Perhatikan huruf besar 'S' di Siswa

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;        // Perbaiki: dari siswa\Guru jadi Models\Guru
use App\Models\Jadwal;      // Perbaiki: dari siswa\Jadwal jadi Models\Jadwal
use App\Models\Siswa;       // Tambahkan jika perlu

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data siswa yang sedang login
        $user = Auth::user();
        $siswa = Siswa::where('user_id', $user->id)->first();
        
        // Ambil data jadwal untuk siswa
        $jadwal = Jadwal::where('id_kelas', $siswa->id_kelas ?? 0)
            ->with(['guru', 'mapel'])
            ->get();
        
        return view('siswa.dashboard', compact('siswa', 'jadwal'));
    }
}