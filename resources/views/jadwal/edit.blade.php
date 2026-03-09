@extends('layouts.admin')

@section('main')
<div class="container mt-4">
    <h1 class="mb-4">Edit Jadwal</h1>

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

            <form action="{{ route('admin.jadwal.update',$jadwal->id_jadwal) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="id_kelas" class="form-label">Kelas</label>
                    <select name="id_kelas" id="id_kelas" class="form-select" required>
                        @foreach($kelas as $k)
                            <option value="{{ $k->id_kelas }}"
                                {{ old('id_kelas', $jadwal->id_kelas) == $k->id_kelas ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_mapel" class="form-label">Mapel</label>
                    <select name="id_mapel" id="id_mapel" class="form-select" required>
                        @foreach($mapel as $m)
                            <option value="{{ $m->id_mapel }}"
                                {{ old('id_mapel', $jadwal->id_mapel) == $m->id_mapel ? 'selected' : '' }}>
                                {{ $m->nama_mapel }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_guru" class="form-label">Guru</label>
                    <select name="id_guru" id="id_guru" class="form-select" required>
                        @foreach($guru as $g)
                            <option value="{{ $g->id_guru }}"
                                {{ old('id_guru', $jadwal->id_guru) == $g->id_guru ? 'selected' : '' }}>
                                {{ $g->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="hari" class="form-label">Hari</label>
                    <select name="hari" id="hari" class="form-select" required>
                        @php
                            $hariList = ['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'];
                        @endphp

                        @foreach($hariList as $h)
                            <option value="{{ $h }}"
                                {{ old('hari', $jadwal->hari) == $h ? 'selected' : '' }}>
                                {{ $h }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jam_mulai" class="form-label">Jam Mulai</label>
                    <input type="time" 
                           name="jam_mulai" 
                           id="jam_mulai"
                           value="{{ old('jam_mulai', $jadwal->jam_mulai) }}"
                           class="form-control" 
                           required>
                </div>

                <div class="mb-3">
                    <label for="jam_selesai" class="form-label">Jam Selesai</label>
                    <input type="time" 
                           name="jam_selesai" 
                           id="jam_selesai"
                           value="{{ old('jam_selesai', $jadwal->jam_selesai) }}"
                           class="form-control" 
                           required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection