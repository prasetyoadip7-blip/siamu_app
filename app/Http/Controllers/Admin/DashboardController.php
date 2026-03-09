<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\Jadwal;
use App\Models\Nilai;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Ringkas
        $jumlahSiswa = Siswa::count();
        $jumlahGuru = Guru::count();
        $jumlahKelas = Kelas::count();
        $jumlahMapel = Mapel::count();

        // Jadwal Hari Ini
        $hariIni = Carbon::now()->locale('id')->isoFormat('dddd');
        $jadwalHariIni = Jadwal::with(['kelas','mapel','guru'])
                                ->where('hari', $hariIni)
                                ->get();

        // Aktivitas Terbaru (5 terakhir)
        $jadwalBaru = Jadwal::with(['kelas','mapel','guru'])
                        ->orderBy('created_at','desc')
                        ->take(5)
                        ->get()
                        ->map(fn($item) => [
                            'waktu' => $item->created_at,
                            'kegiatan' => "Jadwal baru untuk kelas {$item->kelas->nama_kelas} - {$item->mapel->nama_mapel} dibuat oleh {$item->guru->nama}"
                        ]);

        // Nilai terbaru (hapus relasi guru, karena memang tidak ada di model Nilai)
        $nilaiBaru = Nilai::with(['siswa','mapel'])
                        ->orderBy('created_at','desc')
                        ->take(5)
                        ->get()
                        ->map(fn($item) => [
                            'waktu' => $item->created_at,
                            'kegiatan' => "Nilai baru untuk siswa {$item->siswa->nama} pada mapel {$item->mapel->nama_mapel} dimasukkan"
                        ]);

        // Gabungkan semua aktivitas terbaru
        $aktivitasTerbaru = $jadwalBaru->merge($nilaiBaru)
                                      ->sortByDesc('waktu')
                                      ->take(5);

        return view('admin.dashboard', compact(
            'jumlahSiswa',
            'jumlahGuru',
            'jumlahKelas',
            'jumlahMapel',
            'jadwalHariIni',
            'aktivitasTerbaru'
        ));
    }
}