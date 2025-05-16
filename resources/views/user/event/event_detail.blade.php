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
                        <img loading="lazy"
                            src="https://vote.kreenconnect.com/img_up/up_thumb/800/up_banner/6822d1d069d4f_organizer_68230a426a5b120250513160050.png"
                            style="max-width: 100%; border-radius: 20px;" alt="banner-event">
                    </div>
                    <div class="card-custom mt-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="card-section card-judul" id="card-judul">
                                <h1 class="mb-4" style="font-weight: bold; font-size: 2rem;">{{ $detail->nama_event }}</h1>
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

                        <div class="top-3 d-flex justify-content-center">
                            <div class="d-flex align-items-center flex-column justify-content-center bg-white card-top3-2 juara-2"
                                onclick="voteTop3('UUUUSDHVIJJQNXFCK193', 'Arumi')"
                                style="position: relative; z-index: 2; border: 1.76px solid rgb(var(--color-border)); flex-basis: 33.33%; opacity: 1; cursor: pointer;">
                                <div class="info-juara-2 info-juara">
                                    <div class="d-flex align-items-center justify-content-center mb-5"
                                        style="position: relative;">
                                        <div class="d-flex flex-column justify-content-center align-items-center top3-1 banner-juara-2"
                                            style="gap: 0.75rem; position: relative;">
                                            <img style="max-width: 6.125rem;"
                                                src="https://kreenconnect.com/image/silver_crown.png" alt="crown">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img loading="lazy"
                                                    src="https://vote.kreenconnect.com/img_up/up_thumb/500/up_banner/image_6822e65ece3f9202505131327426822d1d069d4f.png"
                                                    onerror="this.src='https://kreenconnect.com/noimage_finalis.png'"
                                                    style="aspect-ratio: 1/1; width: 80%; object-fit: cover; max-width: 300px; border-radius: 6px; border: none;"
                                                    alt="arumi">
                                                <div class="rank-top3" style=" background: rgba(174, 174, 174, 1);">
                                                    <span
                                                        style=" transform: rotate(-45deg); color: #fff; font-size: 0.875rem; font-weight: 600;">2</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mb-3 text-clamp-2"
                                        style="font-size: 1rem; font-weight: 700; padding: 0 0.5rem; height: 3rem;">
                                        Arumi
                                    </div>
                                    <div class="text-center mb-3"
                                        style="font-size: 1.5rem; font-weight: 700; color: rgb(var(--color-border))">
                                        500
                                    </div>
                                    <div class="text-center" style="color: rgba(183, 179, 179, 1); margin-bottom: 64px;">
                                        Votes
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center btn-vote-juara-wrapper btn-vote-juara-2-wrapper"
                                    style="opacity: 1; pointer-events: auto">
                                    <button type="button"
                                        class="btn-custom btn-primary px-0  btn-vote-juara btn-vote-juara-2">
                                        Vote
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-column justify-content-center bg-white card-top3-1 juara-1"
                                onclick="voteTop3('ATZRVBRUOSTHPPPFG891', 'Mikha')"
                                style="position: relative; z-index: 3; border: 1.76px solid rgb(var(--color-border)); flex-basis: 33.33%; opacity: 1; cursor: pointer;">
                                <div class="info-juara-1 info-juara">
                                    <div class="d-flex align-items-center justify-content-center mb-5"
                                        style="position: relative;">
                                        <div class="d-flex flex-column justify-content-center align-items-center top3-2 banner-juara-1"
                                            style="gap: 0.75rem; position: relative;">
                                            <img style="max-width: 6.125rem;"
                                                src="https://kreenconnect.com/image/gold_crown.gif" alt="crown">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img loading="lazy"
                                                    src="https://vote.kreenconnect.com/img_up/up_thumb/500/up_banner/image_6822e72dc3007202505131331096822d1d069d4f.png"
                                                    onerror="this.src='https://kreenconnect.com/noimage_finalis.png'"
                                                    style="aspect-ratio: 1/1; width: 100%; object-fit: cover; max-width: 300px; border-radius: 8px; border: 1.6px solid rgba(255, 170, 0, 1);"
                                                    alt="mikha">
                                                <div class="rank-top3" style=" background: rgb(255, 170, 0);">
                                                    <span
                                                        style=" transform: rotate(-45deg); color: #fff; font-size: 0.875rem; font-weight: 600;">1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mb-3 text-clamp-2"
                                        style="font-size: 1rem; font-weight: 700; padding: 0 0.5rem; height: 3rem;">
                                        Mikha
                                    </div>
                                    <div class="text-center mb-3"
                                        style="font-size: 1.5rem; font-weight: 700; color: rgb(var(--color-border))">
                                        608
                                    </div>
                                    <div class="text-center" style="color: rgba(183, 179, 179, 1); margin-bottom: 64px;">
                                        Votes
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center btn-vote-juara-wrapper btn-vote-juara-1-wrapper"
                                    style="opacity: 1; pointer-events: auto">
                                    <button type="button"
                                        class="btn-custom btn-primary px-0  btn-vote-juara btn-vote-juara-1">
                                        Vote
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-column justify-content-center bg-white card-top3-3 juara-3"
                                onclick="voteTop3('ELYLKRFWMBROWKPBJ367', 'Cleverly')"
                                style="position: relative; z-index: 1; border: 1.76px solid rgb(var(--color-border)); flex-basis: 33.33%; opacity: 1; cursor: pointer;">
                                <div class="info-juara-3 info-juara">
                                    <div class="d-flex align-items-center justify-content-center mb-5"
                                        style="position: relative;">
                                        <div class="d-flex flex-column justify-content-center align-items-center top3-3 banner-juara-3"
                                            style="gap: 0.75rem; position: relative;">
                                            <img style="max-width: 6.125rem;"
                                                src="https://kreenconnect.com/image/bronze_crown.png" alt="crown">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <img loading="lazy"
                                                    src="https://vote.kreenconnect.com/img_up/up_thumb/500/up_banner/image_6822e699ca487202505131328416822d1d069d4f.png"
                                                    onerror="this.src='https://kreenconnect.com/noimage_finalis.png'"
                                                    style="aspect-ratio: 1/1; width: 80%; object-fit: cover; max-width: 300px; border-radius: 6px; border: none;"
                                                    alt="cleverly">
                                                <div class="rank-top3" style=" background: rgba(195, 126, 82, 1);">
                                                    <span
                                                        style=" transform: rotate(-45deg); color: #fff; font-size: 0.875rem; font-weight: 600;">3</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mb-3 text-clamp-2"
                                        style="font-size: 1rem; font-weight: 700; padding: 0 0.5rem; height: 3rem;">
                                        Cleverly
                                    </div>
                                    <div class="text-center mb-3"
                                        style="font-size: 1.5rem; font-weight: 700; color: rgb(var(--color-border))">
                                        469
                                    </div>
                                    <div class="text-center" style="color: rgba(183, 179, 179, 1); margin-bottom: 64px;">
                                        Votes
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center btn-vote-juara-wrapper btn-vote-juara-3-wrapper"
                                    style="opacity: 1; pointer-events: auto">
                                    <button type="button"
                                        class="btn-custom btn-primary px-0  btn-vote-juara btn-vote-juara-3">
                                        Vote
                                    </button>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex flex-column mt-5" style="gap: 8px;">
                            <div class="card-custom d-flex p-4 mt-md-4"
                                onclick="voteTop3('QAHEKYRSMPGDRJACB751', 'Yesha')" style="cursor: pointer;">
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


                    </div>
                </section>

                <section class="right-items d-none d-lg-block col-12 col-lg-4 mt-4">
                    <div class="card-custom card-custom-right">
                        <div class="card-section card-organizer">
                            <h1 class="d-none d-lg-block" style="font-weight: 600; font-size: 1.125rem;">{{ $detail->nama_event }}</h1>
                            <hr class="d-none d-lg-block">
                            <div class="d-flex align-items-center" style="gap: 30px;">
                                <div class="avatar-organizer">
                                    <img style="width: 60px; height: 60px; border-radius: 999px; border: 1px solid #DADCE0; object-fit: contain; object-position: center;"
                                        src="https://vote.kreen.asia/img_up/up_thumb/100/up_banner/6822d1d069d4f_organizer_682302359975f20250513152629.png"alt="img_organizer">
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
                                    <img style="width: 24px; height: 24px;" src="https://kreenconnect.com/image/icon-vote/Blue/Locations.svg" alt="location">
                                </div>
                                <div>{{ $detail->lokasi_event }}</div>
                            </div>
                        </div>
                        <h4 style="font-weight: 600; font-size: 1rem;">Harga</h4>
                        <div style="font-weight: 600; font-size: 2rem; color: rgb(var(--color-primary)); border-bottom: 1px solid #DBDFE7; padding-bottom: 8px;"
                            class="notranslate">
                            IDR 5,000
                        </div>
                    </div>
                    <div class="position-sticky" style="top: 124px; margin-top: 40px;">
                        <div class="card-custom">
                            <div class="d-flex align-items-center"
                                style="gap: 28px; padding-bottom: 10px; border-bottom: 1px solid #DBDFE7;">
                                <div class=""
                                    style="min-width: 42px; min-height: 42px; width: 42px; border-radius: 4px;">
                                    <img style="max-width: 100%; width: 100%; border-radius: 4px;"
                                        src="https://vote.kreenconnect.com/img_up/up_thumb/800/up_banner/6822d1d069d4f_organizer_68230a426a5b120250513160050.png"
                                        alt="banner">
                                </div>
                                <div class="text-clamp" style="color: #58627A; font-weight: 700; font-size: 0.8125rem;">
                                    Be a Star - Star of The Year 2025</div>
                            </div>

                            <hr>

                            <div class="finalis-selected d-flex flex-column" id="finalis-selected"
                                style="font-weight: 400; gap: 16px; font-size: 14px;">
                                <div class="no-finalis" style="font-weight: 600;">
                                    Belum ada finalis yang dipilih, silahkan pilih finalis terlebih dahulu
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-5"
                                style="font-weight: 600; border-top: 1px solid #DBDFE7; padding-top: 10px;">
                                <div>Total</div>
                                <div class="total-price-all-finalis notranslate">
                                    IDR 0
                                </div>
                            </div>
                            <div class="btn-checkout-container">
                                <button class="btn-checkout btn-custom btn-primary btn-block" style="font-size: 0.875rem;"
                                    onclick="showModalForm()" disabled="">
                                    <img src="https://kreenconnect.com/image/ticket-white.svg" alt="ticket-white">
                                    <div>Lanjutkan Pembayaran</div>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
@endsection
