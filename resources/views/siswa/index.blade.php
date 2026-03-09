<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h3>Data Siswa</h3>

    <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary">
        Tambah Siswa
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>No Telp</th>
            <th>Aksi</th>
        </tr>

        @foreach($siswa as $s)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $s->nis }}</td>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->kelas->nama_kelas }}</td>
            <td>{{ $s->no_tlpn }}</td>
            <td>
                   <a href="{{ route('admin.siswa.edit', $s->id_siswa) }}" 
       class="btn btn-warning btn-sm">
       Edit
    </a>

    <form action="{{ route('admin.siswa.destroy',$s->id_siswa) }}" 
          method="POST" 
          style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm">
            Hapus
        </button>
    </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

</body>
</html>