@extends('layouts.admin')

@section('main')
<div class="container mt-4">
    <h1 class="mb-4">Data Nilai</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
                <h5 class="mb-0">Daftar Nilai Siswa</h5>
                <a href="{{ route('admin.nilai.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Nilai
                </a>
            </div>

            {{-- Alert Success --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Siswa</th>
                            <th>Mata Pelajaran</th>
                            <th width="10%">Semester</th>
                            <th width="10%">Nilai</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($nilais as $index => $nilai)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $nilai->siswa->nama ?? '-' }}</td>
                            <td>{{ $nilai->mapel->nama_mapel ?? '-' }}</td>
                            <td class="text-center">{{ $nilai->semester }}</td>
                            <td class="text-center">
                                <span class="badge bg-success">
                                    {{ $nilai->nilai }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.nilai.edit', $nilai->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.nilai.destroy', $nilai->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus data?')" 
                                            class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                Data belum tersedia.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection