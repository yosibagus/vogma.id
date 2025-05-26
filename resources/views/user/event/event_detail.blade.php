@extends('user.layouts.template')
@section('meta')
    <meta name="keywords" content="{{ $detail->nama_event }}">
    <meta name="description" content="{{ $detail->deskripsi_event }}">
    <meta property="og:title" content="{{ $detail->nama_event }}">
    <meta property="og:description" content="{{ $detail->deskripsi_event }}">
    <meta property="og:image" content="{{ asset($detail->benner_event) }}">
    <meta property="og:url" content="{{ url('event/' . $detail->url_event) }}">
    <meta property="og:type" content="website">
@endsection
@section('content')
    @include('user.layouts.menu_event')

    <style>
        #leaderboard,
        .row {
            overflow: visible !important;
        }

        .sticky-mobile-search {
            position: sticky;
            top: 80px;
            /* sesuaikan dengan tinggi header */
            z-index: 1040;
            /* lebih rendah dari header, lebih tinggi dari konten */
            background-color: #fff;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        @media (max-width: 576px) {
            .kandidat-item {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .vote-card {
                border-radius: 0;
            }
        }
    </style>

    <div class="row mx-0 px-0 justify-content-center mt-5 mb-5">
        <div class="col-12 col-xl-8">

            <div class="row" style="margin-top: 40px">
                <section class="left-items col-12 col-lg-8 mt-4">
                    <div class="card" style="border-radius: 20px;">
                        <img src="{{ asset($detail->benner_event) }}" style="max-width: 100%; border-radius: 20px;"
                            alt="banner-event">
                    </div>
                    <div class="card-custom mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-section card-judul" id="card-judul">
                                <h1 class="mb-4" style="font-weight: bold; font-size: 2rem;">{{ $detail->nama_event }}
                                </h1>
                                <div class="badge-custom badge-success text-uppercase" style="width: fit-content;">
                                    Reguler Vote
                                </div>
                            </div>
                            <div class="flex-shrink-0" style="cursor: pointer; width: 2.25rem;"
                                onclick="$('#modal-share-1').modal('show')">
                                <img style="max-width: 100%"
                                    src="https://kreenconnect.com/image/icon-vote/Blue/share-red.svg" alt="share">
                            </div>
                        </div>

                        <div class="divider-card" id="deskripsi"></div>

                        <div class="card-section card-tentang" id="card-tentang">
                            <h4 class="card-title mb-3" style="font-size: 18px;">Deskripsi</h4>

                            <div>
                                <p>{{ $detail->deskripsi_event }}</p>
                            </div>
                        </div>

                        {{-- backup top 3 --}}
                        <div class="divider-card"></div>
                        <div id="leaderboard"
                            class="d-flex bg-gold flex-column justify-content-center align-items-center text-white text-center w-100 p-3"
                            style="gap: 0.5rem;">
                            <img src="https://kreenconnect.com/image/icon-vote/Blue/crown-icon.svg" alt="leaderboard">
                            Leaderboard <br>{{ $detail->nama_event }}
                        </div>

                        <div class="top-3 d-flex justify-content-center">
                            @php
                                $first = $toptiga->get(0);
                                $second = $toptiga->get(1);
                                $third = $toptiga->get(2);
                            @endphp

                            <div class="top-3 d-flex justify-content-center">

                                {{-- Juara 2 --}}
                                <div class="d-flex align-items-center flex-column justify-content-center bg-white card-top3-2 juara-2"
                                    style="position: relative; z-index: 2; border: 1.76px solid rgb(215 169 16); flex-basis: 33.33%; opacity: 1; cursor: pointer;">
                                    <div class="info-juara-2 info-juara">
                                        <div class="d-flex align-items-center justify-content-center mb-5"
                                            style="position: relative;">
                                            <div class="d-flex flex-column justify-content-center align-items-center top3-1 banner-juara-2"
                                                style="gap: 0.75rem; position: relative;">
                                                <img style="max-width: 6.125rem;"
                                                    src="https://kreenconnect.com/image/silver_crown.png" alt="crown">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <img loading="lazy" src="{{ asset($second->foto_kandidat) }}"
                                                        style="aspect-ratio: 1/1; width: 80%; object-fit: cover; max-width: 300px; border-radius: 6px; border: none;"
                                                        alt="{{ $second->nama_kandidat }}">
                                                    <div class="rank-top3" style="background: rgba(174, 174, 174, 1);">
                                                        <span
                                                            style="transform: rotate(-45deg); color: #fff; font-size: 0.875rem; font-weight: 600;">2</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mb-3 text-clamp-2"
                                            style="font-size: 1rem; font-weight: 700; padding: 0 0.5rem; height: 3rem;">
                                            {{ strtoupper($second->nama_kandidat) }}
                                        </div>
                                        <div class="text-center mb-3" style="font-size: 1.5rem; font-weight: 700;">
                                            {{ $second->persentase_vote }}%
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center btn-vote-juara-wrapper btn-vote-juara-2-wrapper"
                                        style="opacity: 1; pointer-events: auto">
                                        <button type="button" class="btn btn-gold px-0 btn-vote-juara btn-vote-juara-2"
                                            data-nama="{{ $second->nama_kandidat }}">
                                            Vote
                                        </button>
                                    </div>
                                </div>

                                {{-- Juara 1 --}}
                                <div class="d-flex align-items-center flex-column justify-content-center bg-white card-top3-1 juara-1"
                                    style="position: relative; z-index: 3; border: 1.76px solid rgb(215 169 16); flex-basis: 33.33%; opacity: 1; cursor: pointer;">
                                    <div class="info-juara-1 info-juara">
                                        <div class="d-flex align-items-center justify-content-center mb-5"
                                            style="position: relative;">
                                            <div class="d-flex flex-column justify-content-center align-items-center top3-2 banner-juara-1"
                                                style="gap: 0.75rem; position: relative;">
                                                <img style="max-width: 6.125rem;"
                                                    src="https://kreenconnect.com/image/gold_crown.gif" alt="crown">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <img loading="lazy" src="{{ asset($first->foto_kandidat) }}"
                                                        style="aspect-ratio: 1/1; width: 100%; object-fit: cover; max-width: 300px; border-radius: 8px; border: 1.6px solid rgba(255, 170, 0, 1);"
                                                        alt="{{ $first->nama_kandidat }}">
                                                    <div class="rank-top3" style="background: rgb(255, 170, 0);">
                                                        <span
                                                            style="transform: rotate(-45deg); color: #fff; font-size: 0.875rem; font-weight: 600;">1</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mb-3 text-clamp-2"
                                            style="font-size: 1rem; font-weight: 700; padding: 0 0.5rem; height: 3rem;">
                                            {{ strtoupper($first->nama_kandidat) }}
                                        </div>
                                        <div class="text-center mb-3" style="font-size: 1.5rem; font-weight: 700;">
                                            {{ $first->persentase_vote }}%
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center btn-vote-juara-wrapper btn-vote-juara-1-wrapper"
                                        style="opacity: 1; pointer-events: auto">
                                        <button type="button" class="btn btn-gold px-0 btn-vote-juara btn-vote-juara-1"
                                            data-nama="{{ $first->nama_kandidat }}">
                                            Vote
                                        </button>
                                    </div>
                                </div>

                                {{-- Juara 3 --}}
                                <div class="d-flex align-items-center flex-column justify-content-center bg-white card-top3-3 juara-3"
                                    style="position: relative; z-index: 1; border: 1.76px solid rgb(215 169 16); flex-basis: 33.33%; opacity: 1; cursor: pointer;">
                                    <div class="info-juara-3 info-juara">
                                        <div class="d-flex align-items-center justify-content-center mb-5"
                                            style="position: relative;">
                                            <div class="d-flex flex-column justify-content-center align-items-center top3-3 banner-juara-3"
                                                style="gap: 0.75rem; position: relative;">
                                                <img style="max-width: 6.125rem;"
                                                    src="https://kreenconnect.com/image/bronze_crown.png" alt="crown">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <img loading="lazy" src="{{ asset($third->foto_kandidat) }}"
                                                        style="aspect-ratio: 1/1; width: 80%; object-fit: cover; max-width: 300px; border-radius: 6px; border: none;"
                                                        alt="{{ $third->nama_kandidat }}">
                                                    <div class="rank-top3" style="background: rgba(195, 126, 82, 1);">
                                                        <span
                                                            style="transform: rotate(-45deg); color: #fff; font-size: 0.875rem; font-weight: 600;">3</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mb-3 text-clamp-2"
                                            style="font-size: 1rem; font-weight: 700; padding: 0 0.5rem; height: 3rem;">
                                            {{ strtoupper($third->nama_kandidat) }}
                                        </div>
                                        <div class="text-center mb-3" style="font-size: 1.5rem; font-weight: 700;">
                                            {{ $third->persentase_vote }}%
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center btn-vote-juara-wrapper btn-vote-juara-3-wrapper"
                                        style="opacity: 1; pointer-events: auto">
                                        <button type="button" class="btn btn-gold px-0 btn-vote-juara btn-vote-juara-3"
                                            data-nama="{{ $third->nama_kandidat }}"">
                                            Vote
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="divider-card"></div>

                        {{-- finalis --}}

                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="finalis">
                            <div class="input-group mb-3 sticky-mobile-search shadow-sm">
                                <span class="input-group-text" id="basic-addon1"><span
                                        class="mdi mdi-magnify"></span></span>
                                <input type="text" class="form-control" placeholder="Cari Finalis..."
                                    aria-label="fanalis" id="cari" aria-describedby="basic-addon1">
                            </div>

                            <div id="notFoundAlert" class="alert alert-warning w-100 text-center" style="display: none;">
                                Finalis tidak ditemukan.
                            </div>

                            @foreach ($finalis as $get)
                                <div class="col-sm-6 col-md-6 col-lg-6 kandidat-item"
                                    data-nama="{{ strtolower($get->nama_kandidat) }}">
                                    <div class="vote-card p-3">
                                        <img src="{{ asset($get->foto_kandidat) }}" class="vote-img" alt="">
                                        <div class="card-body text-center">
                                            <h6 class="card-title mt-3 mb-0">{{ $get->nama_kandidat }}</h6>
                                            <small class="text-muted"
                                                style="font-size:10px">{{ $get->biografi_kandidat }}</small>
                                            <p class="mt-3">({{ $get->no_kandidat }})</p>

                                            <div class="w-100 mt-auto mb-3"
                                                style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); justify-content: center;">
                                                <div class="text-center"
                                                    style="border-right: 1px solid rgba(246, 246, 246, 1);">
                                                    <div class="mb-2 d-flex align-items-center justify-content-center"
                                                        style="font-size: 12px; gap: 6px; font-weight: 500;"><img
                                                            src="{{ asset('dollar-coin.svg') }}" alt="harga">
                                                        Harga
                                                    </div>
                                                    <div class="notranslate" style="font-size: 14px; font-weight: 700;">
                                                        {{ rupiah($detail->harga_event) }}
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <div class="mb-2 d-flex align-items-center justify-content-center"
                                                        style="font-size: 12px; gap: 6px; font-weight: 500;"><img
                                                            src="https://kreenconnect.com/image/icon-vote/Blue/chart.svg"
                                                            alt="vote">Vote
                                                    </div>
                                                    <div style="font-size: 14px; font-weight: 700;">
                                                        {{ $get->persentase_vote }}%
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-gold btn-sm w-100 mt-3" data-bs-toggle="modal"
                                                data-bs-target="#mdkandidat{{ $get->id_kandidat }}">Detail
                                                Finalis</button>
                                            <div class="quantity-selector mt-2" data-id="{{ $get->id_kandidat }}"
                                                data-name="{{ $get->nama_kandidat }}"
                                                data-harga="{{ $detail->harga_event }}">
                                                <button class="btn btn-outline-gold btn-qty minus">-</button>
                                                <input type="text" class="form-control text-center qty-input"
                                                    style="width: 50px;" value="0" readonly>
                                                <button class="btn btn-outline-gold btn-qty plus">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="mdkandidat{{ $get->id_kandidat }}" tabindex="-1"
                                    aria-labelledby="mdkandidat{{ $get->id_kandidat }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="mdkandidat{{ $get->id_kandidat }}Label">
                                                    {{ $get->nama_kandidat }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <img src="{{ asset($get->foto_kandidat) }}" width="100%"
                                                    alt="">
                                                <div class="px-3 pb-4">
                                                    <div class="nama-finalis text-center mt-3 mb-2 text-clamp-2"
                                                        style="font-weight: 700; font-size: 14px;">
                                                        {{ $get->nama_kandidat }}</div>
                                                    <div class="no-urut w-100 text-center mb-2"
                                                        style="font-size: 12px; border-bottom: 1px solid rgba(246, 246, 246, 1); padding-bottom: 12px;">
                                                        {{ $get->no_kandidat }}</div>
                                                    <div class="text-center"
                                                        style="border-bottom: 1px solid rgba(246, 246, 246, 1); padding-bottom: 12px;">
                                                        <div class="mb-2 d-flex align-items-center justify-content-center"
                                                            style="font-size: 12px; gap: 6px; font-weight: 500;"><img
                                                                src="{{ asset('chart.svg') }}" alt="vote">Vote
                                                        </div>
                                                        <div style="font-size: 14px; font-weight: 700;">
                                                            {{ $get->persentase_vote }}%
                                                        </div>
                                                    </div>
                                                    <div class="text-center mt-3">
                                                        <div class="mb-2 d-flex align-items-center justify-content-center"
                                                            style="font-size: 12px; gap: 6px; font-weight: 500;">Deskripsi
                                                            Kandidat
                                                        </div>
                                                        <div style="font-size: 14px; font-weight: 700;">
                                                            {{ $get->deskripsi_kandidat }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </section>

                <section class="right-items d-none d-lg-block col-12 col-lg-4 mt-4">
                    <div class="card-custom card-custom-right">
                        <div class="card-section card-organizer">
                            <h1 class="d-none d-lg-block" style="font-weight: 600; font-size: 1.125rem;">
                                {{ $detail->nama_event }}</h1>
                            <hr class="d-none d-lg-block">
                            <div class="d-flex align-items-center" style="gap: 30px;">
                                <div class="avatar-organizer">
                                    <img style="width: 60px; height: 60px; border-radius: 999px; border: 1px solid #DADCE0; object-fit: contain; object-position: center;"
                                        src="{{ asset($penyelenggara->logo_penyelenggara) }}" alt="img_organizer">
                                </div>
                                <div>
                                    <div style="font-size: 0.8125rem;">Diselenggarakan Oleh</div>
                                    <div class="nama-organizer mb-3 text-capitalize"
                                        style="font-size: 1rem; font-weight: 700;">
                                        {{ $penyelenggara->nama_penyelenggara }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin: 16px 0;"></div>
                        <div class="card-section card-datetime mt-3 mt-lg-0 mb-3">
                            <h4 class="mb-3" style="font-weight: 600; font-size: 0.875rem;">
                                Detail Grandfinal</h4>
                            <div class="d-flex align-items-start mb-2" style="gap: 12px;">
                                <div class="">
                                    <img style="width: 24px; height: 24px;"
                                        src="https://kreenconnect.com/image/icon-vote/Blue/Calendar.svg" alt="calendar">
                                </div>
                                <div>
                                    @tanggal($detail->tgl_start_event)
                                </div>
                            </div>
                        </div>
                        <div class="card-section card-lokasi mb-4">
                            <h4 class="mb-3" style="font-weight: 600; font-size: 0.875rem;">Lokasi
                            </h4>
                            <div class="d-flex mb-2" style="gap: 12px;">
                                <div class="">
                                    <img style="width: 24px; height: 24px;"
                                        src="https://kreenconnect.com/image/icon-vote/Blue/Locations.svg" alt="location">
                                </div>
                                <div>{{ $detail->lokasi_event }}</div>
                            </div>
                        </div>
                        <h4 style="font-weight: 600; font-size: 1rem;">Harga</h4>
                        <div style="font-weight: 600; font-size: 2rem; color: rgb(var(--color-primary)); border-bottom: 1px solid #DBDFE7; padding-bottom: 8px;"
                            class="notranslate">
                            {{ rupiah($detail->harga_event) }}
                        </div>
                    </div>
                    <div class="position-sticky" style="top: 124px; margin-top: 40px;">
                        @include('user.event.include.keranjang')
                    </div>
                </section>
            </div>

        </div>
    </div>

    <div id="cart-bar" class="card fixed-bottom shadow p-3 bg-white"
        style="display: none; z-index:1050; border-radius:0;">
        <div class="row mx-0 px-0 justify-content-center">
            <div class="col-12 col-xl-8">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                    <div class="">
                        <span class="fw-bold">Total Harga</span> <br><span id="total-harga">Rp0</span>
                    </div>
                    <div class="d-flex flex-column flex-sm-row gap-2">
                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#detailModal">
                            Lihat Detail
                        </button>
                        <button class="btn btn-gold" id="btn-bayar">
                            <img src="{{ asset('ticket-white.svg') }}" width="20" alt=""> Lanjutkan
                            Pembayaran
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-gold">
                    <h5 class="modal-title" id="detailModalLabel">Detail Vote</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detail-body">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Pembayaran -->
    <div class="modal fade" id="modalPembayaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalPembayaranLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formPembayaran">
                    <div class="modal-header bg-gold">
                        <h5 class="modal-title" id="modalPembayaranLabel">Informasi Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No HP / WhatsApp</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Metode Pembayaran</label>

                            <div id="qris" class="metode-pembayaran" onclick="pilihMetode('qris')">
                                <div>
                                    <div class="d-flex align-items-center mb-1">
                                        <img src="{{ asset('qris.png') }}" alt="QRIS"
                                            style="height:20px; margin-right:10px;">
                                        <strong>QRIS</strong>
                                        <span class="badge bg-secondary ms-2">ID</span>
                                    </div>
                                    <small class="text-muted">Bisa digunakan semua jenis BANK dan E-Wallet</small>
                                </div>
                                <div id="check-qris" class="text-success d-none">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>

                            <input type="hidden" id="metode_pembayaran" name="metode_pembayaran" value="">
                        </div>

                        <div class="mt-4 border-top pt-3">
                            <h6>Ringkasan Pembayaran</h6>
                            <div class="d-flex justify-content-between">
                                <span>Total Harga Vote</span>
                                <strong id="total-harga-vote">Rp0</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Biaya Layanan</span>
                                <strong id="biaya-layanan">Rp0</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Total Bayar</span>
                                <strong id="total-bayar">Rp0</strong>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gold">Konfirmasi Pembayaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let keranjang = {};

        function formatRupiah(angka) {
            return 'IDR ' + angka.toLocaleString('id-ID');
        }

        function updateKeranjang() {
            const $bar = $('#cart-bar');
            const $total = $('#total-harga');
            let totalItem = 0;
            let grandTotal = 0;

            $.each(keranjang, function(id, item) {
                if (item.qty > 0) {
                    totalItem += item.qty;
                    grandTotal += item.qty * item.harga;
                }
            });

            if (totalItem > 0) {
                $bar.fadeIn();
                $total.text(formatRupiah(grandTotal));
            } else {
                $bar.fadeOut();
            }
        }

        $(document).on('click', '.btn-qty', function() {
            const $parent = $(this).closest('.quantity-selector');
            const id = $parent.data('id');
            const name = $parent.data('name');
            const harga = parseInt($parent.data('harga'));
            const $input = $parent.find('.qty-input');

            let qty = parseInt($input.val());

            if ($(this).hasClass('plus')) {
                qty++;
            } else if ($(this).hasClass('minus') && qty > 0) {
                qty--;
            }

            $input.val(qty);

            if (qty > 0) {
                keranjang[id] = {
                    name,
                    qty,
                    harga
                };
            } else {
                delete keranjang[id];
            }

            updateKeranjang();
        });

        $('#detailModal').on('show.bs.modal', function() {
            const $body = $('#detail-body');
            $body.empty();

            $.each(keranjang, function(id, item) {
                if (item.qty > 0) {
                    $body.append(
                        `<p>${item.name} x ${item.qty} = ${formatRupiah(item.qty * item.harga)}</p>`);
                }
            });
        });

        $('#btn-bayar').on('click', function() {
            if (Object.keys(keranjang).length === 0) return alert('Pilih minimal 1 kandidat!');
            $('#modalPembayaran').modal('show');
        });

        function hitungTotalKeranjang() {
            let total = 0;
            $.each(keranjang, function(id, item) {
                total += item.qty * item.harga;
            });
            return total;
        }

        function updateRingkasanPembayaran() {
            const totalSemua = hitungTotalKeranjang();
            const metode = $('#metode_pembayaran').val();

            let biayaLayanan = 0;
            if (metode.toLowerCase() === 'bni') {
                biayaLayanan = 4000;
            } else {
                biayaLayanan = totalSemua * 0.010;
            }

            const totalBayar = totalSemua + biayaLayanan;

            $('#total-harga-vote').text(formatRupiah(totalSemua));
            $('#biaya-layanan').text(formatRupiah(biayaLayanan));
            $('#total-bayar').text(formatRupiah(totalBayar));
        }

        $('input[name="metode_pembayaran"]').on('change', function() {
            $('#metode_pembayaran').val($(this).val());
            updateRingkasanPembayaran();
        });

        function pilihMetode(metode) {
            $('.metode-pembayaran').removeClass('active');
            $('.check-icon').addClass('d-none');

            $('#' + metode).addClass('active');
            $('#check-' + metode).removeClass('d-none');

            $('#metode_pembayaran').val(metode);
            updateRingkasanPembayaran();
        }

        $('#modalPembayaran').on('shown.bs.modal', function() {
            pilihMetode('qris');
        });

        $('#formPembayaran').on('submit', function(e) {
            e.preventDefault();

            if (Object.keys(keranjang).length === 0) {
                alert('Keranjang kosong, pilih kandidat terlebih dahulu!');
                return;
            }

            const nama = $('#nama').val().trim();
            const no_hp = $('#no_hp').val().trim();
            const email = $('#email').val().trim();
            const metode_pembayaran = $('#metode_pembayaran').val();
            const event_id = "{{ $detail->id_event }}";

            if (!nama || !no_hp || !email) {
                alert('Mohon lengkapi semua data di formulir.');
                return;
            }

            const totalSemua = hitungTotalKeranjang();
            let biayaLayanan = 0;
            if (metode_pembayaran.toLowerCase() == 'bni') {
                biayaLayanan = 4000;
            } else {
                biayaLayanan = totalSemua * 0.010;
            }
            const totalBayar = totalSemua + biayaLayanan;

            let dataKirim = [];
            $.each(keranjang, function(id, item) {
                dataKirim.push({
                    id: id,
                    qty: item.qty,
                    subtotal: item.qty * item.harga,
                });
            });

            $('#loadingOverlay').show();

            $.ajax({
                url: "{{ url('vote/checkout') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    nama,
                    no_hp,
                    email,
                    metode_pembayaran,
                    items: dataKirim,
                    total_harga_vote: totalSemua,
                    biaya_layanan: biayaLayanan,
                    total_bayar: totalBayar,
                    event_id: event_id
                },
                success: function(res) {
                    keranjang = {};
                    $('.quantity-selector input.qty-input').val(0);
                    $('#tmp-keranjang').empty();
                    $('#cart-bar').hide();
                    $('#formPembayaran')[0].reset();
                    $('#modalPembayaran').modal('hide');
                    $('#total-harga-vote').text('IDR 0');
                    $('#biaya-layanan').text('IDR 0');
                    $('#total-bayar').text('IDR 0');

                    window.location.href = "{{ url('vote/detail') }}/" + res.data.token_vote;
                },
                error: function() {
                    alert('Gagal mengirim data.');
                },
                complete: function() {
                    $('#loadingOverlay').hide();
                }
            });
        });
    </script>
    <script>
        document.querySelectorAll('.btn-vote-juara').forEach(function(button) {
            button.addEventListener('click', function() {
                const nama = this.getAttribute('data-nama');
                const input = document.getElementById('cari');
                input.value = nama;
                input.focus();

                // Trigger pencarian
                input.dispatchEvent(new Event('keyup'));

                // Setelah filter selesai, scroll dengan offset ke bawah
                setTimeout(function() {
                    const items = document.querySelectorAll('.kandidat-item');
                    for (let item of items) {
                        if (item.style.display !== 'none') {
                            const rect = item.getBoundingClientRect();
                            const offset = 45; // Tambah jarak scroll ke bawah
                            const scrollTop = window.scrollY + rect.top - offset;

                            window.scrollTo({
                                top: scrollTop,
                                behavior: 'smooth'
                            });
                            break;
                        }
                    }
                }, 100); // biar filter selesai dulu
            });
        });
    </script>

    <script>
        document.getElementById('cari').addEventListener('keyup', function() {
            var query = this.value.toLowerCase();
            var items = document.querySelectorAll('.kandidat-item');
            var found = false;

            items.forEach(function(item) {
                var nama = item.getAttribute('data-nama');
                if (nama.includes(query)) {
                    item.style.display = '';
                    found = true;
                } else {
                    item.style.display = 'none';
                }
            });

            var alertBox = document.getElementById('notFoundAlert');
            if (found) {
                alertBox.style.display = 'none';
            } else {
                alertBox.style.display = 'block';
            }
        });
    </script>
    <script>
        function scrollToSection(id) {
            const section = document.getElementById(id);
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    </script>
@endsection
