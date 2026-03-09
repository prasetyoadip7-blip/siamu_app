@extends('layouts.admin')

@section('main')
<div class="container mt-4">
    <h1 class="mb-4">Edit Nilai</h1>

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

            <form action="{{ route('admin.nilai.update', $nilai->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Siswa</label>
                    <select name="siswa_id" class="form-select" required>
                        @foreach($siswas as $siswa)
                            <option value="{{ $siswa->id }}"
                                {{ $nilai->siswa_id == $siswa->id ? 'selected' : '' }}>
                                {{ $siswa->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <select name="mapel_id" class="form-select" required>
                        @foreach($mapels as $mapel)
                            <option value="{{ $mapel->id }}"
                                {{ $nilai->mapel_id == $mapel->id ? 'selected' : '' }}>
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
                           value="{{ old('semester', $nilai->semester) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai</label>
                    <input type="number"
                           name="nilai"
                           class="form-control"
                           value="{{ old('nilai', $nilai->nilai) }}"
                           min="0"
                           max="100"
                           required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
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