<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.3.67/css/materialdesignicons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <style>
    .card {
      border-radius: 20px;
      border: none;
    }
  </style>
</head>

<body style="background-color: #fbfbfb;">

  <nav class="navbar navbar-expand-lg shadow-nav">
    <div class="container-fluid">
      <div class="row justify-content-center w-100">
        <div class="col-12 col-xl-8">
          <div class="d-flex align-items-center p-2 flex-wrap">
            <!-- Logo -->
            <a class="navbar-brand me-3" href="#">
              <img src="logo.png" alt="Logo" width="130">
            </a>

            <!-- Search Bar -->
            <div class="position-relative flex-grow-1 me-3 ms-lg-5 d-none d-md-block">
              <input type="text" class="form-control ps-5 w-100" placeholder="Cari sesuatu...">
              <i class="mdi mdi-magnify position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
            </div>

            <!-- Toggle Button (Mobile) -->
            <button class="navbar-toggler btn btn-gold ms-auto d-lg-none" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
              <span class="mdi mdi-filter-variant"></span>
            </button>

            <!-- Navbar Menu -->
            <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
              <div class="d-flex align-items-center flex-wrap">
                <button class="btn btn-light me-2" type="button" data-bs-toggle="modal" data-bs-target="#modalHubungi">
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
                  <svg width="20" height="20" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid">
                    <defs>
                      <linearGradient id="gradient" x1="50%" x2="50%" y1="100%" y2="0%">
                        <stop offset="0%" style="stop-color:#f9ce34; stop-opacity:1" />
                        <stop offset="50%" style="stop-color:#ee2a7b; stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#6228d7; stop-opacity:1" />
                      </linearGradient>
                    </defs>
                    <rect width="256" height="256" rx="60" fill="url(#gradient)" />
                    <circle cx="128" cy="128" r="48" fill="none" stroke="white" stroke-width="14" />
                    <circle cx="192" cy="64" r="12" fill="white" />
                    <rect x="40" y="40" width="176" height="176" rx="60" fill="none" stroke="white" stroke-width="14" />
                  </svg>
                  @vogma.id
                </div>
              </div>
              <span class="badge bg-gold">Kunjungi</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">
                  <svg width="20" height="20" viewBox="0 0 256 180" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid">
                    <path fill="#FF0000"
                      d="M250.34,28.62c-2.92-10.94-11.52-19.54-22.46-22.46C203.58,0,128,0,128,0s-75.58,0-99.88,6.16 C17.18,9.08,8.58,17.68,5.66,28.62C0,52.92,0,90,0,90s0,37.08,5.66,61.38c2.92,10.94,11.52,19.54,22.46,22.46 C52.42,180,128,180,128,180s75.58,0,99.88-6.16c10.94-2.92,19.54-11.52,22.46-22.46c5.66-24.3,5.66-61.38,5.66-61.38 S256,52.92,250.34,28.62z" />
                    <polygon fill="#FFFFFF" points="102,129.9 168,90 102,50.1" />
                  </svg>
                  Vogma
                </div>
              </div>
              <span class="badge bg-gold">Kunjungi</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">
                  <svg width="20" height="20" viewBox="0 0 256 193" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="xMidYMid">
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
                  081807058847
                </div>
              </div>
              <span class="badge bg-gold">Hubungi</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/a/aa/Google_Maps_icon_%282020%29.svg"
                    width="15" alt="">
                  Jl. Raya Lenteng, Aredake, Batuan, Kec. Batuan, Sumenep
                </div>
              </div>
              <span class="badge bg-gold">Kunjungi</span>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="content-container">
    <section class="benner-home mb-4">
      <div class="row justify-content-center mx-0 px-0">
        <div class="col-12 col-xl-8">
          <div class="benner mt-3 shadow-nav " style=" padding: 5px; border-radius: 10px;">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    src="https://superadmin.kreen.asia/img_up/up_banner/banner_web_kreen0559109a26611411de7acdb477d63f10.png"
                    class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="https://kreenconnect.com/image/banner_kreen_fasttrack.png" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                  </div>
                </div>
                <div class="carousel-item">
                  <img
                    src="https://superadmin.kreen.asia/img_up/up_banner/banner_web_kreen79f156e4132ca7f5856dfeb922a332dd.png"
                    class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="vote-terpopuler mb-4">
      <div class="row mx-0 px-0 justify-content-center">
        <div class="col-12 col-xl-8">
          <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center gap-2">
              <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.4"
                  d="M12.9763 3.11361L15.2028 7.58789C15.3668 7.91205 15.6799 8.13717 16.041 8.18719L21.042 8.91556C21.3341 8.95658 21.5992 9.11066 21.7782 9.34578C21.9552 9.5779 22.0312 9.87205 21.9882 10.1612C21.9532 10.4013 21.8402 10.6234 21.6672 10.7935L18.0434 14.3063C17.7783 14.5514 17.6583 14.9146 17.7223 15.2698L18.6145 20.2083C18.7095 20.8046 18.3144 21.3669 17.7223 21.48C17.4783 21.519 17.2282 21.478 17.0082 21.3659L12.5472 19.0417C12.2161 18.8746 11.8251 18.8746 11.494 19.0417L7.03303 21.3659C6.48491 21.657 5.80576 21.4589 5.5007 20.9187C5.38767 20.7036 5.34766 20.4584 5.38467 20.2193L6.27686 15.2798C6.34088 14.9256 6.21985 14.5604 5.95579 14.3153L2.33202 10.8045C1.90092 10.3883 1.88792 9.70296 2.30301 9.27175C2.31201 9.26274 2.32201 9.25274 2.33202 9.24273C2.50405 9.06764 2.7301 8.95658 2.97415 8.92757L7.97523 8.1982C8.33531 8.14717 8.64837 7.92406 8.81341 7.59789L10.9599 3.11361C11.1509 2.72942 11.547 2.4903 11.9771 2.5003H12.1111C12.4842 2.54533 12.8093 2.77644 12.9763 3.11361Z"
                  fill="gold"></path>
                <path
                  d="M11.992 18.9171C11.7983 18.9231 11.6096 18.9752 11.4399 19.0682L7.00072 21.3871C6.45756 21.6464 5.80756 21.4452 5.50303 20.9258C5.39021 20.7136 5.34927 20.4704 5.38721 20.2322L6.27384 15.3032C6.33375 14.9449 6.21394 14.5806 5.95334 14.3284L2.32794 10.8185C1.8976 10.3971 1.88961 9.70556 2.31096 9.27421C2.31695 9.26821 2.32195 9.2632 2.32794 9.2582C2.49967 9.08806 2.72133 8.97597 2.95996 8.94094L7.96523 8.20433C8.32767 8.1583 8.64219 7.93211 8.80194 7.60384L10.9776 3.06312C11.1843 2.69682 11.5806 2.47864 12 2.50166C11.992 2.7989 11.992 18.715 11.992 18.9171Z"
                  fill="gold"></path>
              </svg>
              <h4 class="h5 mb-0">
                Vote Terpopuler
              </h4>

            </div>
            <div class="d-flex align-items-center justify-content-center">
              <a href="https://kreenconnect.com/event/explore?cat=vote" class="d-flex gap-2"
                style="text-decoration: none !important;">
                <span class="text-custom text-primary fw-bold h6">
                  <span class="d-none d-md-inline">Lihat </span>Lebih Banyak <span class="mdi mdi-arrow-right"></span>
                </span>
               
              </a>
            </div>
          </div>

          <div id="owl-carousel" class="owl-carousel owl-theme mt-3">
            <div class="item">
              <a href="#" class="carousel-item-content" style="text-decoration: none;">
                <div class="card mb-3 shadow-nav position-relative">
                  <span class="badge badge-position badge-custom">Offline</span>
                  <div class="card-body p-0">
                    <img
                      src="https://vote.kreen.id/img_up/up_thumb/800/up_banner/67da75892e20d_organizer_67da86a492f1620250319155604.png"
                      alt="" class="img-benner">
                    <div class="mt-2 p-3 pb-2 pt-0 detail-judul">
                      <a href="#" class="text-dark" style="font-size: 13px;">Pemilihan Brand Ambassador Sumenep 2025
                        ...</a>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>



        </div>
      </div>
    </section>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#owl-carousel').owlCarousel({
        loop: false,
        margin: 30,
        dots: true,
        // nav: true,
        items: 4,
        responsive: {
          0: { items: 1 },   // 1 item untuk layar kecil (mobile)
          600: { items: 2 }, // 2 item untuk tablet
          1000: { items: 4 } // 3 item untuk desktop
        }
      })
    });
  </script>
</body>

</html>