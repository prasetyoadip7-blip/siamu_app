@extends('layouts.admin')

@section('main')
<div class="container mt-4">
    <h1 class="mb-4">Halaman Kelas</h1>

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="fw-semibold">Data Kelas</span>
            <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary btn-sm">
                + Tambah Kelas
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
            @if($kelas->isEmpty())
                <div class="alert alert-warning text-center">
                    Data kelas belum tersedia.
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Kelas</th>
                            <th>Tahun Ajaran</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kelas as $k)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $k->nama_kelas }}</td>
                            <td>{{ $k->tahun_ajaran }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">

                                    <a href="{{ route('admin.kelas.edit',$k->id_kelas) }}" 
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <button type="button" 
                                            class="btn btn-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $k->id_kelas }}">
                                        Hapus
                                    </button>

                                </div>
                            </td>
                        </tr>

                        <!-- Modal Hapus -->
                        <div class="modal fade" id="deleteModal{{ $k->id_kelas }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                        <button type="button" 
                                                class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        Yakin ingin menghapus kelas 
                                        <strong>{{ $k->nama_kelas }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" 
                                                class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal">
                                            Batal
                                        </button>

                                        <form action="{{ route('admin.kelas.destroy',$k->id_kelas) }}" 
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
                            <td colspan="4" class="text-center text-muted">
                                Tidak ada data kelas.
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