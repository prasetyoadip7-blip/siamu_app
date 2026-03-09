<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - SIAMU</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:'Segoe UI',sans-serif;
    background:linear-gradient(135deg,#0f5132,#198754,#145c32);
    overflow:hidden;
}

/* Background Glow Islami */
body::before{
    content:"";
    position:absolute;
    width:600px;
    height:600px;
    background:radial-gradient(circle, rgba(255,215,0,0.2), transparent 70%);
    top:-200px;
    right:-200px;
    filter:blur(80px);
}

body::after{
    content:"";
    position:absolute;
    width:500px;
    height:500px;
    background:radial-gradient(circle, rgba(255,255,255,0.08), transparent 70%);
    bottom:-200px;
    left:-200px;
    filter:blur(100px);
}

/* ===== CARD GLASS ===== */
.login-container{
    width:1000px;
    max-width:95%;
    min-height:600px;
    border-radius:30px;
    display:flex;
    overflow:hidden;

    /* Glass Effect */
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(20px);
    -webkit-backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,0.2);
    box-shadow:0 30px 80px rgba(0,0,0,0.4);

    animation:fadeIn 1.2s ease;
}

/* ===== FORM SIDE ===== */
.form-side{
    flex:1;
    background:rgba(255,255,255,0.95);
    display:flex;
    align-items:center;
    justify-content:center;
    padding:60px;
}

.form-wrapper{
    width:100%;
    max-width:400px;
}

.logo-area{
    text-align:center;
    margin-bottom:30px;
}

.logo-area img{
    height:90px;
    animation:float 4s ease-in-out infinite;
}

.logo-area h5{
    margin-top:15px;
    font-weight:700;
    color:#198754;
    letter-spacing:1px;
}

/* FORM STYLE */
.form-control{
    border-radius:12px;
    padding:12px;
    border:1px solid #dcdcdc;
}

.form-control:focus{
    border-color:#198754;
    box-shadow:0 0 0 3px rgba(25,135,84,0.2);
}

.btn-login{
    background:#198754;
    color:#fff;
    border-radius:30px;
    font-weight:600;
    padding:10px;
    transition:0.3s;
}

.btn-login:hover{
    background:#145c32;
    transform:translateY(-3px);
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

/* ===== PANEL ISLAMI ===== */
.overlay-side{
    flex:1;
    background:linear-gradient(135deg,#0f5132,#198754);
    color:#fff;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    border-top-left-radius:200px;
    border-bottom-left-radius:200px;
    text-align:center;
    padding:40px;
    position:relative;
}

.overlay-img{
    width:220px;
    height:220px;
    object-fit:cover;
    border-radius:25px;
    box-shadow:0 20px 50px rgba(0,0,0,0.4);
    border:4px solid rgba(255,215,0,0.6);
    animation:float 5s ease-in-out infinite;
}

.overlay-side h2{
    font-size:32px;
    font-weight:700;
    margin-top:30px;
}

.overlay-side p{
    font-size:14px;
    margin-top:15px;
    opacity:0.9;
}

.btn-outline-light{
    border-radius:30px;
    padding:8px 20px;
    border:2px solid #ffd700;
    color:#ffd700;
    transition:0.3s;
}

.btn-outline-light:hover{
    background:#ffd700;
    color:#0f5132;
}

/* ===== ANIMATIONS ===== */
@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(40px) scale(0.98);
    }
    to{
        opacity:1;
        transform:translateY(0) scale(1);
    }
}

@keyframes float{
    0%{transform:translateY(0);}
    50%{transform:translateY(-12px);}
    100%{transform:translateY(0);}
}

/* ===== RESPONSIVE ===== */
@media(max-width:768px){
    .login-container{
        flex-direction:column;
    }
    .overlay-side{
        border-radius:0;
        padding:50px 20px;
    }
}
</style>
</head>

<body>

<div class="login-container">

    <!-- FORM LOGIN -->
    <div class="form-side">
        <div class="form-wrapper">

            <div class="logo-area">
                <img src="{{ asset('assets/img/OSIM-logo.png') }}" alt="Logo Sekolah">
                <h5>Selamat Datang di SIAMU</h5>
            </div>

            <h4 class="mb-4 fw-bold">Masuk Akun</h4>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Email"
                           value="{{ old('email') }}"
                           required autofocus>
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Password"
                           required>
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="remember" class="form-check-input">
                    <label class="form-check-label">Ingat Saya</label>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-login">
                        Masuk
                    </button>
                </div>

                <div class="text-end">
                    <a href="{{ route('password.request') }}" class="small">
                        Lupa Password?
                    </a>
                </div>

            </form>

        </div>
    </div>

    <!-- PANEL ISLAMI -->
    <div class="overlay-side">

        <img src="{{ asset('assets/img/santriku.jpg') }}"
             alt="Foto Pesantren"
             class="overlay-img">

        <h2>Assalamu'alaikum</h2>

        <p>
            Sistem Informasi Akademik<br>
            MTs MU MArgomulyo
        </p>

        <a href="{{ route('register') }}"
           class="btn btn-outline-light mt-3">
            Daftar Akun
        </a>

    </div>

</div>

</body>
</html>