@extends('user.layouts.template')

@section('content')
    {{-- <style>
        @media screen and (max-width: 992px) {
            #card-left {
                background-color: unset;
                background-clip: unset;
                box-shadow: none;
                padding: 0;
            }

            .divider-card {
                max-width: 100%;
                margin: 0;
            }
        }
    </style> --}}


    <div class="row mx-0 px-0 justify-content-center mt-4">
        <div class="col-12 col-xl-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/vote') }}">Vote</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $detail->nama_event }}</li>
                </ol>
            </nav>

            <div class="row">
                <section class="left-items col-12 col-lg-8 mt-4">
                    <div class="banner" style="border-radius: 20px;">
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

                        <div class="d-flex align-items-center mt-5" style="gap: 1.3125rem;">
                            <button class="btn-custom btn-accent btn-external" style="" data-toggle="modal"
                                data-target="#modal-faq">FAQ Vote <i class="fas fa-external-link"
                                    aria-hidden="true"></i></button>
                            <button class="btn-custom btn-accent btn-external" style="" data-toggle="modal"
                                data-target="#modal-tutorial">Tutorial Vote <i class="fas fa-external-link"
                                    aria-hidden="true"></i></button>
                            <button class="btn-custom btn-accent btn-external" style="" data-toggle="modal"
                                data-target="#modal-snk">S&amp;K Voting <i class="fas fa-external-link"
                                    aria-hidden="true"></i></button>
                        </div>

                        <div class="divider-card"></div>

                        <div class="card-section card-tentang" id="card-tentang">
                            <h4 class="card-title mb-3" style="font-size: 18px;">Deskripsi</h4>

                            <div>
                                <p>{{ $detail->deskripsi_event }}</p>
                            </div>
                        </div>

                        <div class="divider-card"></div>

                        {{-- backup top 3 --}}
                        <div class="d-flex flex-column mt-2" style="gap: 8px;">
                            <div class="card-custom d-flex p-4 mt-md-4" onclick="voteTop3('QAHEKYRSMPGDRJACB751', 'Yesha')"
                                style="cursor: pointer;">
                                <div class="d-flex justify-content-between lb-item">
                                    <div class="d-flex w-100" style="gap: 16px;">
                                        <div style="font-size: 1.125rem; font-weight: 600;">
                                            4</div>
                                        <div style="flex-grow: 1">
                                            <div class="d-flex" style="gap: 16px;">
                                                <img loading="lazy" class="tw:max-w-22 tw:min-[375]:max-w-24 tw:w-full"
                                                    src="https://vote.kreenconnect.com/img_up/up_thumb/500/up_banner/image_6822e68865147202505131328246822d1d069d4f.png"
                                                    alt="Poster Finalis" width="80"
                                                    style="aspect-ratio: 1/1; object-fit: cover; flex-shrink: 0;">

                                                <div class="flex-grow-1">
                                                    <div class="mb-1 text-clamp-2 text-center text-lg-left"
                                                        style="font-size: 1rem; font-weight: 600;">
                                                        Yesha</div>
                                                    <div class="mb-3 text-center text-lg-left" style="font-size: 1rem; ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div
                                            style="color: rgb(var(--color-primary)); font-size: 1.25rem; font-weight: 600; text-align: center; ">

                                        </div>
                                        <div style="font-size: 1rem; text-align: center; ">
                                            380 Votes
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="divider-card"></div>

                        {{-- finalis --}}

                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach ($finalis as $get)
                                <div class="col">
                                    <div class="vote-card p-3">
                                        <img src="{{ asset($get->foto_kandidat) }}" class="vote-img" alt="">
                                        <div class="card-body text-center">
                                            <h5 class="card-title mt-3">{{ $get->nama_kandidat }}</h5>
                                            <div class="vote-section mt-3">
                                                <div><i class="bi bi-cash"></i>
                                                    Harga<br><strong>{{ rupiah($detail->harga_event) }}</strong></div>
                                                <div><i class="bi bi-bar-chart-fill"></i> Vote<br><strong>2.33%</strong>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary btn-sm w-100 mt-3">Detail Finalis</a>
                                            <div class="quantity-selector mt-2" data-id="{{ $get->id_kandidat }}"
                                                data-name="{{ $get->nama_kandidat }}"
                                                data-harga="{{ $detail->harga_event }}">
                                                <button class="btn btn-outline-primary btn-qty minus">-</button>
                                                <input type="text" class="form-control text-center qty-input"
                                                    style="width: 50px;" value="0" readonly>
                                                <button class="btn btn-outline-primary btn-qty plus">+</button>
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
                        <div class="card-section card-datetime mt-3 mt-lg-0 mb-3 mb-lg-5">
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
                            <div class="d-flex align-items-start mb-2" style="gap: 12px;">
                                <div class="">
                                    <img style="width: 24px; height: 24px;"
                                        src="https://kreenconnect.com/image/icon-vote/Blue/Time.svg" alt="time">
                                </div>
                                <div>

                                    16:00 - 20:00
                                    <i class="text-custom text-blue" style="font-weight: 600;">
                                        (WIB)</i>
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
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            let keranjang = {};

            $('.quantity-selector').each(function() {
                const $selector = $(this);
                const id = $selector.data('id');
                const name = $selector.data('name');
                const harga = parseInt($selector.data('harga'));
                const $input = $selector.find('.qty-input');

                $selector.find('.plus').on('click', function() {
                    let qty = parseInt($input.val()) || 0;
                    qty++;
                    $input.val(qty);

                    keranjang[id] = {
                        name: name,
                        qty: qty,
                        harga: harga
                    };

                    updateKeranjang();
                });

                $selector.find('.minus').on('click', function() {
                    let qty = parseInt($input.val()) || 0;
                    if (qty > 0) qty--;
                    $input.val(qty);

                    if (qty === 0) {
                        delete keranjang[id];
                    } else {
                        keranjang[id] = {
                            name: name,
                            qty: qty,
                            harga: harga
                        };
                    }

                    updateKeranjang();
                });
            });

            function formatRupiah(angka) {
                return 'IDR ' + angka.toLocaleString('id-ID');
            }

            function updateKeranjang() {
                const $list = $('#list-keranjang');
                const $total = $('#total-harga');
                $list.empty();
                let grandTotal = 0;

                $.each(keranjang, function(id, item) {
                    const subTotal = item.qty * item.harga;
                    grandTotal += subTotal;

                    $list.append(`
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    ${item.name} (x${item.qty})
                    <span>${formatRupiah(subTotal)}</span>
                </li>
            `);
                });

                $total.text(formatRupiah(grandTotal));
            }
        });
    </script>
@endsection
