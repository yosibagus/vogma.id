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
                        <section id="timer" class="mt-2"
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
                                                                style="font-weight: 600;">58</span>
                                                            <span class="ket-jam">Menit</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-1 nopad"><span class="text-danger jam"
                                                            style="font-weight: 600;">:</span>
                                                    </div>
                                                    <div class="col-3 nopad">
                                                        <div class="d-flex flex-column">
                                                            <span class="text-danger jam" id="sec"
                                                                style="font-weight: 600;">56</span>
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
                        </section>

                        <div class="card border mt-4" style="box-shadow: 0px 2px 4px 0px #1E2C6A1A;">
                            <div class="card-body">
                                <div class="mt-4">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-md-3 text-center text-md-left">
                                            <img src="{{ asset('qris.png') }}" alt="Payment Method"
                                                style="width: 100%; max-width: 200px;">
                                        </div>
                                        <div class="col-md-9 d-flex justify-content-md-end justify-content-center">
                                            <div class="text-center text-md-end text-primary font-weight-bold"
                                                data-toggle="modal" data-target="#instruksiBayar" style="cursor: pointer">
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
                                        <img id="qrCodeImage" style="display: block; width: 300px; height: 300px;"
                                            src="{!! $detail->kode_pembayaran !!}">
                                    </div>
                                    <p style="margin-top:50px; font-size: 14px; font-weight: 400; color: #8E919B;">
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
                                    <button type="button" class="btn-custom btn-gold w-100 font-weight-bold"
                                        data-bs-toggle="modal" data-bs-target="#statusModal"
                                        data-id="{{ $detail->token_vote }}">
                                        Cek Status Pesanan
                                    </button>

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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#statusModal').on('show.bs.modal', function() { 
                var currentIdPesanan = "{{ $detail->token_vote }}";
                getStatus(currentIdPesanan);
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
