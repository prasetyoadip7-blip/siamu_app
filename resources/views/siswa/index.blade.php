@extends('layouts.admin')

@section('main')
<div class="container mt-4">
    <h1 class="mb-4">Halaman Siswa</h1>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="fw-semibold">Data Siswa</span>
            <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary btn-sm">
                + Tambah Siswa
            </a>
        </div>

        <div class="card-body">

            {{-- Alert sukses --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Alert jika data kosong --}}
            @if($siswa->isEmpty())
                <div class="alert alert-warning text-center">
                    Data siswa belum tersedia.
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>No Telp</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($siswa as $s)

                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $s->nis }}</td>
                            <td>{{ $s->nama }}</td>
                            <td>{{ $s->kelas->nama_kelas }}</td>
                            <td>{{ $s->no_tlpn }}</td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">

                                    <a href="{{ route('admin.siswa.edit', $s->id_siswa) }}" 
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <button type="button" 
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $s->id_siswa }}">
                                        Hapus
                                    </button>

                                </div>
                            </td>
                        </tr>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="deleteModal{{ $s->id_siswa }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                        <button type="button" 
                                                class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        Yakin ingin menghapus data siswa 
                                        <strong>{{ $s->nama }}</strong>?
                                    </div>

                                    <div class="modal-footer">

                                        <button type="button" 
                                                class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal">
                                            Batal
                                        </button>

                                        <form action="{{ route('admin.siswa.destroy',$s->id_siswa) }}" 
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

                        @empty

                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Tidak ada data siswa.
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