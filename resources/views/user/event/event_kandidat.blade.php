@extends('user.layouts.template')

@section('content')
    @include('user.layouts.menu_event')

    <div class="row mx-0 px-0 justify-content-center mt-5 mb-5">
        <div class="col-12 col-xl-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/vote') }}">Vote</a></li>
                </ol>
            </nav>

            <div class="row">
                <section class="left-items col-12 col-lg-8 mt-4">
                    <div class="card" style="border-radius: 20px;">
                        <img src="{{ asset($detail->foto_kandidat) }}" style="max-width: 100%; border-radius: 20px;"
                            alt="banner-event">
                    </div>
                    <div class="card-custom mt-4">
                        <div id="data-diri">
                            <div class="nama-finalis text-center mt-3 mb-2 text-clamp-2"
                                style="font-weight: 700; font-size: 1.5rem;">
                                NONG NANDA</div>
                            <div class="nama-tambahan text-center mb-2" style="font-size: 18px;">
                                Nanda Triana (Kec. Cipondoh)</div>
                            <div class="no-urut w-100 text-center mb-2"
                                style="font-size:18px; border-bottom: 1px solid rgba(246, 246, 246, 1); padding-bottom: 12px;">
                                4</div>
                            <div class="w-100"
                                style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); justify-content: center;">
                                <div class="text-center" style="border-right: 1px solid rgba(246, 246, 246, 1);">
                                    <div class="mb-2 d-flex align-items-center justify-content-center"
                                        style="font-size: 1.125rem; gap: 6px; font-weight: 500;"><img
                                            src="https://kreenconnect.com/image/icon-vote/Blue/Calendar.svg" alt="harga">
                                        Harga
                                    </div>
                                    <div class="notranslate" style="font-size: 1.125rem; font-weight: 700;">
                                        IDR 1,000
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="mb-2 d-flex align-items-center justify-content-center"
                                        style="font-size: 1.125rem; gap: 6px; font-weight: 500;"><img
                                            src="https://kreenconnect.com/image/icon-vote/Blue/chart.svg"
                                            alt="vote">Vote
                                    </div>
                                    <div style="font-size: 1.125rem; font-weight: 700;">
                                        3.26%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="divider-card"></div>

                        <div class="card-section card-tentang" id="card-tentang">
                            <h4 class="card-title mb-3" style="font-size: 18px;">Deskripsi</h4>

                            <div>
                                <p>{{ $detail->deskripsi_event }}</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </div>
@endsection
