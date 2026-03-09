<style>
.sidebar{
    background: linear-gradient(180deg,#0f5132,#198754);
}

/* logo */
.sidebar-logo{
    text-align:center;
    padding:25px 10px;
}

.logo-img{
    width:70px;
    margin-bottom:10px;
}

.logo-title{
    color:white;
    font-weight:700;
    letter-spacing:2px;
}

.logo-subtitle{
    font-size:11px;
    color:rgba(255,255,255,0.7);
}

/* menu */
.nav-secondary .nav-item a{
    color:white !important;
    padding:12px 20px;
    border-radius:10px;
    margin:3px 10px;
}

.nav-secondary .nav-item a:hover{
    background:rgba(255,255,255,0.15);
}

.nav-secondary .nav-item.active a{
    background:rgba(255,255,255,0.2);
    border-left:4px solid #ffd700;
}
</style>


<div class="sidebar">

    <!-- LOGO -->
    <div class="sidebar-logo">
        <img src="{{ asset('assets/img/OSIM-logo.png') }}" class="logo-img">

        <div class="logo-title">
            SIAMU
        </div>

        <div class="logo-subtitle">
            Sistem Informasi Akademik
        </div>
    </div>


    <ul class="nav nav-secondary">

        @if(auth()->check())

            {{-- ADMIN --}}
            @if(auth()->user()->role == 'admin')

            <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}">
                <a href="{{ route('admin.siswa.index') }}">
                    <i class="fas fa-user-graduate"></i>
                    <p>Siswa</p>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}">
                <a href="{{ route('admin.guru.index') }}">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <p>Guru</p>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.kelas.*') ? 'active' : '' }}">
                <a href="{{ route('admin.kelas.index') }}">
                    <i class="fas fa-school"></i>
                    <p>Kelas</p>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.mapel.*') ? 'active' : '' }}">
                <a href="{{ route('admin.mapel.index') }}">
                    <i class="fas fa-book"></i>
                    <p>Mapel</p>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.jadwal.*') ? 'active' : '' }}">
                <a href="{{ route('admin.jadwal.index') }}">
                    <i class="fas fa-calendar-alt"></i>
                    <p>Jadwal</p>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.nilai.*') ? 'active' : '' }}">
                <a href="{{ route('admin.nilai.index') }}">
                    <i class="fas fa-clipboard-list"></i>
                    <p>Nilai</p>
                </a>
            </li>

            @endif


            {{-- GURU --}}
            @if(auth()->user()->role == 'guru')

            <li class="nav-item {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
                <a href="{{ route('guru.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('guru.jadwal.*') ? 'active' : '' }}">
                <a href="{{ route('guru.jadwal.index') }}">
                    <i class="fas fa-calendar"></i>
                    <p>Jadwal Mengajar</p>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('guru.nilai.*') ? 'active' : '' }}">
                <a href="{{ route('guru.nilai.index') }}">
                    <i class="fas fa-edit"></i>
                    <p>Input Nilai</p>
                </a>
            </li>

            @endif


            {{-- SISWA --}}
            @if(auth()->user()->role == 'siswa')

            <li class="nav-item {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
                <a href="{{ route('siswa.dashboard') }}">
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('siswa.jadwal.*') ? 'active' : '' }}">
                <a href="{{ route('siswa.jadwal.index') }}">
                    <i class="fas fa-calendar"></i>
                    <p>Jadwal</p>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('siswa.nilai.*') ? 'active' : '' }}">
                <a href="{{ route('siswa.nilai.index') }}">
                    <i class="fas fa-clipboard-list"></i>
                    <p>Nilai</p>
                </a>
            </li>

            @endif

        @endif

    </ul>

</div>