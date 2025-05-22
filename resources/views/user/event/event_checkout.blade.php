@extends('user.layouts.template')

@section('content')
    <style>
        .jam {
            font-size: 30px;
        }

        @media only screen and (max-width: 575px) {

            .jam {
                font-size: 18px;
            }

            .ket-jam {
                font-size: 11px;
            }

            .nopad {
                padding: 0;
            }
        }
    </style>
    <div class="row mx-0 px-0 justify-content-center mt-4 mb-5">
        <div class="col-12 col-xl-8">

            <div class="alert"
                style="background: linear-gradient(0deg, #F1F6FD, #F1F6FD),linear-gradient(0deg, #A7C5FD, #A7C5FD); border-left: 5px solid #0052EA;">
                <i class="far fa-exclamation-circle text-primary" aria-hidden="true"></i>
                Jangan tutup halaman ini sebelum Anda menyelesaikan pembayaran
            </div>

            <div class="row mt-4 mb-5">
                <div class="col-lg-6 col-xl-5" style="margin-bottom:20px;">
                    <div class="card p-3"
                        style="border-radius: 15px; background: linear-gradient(to top, #fff 55%, #FFF6F6 45%); box-shadow: 0px 4px 8px 0px rgba(30, 44, 106, 0.1)">
                        {{-- <section id="timer" class="mt-2"
                            style="padding: 3px; border-radius: 10px; background-color: #fff6f6;">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <input type="hidden" value="120" id="va_expired">
                                    <div id="payment_count">
                                        <h6 class="mt-5 mb-2">
                                            Sisa Waktu Pembayaran
                                        </h6>
                                        <div class="card border border-danger mx-4 mb-4"
                                            style="border-radius: 15px; box-shadow: 0px 2px 4px 0px rgba(30, 44, 106, 0.1);">
                                            <div class="card-body" style="margin-bottom: -13px">
                                                <div class="row justify-content-center">
                                                    <div class="col-3 nopad">
                                                        <div class="d-flex flex-column">
                                                            <span class="text-danger jam" id="hour"
                                                                style="font-weight: 600;">00</span>
                                                            <span class="ket-jam">Jam</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-1 nopad"><span class="text-danger jam"
                                                            style="font-weight: 600;">:</span>
                                                    </div>
                                                    <div class="col-3 nopad">
                                                        <div class="d-flex flex-column">
                                                            <span class="text-danger jam" id="min"
                                                                style="font-weight: 600;">00</span>
                                                            <span class="ket-jam">Menit</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-1 nopad"><span class="text-danger jam"
                                                            style="font-weight: 600;">:</span>
                                                    </div>
                                                    <div class="col-3 nopad">
                                                        <div class="d-flex flex-column">
                                                            <span class="text-danger jam" id="sec"
                                                                style="font-weight: 600;">00</span>
                                                            <span class="ket-jam">Detik</span>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <p>Selesaikan pembayaranmu sebelum
                                        </p>
                                        <p><b id="expired_pg">{{ tanggal($detail->kardaluarsa_pembayaran) }}</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section> --}}

                        <div class="card border mt-4" style="box-shadow: 0px 2px 4px 0px #1E2C6A1A;">
                            <div class="card-body">
                                <div class="mt-4">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-md-3 text-center text-md-left">
                                            @if ($detail->metode_pembayaran == 'qris')
                                                <img src="{{ asset('qris.png') }}" alt="Payment Method"
                                                    style="width: 100%; max-width: 200px;">
                                            @else
                                                Bank Transfer
                                            @endif
                                        </div>
                                        <div class="col-md-9 d-flex justify-content-md-end justify-content-center">
                                            <div class="text-center text-md-end text-primary font-weight-bold"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                style="cursor: pointer">
                                                <i class="far fa-exclamation-circle text-primary" aria-hidden="true"></i>
                                                Instruksi Pembayaran
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <div class="loading-container flex-column align-items-center"
                                            style="display: none;">
                                            <div id="ls-spinner"></div>
                                            <div class="mt-3">Memuat QR</div>
                                        </div>
                                        {{-- @if ($detail->metode_pembayaran != 'qris')
                                            <div class="text-center">
                                                <p style="margin-top:50px; font-size: 14px; font-weight: 400; color: #8E919B;">
                                                Kode Pembayaran
                                            </p>
                                            <h5 style="font-weight: 400; color: #000;">
                                                {{ $detail->kode_pembayaran }}
                                            </h5>
                                            </div>
                                        @else
                                            <img id="qrCodeImage" style="display: block; width: 300px; height: 300px;"
                                                src="{!! $detail->kode_pembayaran !!}">
                                        @endif --}}
                                        {{-- <button class="btn btn-gold">Bayar Sekarang</button> --}}
                                    </div>
                                    <div id="tmp-qr" class="d-flex justify-content-center">
                                        {{-- <div class="d-flex justify-content-center my-3" id="spinner-loading">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <p style="font-size: 14px; font-weight: 400; color: #8E919B;">
                                        Kode Pesanan
                                    </p>
                                    <p style="font-size: 14px; font-weight: 400; color: #000;">
                                        INV/{!! strtoupper($detail->token_vote) !!}/2025
                                    </p>


                                    <p class="mt-md-3" style="font-size: 14px; font-weight: 400; color: #8E919B;">
                                        Total Pembayaran (IDR)
                                    </p>
                                    <!-- <h5 id="total_amount">Rp. 0</h5> -->
                                    <p id="total_amount" class="notranslate" style="font-size: 16px; font-weight: 600;">
                                        {{ rupiah($detail->total_pembayaran) }}</p>

                                </div>
                                <div class="" style="gap: 16px; margin-top: 16px;">
                                    @if ($detail->snap_token == null)
                                        <button id="btnBayar" type="button"
                                            class="btn-custom btn-pesan btn-gold w-100 font-weight-bold"
                                            data-id="{{ $detail->token_vote }}">
                                            Generate Pembayaran
                                        </button>
                                    @else
                                        <button id="btnStatus" type="button"
                                            class="btn-custom btn-gold w-100 font-weight-bold" data-bs-toggle="modal"
                                            data-bs-target="#statusModal" data-id="{{ $detail->token_vote }}">
                                            Cek Status Pembayaran
                                        </button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-7">
                    <div class="card card-right p-3"
                        style="border-radius: 15px; height: fit-content; padding-bottom: 20px; box-shadow: 0px 4px 8px 0px rgba(30, 44, 106, 0.1);">
                        <p style="font-weight: normal; font-size: 12px;" class="mb-0">
                            {{ date('d-m-Y') }}
                        </p>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-2">
                                <img src="{{ asset($event->benner_event) }}" class="rounded-pill" alt="banner"
                                    style="max-width: 100%;">
                            </div>
                            <div class="col-10">
                                <h5 style="font-size: 20px;">{{ $event->nama_event }}
                                </h5>
                            </div>

                        </div>

                        <hr>
                        <table class="table-borderless mt-5" style="font-weight: 300;" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2" class="" style="font-size: 18px;">
                                        Ringkasan Pembayaran
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="nama_ticket" class="py-3" width="60%">
                                        Total Harga Vote
                                    </td>
                                    <td class="py-3 notranslate"
                                        style="background-color: #dee2e6; text-align: right; padding-right: 10px; width: 38%; color: #000;">
                                        {{ rupiah($detail->total_harga) }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="pb-4">
                                        Biaya Layanan
                                    </td>
                                    <td class="pb-4 notranslate"
                                        style="background-color: #dee2e6; text-align: right; padding-right: 10px; color: #000;">
                                        {{ rupiah($detail->biaya_layanan) }}
                                    </td>
                                </tr>


                                <tr>

                                </tr>
                                <tr class="border-top" style="font-weight: 600; font-size: 20px;">
                                    <td class="py-4">
                                        Total Pembayaran
                                    </td>
                                    <td class=" py-4 notranslate"
                                        style="background-color: #dee2e6; text-align: right; padding-right: 10px; color: #000;">
                                        {{ rupiah($detail->total_pembayaran) }}
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="statusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gold">
                    <h5 class="modal-title" id="statusModalLabel">Status Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalStatusContent">
                    <div class="text-center">Loading...</div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('user.event.include.modal_qris') --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gold">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Instruksi Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div id="accordion">
                                <div class="card" style="background-color: #fff; border: none;">
                                    <!--<div class="card-header" style="border: none;" id="headingOne">-->
                                    <div class="card-header" style="border: none;" id="headingOne"
                                        data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true"
                                        aria-controls="collapseOne1">
                                        <div style="float:right;"><i class="fas fa-chevron-down"></i></div>
                                        <div style="font-weight:600;">
                                            Pembayaran Melalui QRIS
                                        </div>
                                    </div>

                                    <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <div style="margin-top:-25px; margin-left:-10px;">
                                                <ol>
                                                    <li>Silahkan buka aplikasi &quot;<strong>E-wallet</strong>&quot; (Dana,
                                                        OVO, GoPay, ShopeePay, LinkAja, atau lainnya).</li>
                                                    <li><strong>Scan</strong> QR code yang tampil pada layar monitor anda.
                                                    </li>
                                                    <li>Periksa detail pembayaran Anda di aplikasi, lalu klik
                                                        &quot;<strong>Bayar</strong>&quot;.</li>
                                                    <li>Masukan &quot;<strong>PIN</strong>&quot; anda.</li>
                                                    <li>Transaksi Anda selesai.</li>
                                                </ol>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn mt-5 w-100 text-white bg-gold" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="instruksiBayar" tabindex="-1" aria-labelledby="instruksiPembayaranLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-white"
                    style=" background: var(--Gradien1, linear-gradient(0deg, #E31111 0.17%, #F85E5E
                            99.91%));">
                    <div class="d-flex flex-column justify-content-end">
                        <h5 class="modal-title" id="voteModalLabel">Instruksi Pembayaran
                        </h5>
                    </div>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"> --}}
    </script>

    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

    <script>
        $(document).ready(function() {
            $('.btn-pesan').on('click', function() {
                var orderId = $(this).data('id');

                $.ajax({
                    url: '/get-snap-token',
                    method: 'POST',
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: JSON.stringify({
                        order_id: orderId
                    }),
                    beforeSend: function() {
                        $('#loadingOverlay').show();
                    },
                    success: function(response) {
                        setTimeout(function() {
                            snap.pay(response.snap_token);
                            setTimeout(function() {
                                location.reload();
                            }, 1000); // Reload 1 detik setelah popup muncul
                        }, 1000); // Delay 1 detik sebelum popup muncul
                    },
                    error: function(xhr, status, error) {
                        console.error('Gagal mendapatkan snap token:', error);
                    },
                    complete: function() {
                        $('#loadingOverlay')
                            .hide();
                    }
                });
            });

            var currentIdPesanan = "{{ $detail->token_vote }}";
            var snap_token = "{{ $detail->snap_token }}";

            if (snap_token != '') {
                status(currentIdPesanan);
            }

            function status(currentIdPesanan) {
                $("#tmp-qr").html(`
                    <div class="d-flex justify-content-center my-3" id="spinner-loading">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                `);

                $.ajax({
                    url: '{{ url('vote/status') }}',
                    method: 'GET',
                    dataType: "html",
                    data: {
                        id: currentIdPesanan
                    },
                    success: function(response) {
                        // Ganti isi kontainer dengan hasil dari server
                        $("#tmp-qr").html(response);
                    },
                    error: function() {
                        $("#tmp-qr").html(
                            '<div class="text-danger text-center mt-3">Gagal memuat data.</div> <a href="{{ url('event/' . $detail->url_event) }}">Lakukan Transaksi Ulang</a>'
                        );
                    }
                });
            }

            $('#statusModal').on('show.bs.modal', function() {
                var currentIdPesanan = "{{ $detail->token_vote }}";
                getStatus(currentIdPesanan);
                status(currentIdPesanan);
            });

            $(document).on('click', '#btn-segarkan', function() {
                var currentIdPesanan = "{{ $detail->token_vote }}";
                getStatus(currentIdPesanan);
                status(currentIdPesanan);
            });

            function getStatus(currentIdPesanan) {
                var modalBody = $('#modalStatusContent');
                modalBody.html('<div class="text-center">Loading...</div>');
                $.ajax({
                    url: '{{ url('vote/statusPesanan') }}',
                    method: 'GET',
                    data: {
                        id: currentIdPesanan
                    },
                    success: function(response) {
                        modalBody.html(response);
                    },
                    error: function() {
                        modalBody.html(
                            '<div class="text-danger">Gagal memuat data.</div>');
                    }
                });
            }
        });
    </script>
@endsection
