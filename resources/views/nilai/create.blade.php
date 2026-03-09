@extends('layouts.admin')

@section('main')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Nilai</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- Alert Error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.nilai.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Siswa</label>
                    <select name="siswa_id" class="form-select" required>
                        <option value="">-- Pilih Siswa --</option>
                        @foreach($siswas as $siswa)
                            <option value="{{ $siswa->id_siswa}}"
                                {{ old('siswa_id') == $siswa->id_siswa ? 'selected' : '' }}>
                                {{ $siswa->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <select name="mapel_id" class="form-select" required>
                        <option value="">-- Pilih Mapel --</option>
                        @foreach($mapels as $mapel)
                            <option value="{{ $mapel->id_mapel }}"
                                {{ old('mapel_id') == $mapel->id ? 'selected' : '' }}>
                                {{ $mapel->nama_mapel }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Semester</label>
                    <input type="text"
                           name="semester"
                           class="form-control"
                           value="{{ old('semester') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai</label>
                    <input type="number"
                           name="nilai"
                           class="form-control"
                           value="{{ old('nilai') }}"
                           min="0"
                           max="100"
                           required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.nilai.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection