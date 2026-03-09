<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SIAMU - Sistem Informasi Akademik</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('assets/css/fonts.min.css') }}"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    
    <!-- Custom CSS untuk memperbaiki tampilan -->
    <style>
        /* Memastikan navbar tidak hilang */
        .main-header {
            position: relative;
            z-index: 1030;
            width: 100%;
        }
        
        .main-panel {
            width: calc(100% - 250px);
            float: right;
            transition: all 0.3s;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 250px;
            z-index: 1029;
            transition: all 0.3s;
        }
        
        /* Fix untuk konten */
        .main-content {
            padding: 30px 30px 0;
            margin-top: 0;
            min-height: calc(100vh - 123px);
        }
        
        /* Navbar fix */
        .navbar-siamu-ultra {
            width: 100%;
            margin: 0;
            border-radius: 0;
        }
        
        /* Responsive */
        @media (max-width: 991px) {
            .main-panel {
                width: 100%;
            }
            
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        
        <div class="main-panel">
            <!-- Navbar Header -->
            <div class="main-header">
                @include('layouts.navbar')
            </div>
            
            <!-- Main Content -->
            <div class="main-content">
                @yield('main')
            </div>
            
            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    
    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    
    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>
    
    <!-- Additional Scripts -->
    <script>
        $(document).ready(function() {
            // Inisialisasi sidebar toggle
            $('.toggle-sidebar').on('click', function() {
                $('.sidebar').toggleClass('minimize');
            });
            
            // Inisialisasi scrollbar
            $('.scrollbar-inner').scrollbar();
        });
    </script>
</body>
</html>