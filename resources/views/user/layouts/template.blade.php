<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vogma</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.3.67/css/materialdesignicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
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

    <div id="loadingOverlay"
        style="
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5);">
        <div
            style="
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);">
            <div class="spinner-border text-light" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    @yield('content')

    <footer style="background: #fff;" class="mt-5">
        <div class="text-center" style="padding: 30px 15px; font-size: 0.875rem;">
            © 2025 PT. Onjur Group Sumenep. Seluruh hak cipta dilindungi.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('script')
    <script>
        $(document).ready(function() {
            $('#owl-carousel').owlCarousel({
                loop: false,
                margin: 30,
                dots: true,
                // nav: true,
                items: 4,
                responsive: {
                    0: {
                        items: 1
                    }, // 1 item untuk layar kecil (mobile)
                    600: {
                        items: 2
                    }, // 2 item untuk tablet
                    1000: {
                        items: 4
                    } // 3 item untuk desktop
                }
            })
        });
    </script>
</body>

</html>
