<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();
        return view('mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_mapel' => 'required',
        'kkm' => 'required|numeric'
    ]);

    Mapel::create([
        'nama_mapel' => $request->nama_mapel,
        'kkm' => $request->kkm
    ]);

    return redirect()->route('admin.mapel.index')
                     ->with('success', 'Data berhasil ditambahkan');
}

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
{
    $mapel = Mapel::findOrFail($id);

    $mapel->update([
        'nama_mapel' => $request->nama_mapel
    ]);

    return redirect()->route('admin.mapel.index')
        ->with('success','Data mapel berhasil diupdate');
}
    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('admin.mapel.index')
                         ->with('success', 'Data berhasil dihapus');
    }

    

}