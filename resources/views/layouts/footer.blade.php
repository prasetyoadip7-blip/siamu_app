<footer class="footer-siamu">

<div class="container-fluid">

<div class="row align-items-center gy-3">

<!-- LEFT -->
<div class="col-lg-4 text-center text-lg-start">

<h6 class="footer-brand">SIAMU</h6>

<small class="footer-desc">
Sistem Informasi Akademik
</small>

</div>


<!-- CENTER -->
<div class="col-lg-4 text-center">

<ul class="footer-links">

<li><a href="#">Tentang</a></li>
<li><a href="#">Bantuan</a></li>
<li><a href="#">Kebijakan</a></li>

</ul>

</div>


<!-- RIGHT -->
<div class="col-lg-4 text-center text-lg-end">

<div class="footer-social">

<a href="#"><i class="fab fa-facebook-f"></i></a>
<a href="#"><i class="fab fa-instagram"></i></a>
<a href="#"><i class="fab fa-youtube"></i></a>

</div>

<div class="footer-copy mt-2">

© <span id="yearNow"></span> SIAMU • Made with Adip
<i class="fa fa-heart text-danger"></i>

</div>

</div>

</div>

</div>

</footer>



<style>

/* ===============================
   FOOTER SIAMU THEME HIJAU
================================ */

.footer-siamu{

background:linear-gradient(135deg,#0f5132,#198754,#145c32);

padding:28px 40px;

color:white;

margin-top:80px;

position:relative;

overflow:hidden;

}


/* Glow effect */

.footer-siamu::before{

content:"";

position:absolute;

width:400px;

height:400px;

background:radial-gradient(circle,rgba(255,215,0,0.15),transparent);

top:-150px;

right:-150px;

filter:blur(80px);

}



/* BRAND */

.footer-brand{

font-weight:800;

letter-spacing:2px;

margin-bottom:5px;

}


.footer-desc{

font-size:13px;

color:rgba(255,255,255,0.8);

}



/* LINKS */

.footer-links{

list-style:none;

padding:0;

margin:0;

display:flex;

justify-content:center;

gap:25px;

}


.footer-links a{

color:rgba(255,255,255,0.8);

text-decoration:none;

font-size:14px;

transition:.3s;

}


.footer-links a:hover{

color:#ffd700;

}



/* SOCIAL */

.footer-social a{

display:inline-flex;

align-items:center;

justify-content:center;

width:34px;

height:34px;

border-radius:50%;

background:rgba(255,255,255,0.15);

color:white;

margin-left:8px;

transition:.3s;

}


.footer-social a:hover{

background:#ffd700;

color:#0f5132;

transform:translateY(-3px);

}



/* COPYRIGHT */

.footer-copy{

font-size:13px;

color:rgba(255,255,255,0.85);

}

</style>



<script>

document.getElementById("yearNow").innerText = new Date().getFullYear();

</script>