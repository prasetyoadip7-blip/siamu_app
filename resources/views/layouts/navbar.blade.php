{{-- Navbar SIAMU - Theme Hijau sesuai Login --}}

<style>

.navbar-siamu{
    background: linear-gradient(135deg,#0f5132,#198754,#145c32);
    padding:10px 25px;
    min-height:70px;
}

.brand-area{
    display:flex;
    align-items:center;
    gap:10px;
}

.brand-logo{
    width:35px;
    filter:brightness(0) invert(1);
}

.brand-title{
    font-size:18px;
    font-weight:700;
    color:white;
    margin:0;
}

.brand-sub{
    font-size:11px;
    color:rgba(255,255,255,0.8);
}

.clock-box{
    background:rgba(255,255,255,0.15);
    padding:6px 14px;
    border-radius:30px;
    color:white;
    font-size:13px;
}

.icon-modern{
    color:white !important;
    font-size:18px;
    padding:10px;
    border-radius:50%;
    transition:.3s;
}

.icon-modern:hover{
    background:rgba(255,255,255,0.15);
}

.profile-modern{
    display:flex;
    align-items:center;
    gap:10px;
    color:white;
    text-decoration:none;
}

.profile-img{
    width:40px;
    height:40px;
    border-radius:50%;
    border:2px solid rgba(255,255,255,0.5);
}

.profile-info span{
    font-size:11px;
    display:block;
}

.profile-info strong{
    font-size:14px;
}

.dropdown-modern{
    border-radius:12px;
    border:none;
    box-shadow:0 15px 40px rgba(0,0,0,0.25);
}

</style>


<nav class="navbar navbar-expand-lg navbar-siamu">

<div class="container-fluid">

<div class="brand-area">

<img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png" class="brand-logo">

<div>
<div class="brand-title">SIAMU</div>
<div class="brand-sub">Sistem Informasi Akademik</div>
</div>

</div>


<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
<span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav ms-auto align-items-center">

<li class="nav-item me-3">

<div class="clock-box">

<i class="fa fa-calendar"></i>
<span id="liveDate"></span>

<i class="fa fa-clock ms-2"></i>
<span id="liveClock"></span>

</div>

</li>


<li class="nav-item dropdown me-2">

<a class="nav-link icon-modern" data-bs-toggle="dropdown">
<i class="fa fa-bell"></i>
</a>

<ul class="dropdown-menu dropdown-modern dropdown-menu-end">

<li class="dropdown-header">Notifikasi</li>

<li>
<a class="dropdown-item">Data siswa ditambahkan</a>
</li>

<li>
<a class="dropdown-item">Nilai diperbarui</a>
</li>

</ul>

</li>


<li class="nav-item dropdown">

<a class="nav-link profile-modern" data-bs-toggle="dropdown">

<img src="https://i.pravatar.cc/150?img=3" class="profile-img">

<div class="profile-info">

<span>Selamat datang</span>
<strong>{{ auth()->user()->name }}</strong>

</div>

</a>


<ul class="dropdown-menu dropdown-modern dropdown-menu-end">

<li class="dropdown-header text-center">

<strong>{{ auth()->user()->name }}</strong><br>
<small>{{ auth()->user()->email }}</small>

</li>

<li><hr class="dropdown-divider"></li>

<li>
<a href="{{ route('profile') }}" class="dropdown-item">
<i class="fas fa-user"></i> Profil
</a>
</li>

<li>
<a class="dropdown-item">
<i class="fa fa-cog"></i> Pengaturan
</a>
</li>

<li><hr class="dropdown-divider"></li>

<li>

<form method="POST" action="{{ route('logout') }}">
@csrf

<button class="dropdown-item text-danger">

<i class="fa fa-sign-out-alt"></i>
Logout

</button>

</form>

</li>

</ul>

</li>

</ul>

</div>

</div>

</nav>


<script>

function updateClock(){

const now = new Date();

document.getElementById("liveClock").innerText =
now.toLocaleTimeString('id-ID');

document.getElementById("liveDate").innerText =
now.toLocaleDateString('id-ID');

}

setInterval(updateClock,1000);

</script>