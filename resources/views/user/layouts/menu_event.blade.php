<style>
    .logo-desktop {
        display: inline;
    }

    .logo-mobile {
        display: none;
        width: 35px;
        height: auto;
    }

    .menu-wrapper a {
        font-size: 1rem;
    }

    @media (max-width: 700px) {
        .menu-wrapper a {
            font-size: 0.85rem;
        }
    }

    @media (max-width: 500px) {
        .menu-wrapper a {
            font-size: 0.75rem;
        }
    }

    @media (max-width: 700px) {
        .logo-desktop {
            display: none !important;
        }

        .logo-mobile {
            display: inline !important;
        }

        .menu-wrapper {
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }
    }
</style>
<nav class="navbar shadow-nav fixed-top bg-white">
    <div class="container-fluid">
        <div class="row justify-content-center w-100">
            <div class="col-12 col-xl-8">
                <div class="d-flex align-items-center p-2 flex-wrap justify-content-between">

                    <!-- Logo -->
                    <a class="navbar-brand me-3" href="{{ url('/') }}">
                        <!-- Logo besar -->
                        <img src="{{ asset('logo.png') }}" alt="Logo Besar" class="logo-desktop" width="120">
                        <!-- Logo kecil -->
                        <img src="{{ asset('logo_kecil.png') }}" alt="Logo Kecil" class="logo-mobile" width="60">
                    </a>

                    <!-- Menu -->
                    <div class="menu-wrapper d-flex align-items-center flex-wrap justify-content-end" style="gap:16px;">
                        <a class="nav-link px-2" href="javascript:void(0);"
                            onclick="scrollToSection('deskripsi')">Deskripsi</a>
                        <a class="nav-link px-2" href="javascript:void(0);"
                            onclick="scrollToSection('leaderboard')">Leaderboard</a>
                        <a class="nav-link px-2" href="javascript:void(0);"
                            onclick="scrollToSection('finalis')">Finalis</a>
                        <a class="nav-link px-2" href="javascript:void(0);"
                            onclick="scrollToSection('pesan-masuk')">Dukungan</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
