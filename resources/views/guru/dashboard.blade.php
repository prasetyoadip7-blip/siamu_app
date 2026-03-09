@extends('layouts.guru')

@section('main')

<style>
.container {
    padding: 20px;
}

.header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 25px;
    border-radius: 15px;
    margin-bottom: 25px;
}

.header h2 {
    margin: 0;
    font-weight: 600;
}

.header p {
    margin: 5px 0 0;
    opacity: 0.9;
}

.table-card {
    background: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #f8fafc;
    padding: 12px;
    text-align: left;
    font-weight: 600;
    color: #4a5568;
    border-bottom: 2px solid #e2e8f0;
}

td {
    padding: 12px;
    border-bottom: 1px solid #e2e8f0;
}

tr:hover {
    background: #f7fafc;
}

.badge {
    background: #e9ecef;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 12px;
    color: #495057;
}

.empty {
    text-align: center;
    padding: 50px;
    color: #718096;
}

.empty i {
    font-size: 50px;
    margin-bottom: 15px;
    color: #cbd5e0;
}
</style>

<div class="container">
    <!-- Header Sederhana -->
    <div class="header">
        <h2>Dashboard Guru</h2>
        <p>{{ $guru->nama ?? 'Guru' }} | {{ date('d F Y') }}</p>
    </div>

    <!-- Hanya Jadwal Mapel -->
    <div class="table-card">
        <h3 style="margin-top: 0; margin-bottom: 20px;">📚 Jadwal Mata Pelajaran</h3>
        
        @if(isset($jadwal) && count($jadwal) > 0)
            <table>
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwal as $j)
                    <tr>
                        <td>
                            <span class="badge">{{ $j->hari ?? '-' }}</span>
                        </td>
                        <td><strong>{{ $j->mapel->nama_mapel ?? '-' }}</strong></td>
                        <td>{{ $j->kelas->nama_kelas ?? '-' }}</td>
                        <td>
                            @if(isset($j->jam_mulai) && isset($j->jam_selesai))
                                {{ $j->jam_mulai }} - {{ $j->jam_selesai }}
                            @else
                                07:00 - 08:30
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty">
                <i class="fa fa-calendar-times"></i>
                <p>Belum ada jadwal mata pelajaran</p>
            </div>
        @endif
    </div>
</div>
@endsection