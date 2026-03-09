@extends('layouts.admin')

@section('main')

<div class="container mt-4">
    <h1 class="mb-4">Halaman Jadwal</h1>

```
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="fw-semibold">Data Jadwal</span>

        @auth
        @if(Auth::user()->role == 'admin')
        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary btn-sm">
            + Tambah Jadwal
        </a>
        @endif
        @endauth
    </div>

    <div class="card-body">

        {{-- Alert sukses --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Alert jika data kosong --}}
        @if($jadwal->isEmpty())
            <div class="alert alert-warning text-center">
                Data jadwal belum tersedia.
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th>Kelas</th>
                        <th>Mapel</th>
                        <th>Guru</th>
                        <th>Hari</th>
                        <th>Jam</th>

                        @auth
                        @if(Auth::user()->role == 'admin')
                        <th width="15%">Aksi</th>
                        @endif
                        @endauth
                    </tr>
                </thead>

                <tbody>
                    @forelse($jadwal as $j)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $j->kelas->nama_kelas }}</td>
                        <td>{{ $j->mapel->nama_mapel }}</td>
                        <td>{{ $j->guru->nama }}</td>
                        <td>{{ $j->hari }}</td>
                        <td>
                            {{ $j->jam_mulai_format }} -
                            {{ $j->jam_selesai_format }}
                        </td>

                        @auth
                        @if(Auth::user()->role == 'admin')
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">

                                <a href="{{ route('admin.jadwal.edit', $j->id_jadwal) }}" 
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <button type="button" 
                                        class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $j->id_jadwal }}">
                                    Hapus
                                </button>

                            </div>
                        </td>
                        @endif
                        @endauth

                    </tr>

                    {{-- Modal Hapus hanya untuk admin --}}
                    @auth
                    @if(Auth::user()->role == 'admin')
                    <div class="modal fade" id="deleteModal{{ $j->id_jadwal }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                    <button type="button"
                                            class="btn-close btn-close-white"
                                            data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    Yakin ingin menghapus jadwal
                                    <strong>
                                        {{ $j->mapel->nama_mapel }} -
                                        {{ $j->kelas->nama_kelas }}
                                    </strong> ?
                                </div>

                                <div class="modal-footer">
                                    <button type="button"
                                            class="btn btn-secondary btn-sm"
                                            data-bs-dismiss="modal">
                                        Batal
                                    </button>

                                    <form action="{{ route('admin.jadwal.destroy',$j->id_jadwal) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm">
                                            Ya, Hapus
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif
                    @endauth

                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            Tidak ada data jadwal.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
```

</div>
@endsection
