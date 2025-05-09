<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vogma - Admin</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Yosi Bagus Sadar Rasuli">
    <meta name="robots" content="">

    <meta name="keywords"
        content="admin, admin dashboard, admin template, bootstrap, bootstrap 5, bootstrap 5 admin template, fitness, fitness admin, modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app">
    <meta name="description"
        content="Discover Gymove, the ultimate fitness solution that is designed to help you achieve a healthier lifestyle with its cutting-edge features and personalized programs. Gymove is a fully mobile-responsive admin dashboard template that provides the perfect blend of exercise, nutrition, and motivation. Begin your fitness journey today with Gymove and visit DexignZone for more information.">

    <meta property="og:title" content="Gymove  - Fitness Bootstrap Admin Dashboard Template">
    <meta property="og:description"
        content="Discover Gymove, the ultimate fitness solution that is designed to help you achieve a healthier lifestyle with its cutting-edge features and personalized programs. Gymove is a fully mobile-responsive admin dashboard template that provides the perfect blend of exercise, nutrition, and motivation. Begin your fitness journey today with Gymove and visit DexignZone for more information.">
    <meta property="og:image" content="social-image.png">
    <meta name="format-detection" content="telephone=no">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('xhtml') }}/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('xhtml/vendor/chartist/css/chartist.min.css') }}">
    <link href="{{ asset('xhtml/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('xhtml/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('xhtml/css/style.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
        rel="stylesheet">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    {{-- <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div> --}}
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo" aria-label="Gymove">
                <img class="logo-abbr" src="{{ asset('logo.png') }}" alt="">
                {{-- <img class="logo-compact" src="{{ asset('xhtml') }}/images/logo-text.png" alt="">
                <img class="brand-title" src="{{ asset('xhtml') }}/images/logo-text.png" alt=""> --}}
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('admin.template.header_admin')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                @include('admin.template.menu_admin')
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body default-height">
            <!-- row -->
            <div class="container-fluid">
                @yield('content_admin')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <footer class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/"
                        target="_blank">DexignZone</a> 2023</p>
            </div>
        </footer>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('xhtml') }}/vendor/global/global.min.js"></script>
    <script src="{{ asset('xhtml') }}/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('xhtml') }}/vendor/chart-js/chart.bundle.min.js"></script>
    <script src="{{ asset('xhtml') }}/vendor/owl-carousel/owl.carousel.js"></script>

    <script src="{{ asset('xhtml') }}/vendor/peity/jquery.peity.min.js"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('xhtml') }}/vendor/apexchart/apexchart.js"></script>

    <!-- Dashboard 1 -->
    <script src="{{ asset('xhtml') }}/js/dashboard/dashboard-1.js"></script>
    <script src="{{ asset('xhtml') }}/js/custom.min.js"></script>
    <script src="{{ asset('xhtml') }}/js/deznav-init.js"></script>
    <script>
        function carouselReview() {
            /*  testimonial one function by = owl.carousel.js */
            jQuery('.testimonial-one').owlCarousel({
                nav: true,
                loop: true,
                autoplay: true,
                margin: 30,
                dots: false,
                left: true,
                navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>',
                    '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    484: {
                        items: 2
                    },
                    882: {
                        items: 3
                    },
                    1200: {
                        items: 2
                    },

                    1540: {
                        items: 3
                    },
                    1740: {
                        items: 4
                    }
                }
            })
        }
        jQuery(window).on('load', function() {
            setTimeout(function() {
                carouselReview();
            }, 1000);
        });
    </script>
</body>

</html>
