<?php
namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::with('siswa','mapel')->get();
        return view('nilai.index', compact('nilais'));
    }

    public function create()
    {
        $siswas = Siswa::all();
        $mapels = Mapel::all();
        return view('nilai.create', compact('siswas','mapels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'mapel_id' => 'required',
            'semester' => 'required',
            'nilai' => 'required|numeric|min:0|max:100'
        ]);

        Nilai::create($request->all());

        return redirect()->route('admin.nilai.index')
            ->with('success','Data nilai berhasil ditambahkan');
    }

    public function edit(Nilai $nilai)
    {
        $siswas = Siswa::all();
        $mapels = Mapel::all();
        return view('nilai.edit', compact('nilai','siswas','mapels'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'siswa_id' => 'required',
            'mapel_id' => 'required',
            'semester' => 'required',
            'nilai' => 'required|numeric|min:0|max:100'
        ]);

        $nilai->update($request->all());

        return redirect()->route('admin.nilai.index')
            ->with('success','Data nilai berhasil diupdate');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect()->route('admin.nilai.index')
            ->with('success','Data nilai berhasil dihapus');
    }
}