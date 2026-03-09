@extends('layouts.admin')

@section('main')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Mata Pelajaran</h1>

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- Alert error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.mapel.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_mapel" class="form-label">Nama Mapel</label>
                    <input type="text"
                           name="nama_mapel"
                           id="nama_mapel"
                           class="form-control"
                           value="{{ old('nama_mapel') }}"
                           required>
                </div>

                <div class="mb-3">
                    <label for="kkm" class="form-label">KKM</label>
                    <input type="number"
                           name="kkm"
                           id="kkm"
                           class="form-control"
                           value="{{ old('kkm') }}"
                           required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('admin.mapel.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection