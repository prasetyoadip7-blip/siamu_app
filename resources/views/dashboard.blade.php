@extends('layouts.admin')

@section('main')

<div class="container mt-4">

    <h2 class="mb-4">Dashboard Siswa</h2>

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            Selamat Datang
        </div>

        <div class="card-body">

            <p class="mb-2">
                Halo <strong>{{ auth()->user()->name }}</strong>
            </p>

            <p>
                Selamat datang di <b>Sistem Informasi Akademik (SIAMU)</b>.
            </p>

        </div>
    </div>

</div>

@endsection