@extends('layouts.admin')

@section('main')
<style>
    /* Background gradient untuk dashboard */
    body {
        background: linear-gradient(135deg, #e3f2fd 0%, #ffffff 100%);
    }

    /* Card custom */
    .card-dashboard {
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        transition: transform 0.2s;
    }

    .card-dashboard:hover {
        transform: translateY(-5px);
    }

    /* Gradient card warna */
    .bg-card-siswa { background: linear-gradient(135deg, #4e73df 0%, #224abe 100%); color: #fff; }
    .bg-card-guru { background: linear-gradient(135deg, #1cc88a 0%, #17a673 100%); color: #fff; }
    .bg-card-kelas { background: linear-gradient(135deg, #f6c23e 0%, #dda20a 100%); color: #fff; }
    .bg-card-mapel { background: linear-gradient(135deg, #e74a3b 0%, #c02b1d 100%); color: #fff; }

    /* Tabel Jadwal */
    .table-jadwal th {
        background-color: #0d6efd;
        color: #fff;
    }
    .table-jadwal td {
        vertical-align: middle;
    }

    /* Aktivitas terbaru */
    .list-group-item {
        border-radius: 8px;
        margin-bottom: 5px;
    }
</style>

<div class="container mt-4">
    <h2 class="mb-4 fw-bold">Dashboard Admin</h2>

    <!-- Statistik Ringkas -->
    <div class="row g-3">
        <!-- Card Siswa -->
        <div class="col-md-3">
            <div class="card card-dashboard bg-card-siswa border-0 text-center">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fw-light">Jumlah Siswa</h6>
                        <h2 class="fw-bold">{{ $jumlahSiswa }}</h2>
                    </div>
                    <i class="fas fa-user-graduate fa-2x"></i>
                </div>
            </div>
        </div>

        <!-- Card Guru -->
        <div class="col-md-3">
            <div class="card card-dashboard bg-card-guru border-0 text-center">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fw-light">Jumlah Guru</h6>
                        <h2 class="fw-bold">{{ $jumlahGuru }}</h2>
                    </div>
                    <i class="fas fa-chalkboard-teacher fa-2x"></i>
                </div>
            </div>
        </div>

        <!-- Card Kelas -->
        <div class="col-md-3">
            <div class="card card-dashboard bg-card-kelas border-0 text-center">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fw-light">Jumlah Kelas</h6>
                        <h2 class="fw-bold">{{ $jumlahKelas }}</h2>
                    </div>
                    <i class="fas fa-school fa-2x"></i>
                </div>
            </div>
        </div>

        <!-- Card Mapel -->
        <div class="col-md-3">
            <div class="card card-dashboard bg-card-mapel border-0 text-center">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fw-light">Jumlah Mapel</h6>
                        <h2 class="fw-bold">{{ $jumlahMapel }}</h2>
                    </div>
                    <i class="fas fa-book fa-2x"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Jadwal Hari Ini -->
    <div class="card shadow-sm border-0 mt-4 card-dashboard">
        <div class="card-header bg-primary text-white fw-bold">Jadwal Hari Ini</div>
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0 table-jadwal">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Kelas</th>
                        <th>Mapel</th>
                        <th>Guru</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($jadwalHariIni as $jadwal)
                    <tr>
                        <td>{{ $jadwal->hari }}</td>
                        <td class="text-primary fw-bold">{{ $jadwal->jam_format }}</td>
                        <td class="fw-bold">{{ $jadwal->kelas->nama_kelas }}</td>
                        <td>{{ $jadwal->mapel->nama_mapel }}</td>
                        <td class="text-success">{{ $jadwal->guru->nama }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada jadwal hari ini</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Aktivitas Terbaru -->
    <div class="card shadow-sm border-0 mt-4 card-dashboard">
        <div class="card-header bg-success text-white fw-bold">Aktivitas Terbaru</div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @forelse($aktivitasTerbaru as $aktivitas)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div>
                            <span class="fw-bold">{{ \Carbon\Carbon::parse($aktivitas['waktu'])->format('d M Y H:i') }}</span>
                            <div>{{ $aktivitas['kegiatan'] }}</div>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center">Belum ada aktivitas terbaru</li>
                @endforelse
            </ul>
        </div>
    </div>

</div>
@endsection