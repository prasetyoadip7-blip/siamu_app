@extends('layouts.admin')

@section('main')
<div class="container mt-4">
    <h1 class="mb-4">Edit Guru</h1>

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

            <form action="{{ route('admin.guru.update', $guru->id_guru) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" name="nip" id="nip" 
                           class="form-control" 
                           value="{{ old('nip', $guru->nip) }}" 
                           required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" 
                           class="form-control" 
                           value="{{ old('nama', $guru->nama) }}" 
                           required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" 
                           class="form-control" 
                           value="{{ old('alamat', $guru->alamat) }}" 
                           required>
                </div>

                <div class="mb-3">
                    <label for="no_tlpn" class="form-label">No Telp</label>
                    <input type="text" name="no_tlpn" id="no_tlpn" 
                           class="form-control" 
                           value="{{ old('no_tlpn', $guru->no_tlpn) }}" 
                           required>
                </div>

                <hr>
                <h5>Edit Akun Login</h5>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" 
                           class="form-control" 
                           value="{{ old('email', $guru->user->email ?? '') }}" 
                           required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        Password (Kosongkan jika tidak diubah)
                    </label>
                    <input type="password" name="password" id="password" 
                           class="form-control">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection