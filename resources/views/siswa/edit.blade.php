@extends('layouts.admin')

@section('main')
<div class="container mt-4">
    <h1 class="mb-4">Edit Siswa</h1>

    <div class="card">
        <div class="card-header">
            Form Edit Siswa
        </div>

        <div class="card-body">
            <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">NIS</label>
                    <input type="text" 
                           name="nis" 
                           value="{{ $siswa->nis }}" 
                           class="form-control" 
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" 
                           name="nama" 
                           value="{{ $siswa->nama }}" 
                           class="form-control" 
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" 
                           name="alamat" 
                           value="{{ $siswa->alamat }}" 
                           class="form-control" 
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Telpon</label>
                    <input type="text" 
                           name="no_tlpn" 
                           value="{{ $siswa->no_tlpn }}" 
                           class="form-control" 
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select name="id_kelas" class="form-select" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id_kelas }}"
                                {{ $siswa->id_kelas == $k->id_kelas ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                   <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        Update
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection