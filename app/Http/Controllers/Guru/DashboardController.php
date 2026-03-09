<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Guru::where('user_id', Auth::id())->first();

        $jadwal = Jadwal::where('id_guru', $guru->id_guru ?? null)
                        ->with(['mapel','kelas'])
                        ->get();

        return view('guru.dashboard', compact('guru', 'jadwal'));
    }
}