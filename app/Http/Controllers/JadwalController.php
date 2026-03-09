<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['kelas','guru','mapel'])->get();
        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $guru = Guru::all();
        $mapel = Mapel::all();

        return view('jadwal.create', compact('kelas','guru','mapel'));
    }

    public function store(Request $request)
    {
        Jadwal::create($request->all());

        return redirect()->route('admin.jadwal.index')
            ->with('success','Jadwal berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();

        return redirect()->route('admin.jadwal.index')
            ->with('success','Jadwal berhasil dihapus');
    }

    public function edit($id)
{
    $jadwal = Jadwal::findOrFail($id);
    $kelas = Kelas::all();
    $guru = Guru::all();
    $mapel = Mapel::all();

    return view('jadwal.edit', compact('jadwal','kelas','guru','mapel'));
}

public function update(Request $request, $id)
{
    $jadwal = Jadwal::findOrFail($id);

    $jadwal->update([
        'id_kelas' => $request->id_kelas,
        'id_guru' => $request->id_guru,
        'id_mapel' => $request->id_mapel,
        'hari' => $request->hari,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
    ]);

    return redirect()->route('admin.jadwal.index')
        ->with('success','Jadwal berhasil diupdate');
}
}