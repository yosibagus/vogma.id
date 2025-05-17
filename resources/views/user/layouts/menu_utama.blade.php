<nav class="navbar navbar-expand-lg shadow-nav">
    <div class="container-fluid">
        <div class="row justify-content-center w-100">
            <div class="col-12 col-xl-8">
                <div class="d-flex align-items-center p-2 flex-wrap">
                    <!-- Logo -->
                    <a class="navbar-brand me-3" href="#">
                        <img src="{{ asset('logo.png') }}" alt="Logo" width="130">
                    </a>

                    <!-- Search Bar -->
                    <div class="position-relative flex-grow-1 me-3 ms-lg-5 d-none d-md-block">
                        <input type="text" class="form-control ps-5 w-100" placeholder="Cari sesuatu...">
                        <i
                            class="mdi mdi-magnify position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                    </div>

                    <!-- Toggle Button (Mobile) -->
                    <button class="navbar-toggler btn btn-gold ms-auto d-lg-none" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <span class="mdi mdi-filter-variant"></span>
                    </button>

                    <!-- Navbar Menu -->
                    <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                        <div class="d-flex align-items-center flex-wrap">
                            <button class="btn btn-light me-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalHubungi">
                                <b>Hubungi <span class="mdi mdi-chevron-down"></span></b>
                            </button>
                            <button class="btn btn-light me-2">
                                <b><img src="https://www.ancol.com/images/flags/id.png" alt=""> ID <span
                                        class="mdi mdi-chevron-down"></span></b>
                            </button>
                            <button class="btn btn-gold me-2 ms-lg-3" type="submit"><b>Masuk</b></button>
                            <button class="btn btn-outline-gold" type="submit"><b>Daftar Event</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-start offcanvas-full" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header bg-gold">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
            <img src="logo.png" width="100" alt="">
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0" style="background-color: #e8da001f;">
        <div class="shadow-nav p-3">
            <div class="row">
                <div class="col-12 text-dark">
                    <h5>Belum punya akun?</h5>
                    <p>Login untuk menggunakan semua fitur di Kreen</p>
                </div>
                <div class="col-6">
                    <a href="" class="btn btn-outline-gold w-100 py-3">Daftar Event</a>
                </div>
                <div class="col-6">
                    <a href="" class="btn btn-gold w-100 py-3">Masuk</a>
                </div>
            </div>
        </div>
        <div class="shadow-nav p-3 mt-2">
            <div class="row">
                <div class="col-12 text-dark">
                    <h5>Belum punya akun?</h5>
                    <p>Login untuk menggunakan semua fitur di Kreen</p>
                </div>
                <div class="col-6">
                    <a href="" class="btn btn-outline-gold w-100 py-3">Daftar Event</a>
                </div>
                <div class="col-6">
                    <a href="" class="btn btn-gold w-100 py-3">Masuk</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalHubungi" tabindex="-1" aria-labelledby="modalHubungiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gold">
                <div class="d-flex" style="background-color: #fff; border-radius: 10px; padding: 6px;">
                    <span class="mdi mdi-phone text-primary"></span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 style="font-weight: 600;">Kontak Kami</h5>
                <p>Kami siap melayani, hubungi kami jika ada masalah atau konsultasi.</p>
                <div style="border-top: 1px dashed rgba(218, 218, 218, 1); padding: 8px 0 8px 0;"></div>
                <ol class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <svg width="20" height="20" viewBox="0 0 256 256"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid">
                                    <defs>
                                        <linearGradient id="gradient" x1="50%" x2="50%" y1="100%"
                                            y2="0%">
                                            <stop offset="0%" style="stop-color:#f9ce34; stop-opacity:1" />
                                            <stop offset="50%" style="stop-color:#ee2a7b; stop-opacity:1" />
                                            <stop offset="100%" style="stop-color:#6228d7; stop-opacity:1" />
                                        </linearGradient>
                                    </defs>
                                    <rect width="256" height="256" rx="60" fill="url(#gradient)" />
                                    <circle cx="128" cy="128" r="48" fill="none" stroke="white"
                                        stroke-width="14" />
                                    <circle cx="192" cy="64" r="12" fill="white" />
                                    <rect x="40" y="40" width="176" height="176" rx="60" fill="none"
                                        stroke="white" stroke-width="14" />
                                </svg>
                                @vogma.id
                            </div>
                        </div>
                        <span class="badge bg-gold">Kunjungi</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <svg width="20" height="20" viewBox="0 0 256 180"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid">
                                    <path fill="#FF0000"
                                        d="M250.34,28.62c-2.92-10.94-11.52-19.54-22.46-22.46C203.58,0,128,0,128,0s-75.58,0-99.88,6.16 C17.18,9.08,8.58,17.68,5.66,28.62C0,52.92,0,90,0,90s0,37.08,5.66,61.38c2.92,10.94,11.52,19.54,22.46,22.46 C52.42,180,128,180,128,180s75.58,0,99.88-6.16c10.94-2.92,19.54-11.52,22.46-22.46c5.66-24.3,5.66-61.38,5.66-61.38 S256,52.92,250.34,28.62z" />
                                    <polygon fill="#FFFFFF" points="102,129.9 168,90 102,50.1" />
                                </svg>
                                Onjhur Grup TV
                            </div>
                        </div>
                        <span class="badge bg-gold">Kunjungi</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <svg width="20" height="20" viewBox="0 0 256 193"
                                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid">
                                    <path fill="#EA4335"
                                        d="M58 7L128 57L198 7H248C252.4 7 256 10.6 256 15V178C256 182.4 252.4 186 248 186H198V64L128 114L58 64V186H8C3.6 186 0 182.4 0 178V15C0 10.6 3.6 7 8 7H58Z" />
                                    <path fill="#34A853" d="M0 15C0 10.6 3.6 7 8 7H58V64L0 15Z" />
                                    <path fill="#FBBC04" d="M256 15C256 10.6 252.4 7 248 7H198V64L256 15Z" />
                                    <path fill="#4285F4"
                                        d="M58 186V64L128 114L198 64V186H248C252.4 186 256 182.4 256 178V15L198 64L128 114L58 64L0 15V178C0 182.4 3.6 186 8 186H58Z" />
                                </svg>
                                vogmaid@gmail.com
                            </div>
                        </div>
                        <span class="badge bg-gold">Hubungi</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/archive/6/6b/20220228223902%21WhatsApp.svg"
                                    width="20" alt="">
                                085928834084
                            </div>
                        </div>
                        <span class="badge bg-gold">Hubungi</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/aa/Google_Maps_icon_%282020%29.svg"
                                    width="15" alt="">
                                Jl. Jokotole Desa Aredeke Kec Batuan Sumenep
                            </div>
                        </div>
                        <span class="badge bg-gold">Kunjungi</span>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
