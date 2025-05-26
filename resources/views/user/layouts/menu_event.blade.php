<nav class="navbar shadow-nav fixed-top bg-white">
    <div class="container-fluid">
        <div class="row justify-content-center w-100">
            <div class="col-12 col-xl-8">
                <div class="d-flex align-items-center p-2 flex-wrap justify-content-between">
                    <!-- Logo -->
                    <a class="navbar-brand me-3" href="{{ url('/') }}">
                        <img src="{{ asset('logo.png') }}" alt="Logo" width="100">
                    </a>

                    <!-- Menu -->
                    <div class="menu-wrapper d-flex align-items-center flex-wrap justify-content-end" style="gap:16px;">
                        <a class="nav-link px-2" href="javascript:void(0);"
                            onclick="scrollToSection('deskripsi')">Deskripsi</a>
                        <a class="nav-link px-2" href="javascript:void(0);"
                            onclick="scrollToSection('leaderboard')">Leaderboard</a>
                        <a class="nav-link px-2" href="javascript:void(0);"
                            onclick="scrollToSection('finalis')">Finalis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
