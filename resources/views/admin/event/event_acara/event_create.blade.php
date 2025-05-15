@extends('admin.template.template')
@section('content_admin')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Tambah Event</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row needs-validation" novalidate>

                                @if (Auth::user()->role === 'admin')
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="validationNama" class="form-label">Nama Penyelenggara <span
                                                class="text-danger">*</span></label>
                                        <select name="penyelenggara_id" id="validationNama" class="form-control" required>
                                            <option value="" disabled selected>Pilih Penyelenggara</option>
                                            @foreach ($penyelenggaras as $penyelenggara)
                                                <option value="{{ $penyelenggara->id_penyelenggara }}">
                                                    {{ $penyelenggara->nama_penyelenggara }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Nama Penyelenggara wajib dipilih.</div>
                                    </div>
                                @else
                                    <input type="hidden" name="penyelenggara_id" value="{{ Auth::user()->id }}">
                                @endif

                                <div class="form-group col-md-6 mb-3">
                                    <label for="validationEvent" class="form-label">Nama Event <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nama_event" id="validationEvent" class="form-control"
                                        placeholder="Masukkan Nama Event" required>
                                    <div class="invalid-feedback">Nama Event wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="validationUrl" class="form-label">URL Event <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="url_event" id="validationUrl" class="form-control"
                                        placeholder="Contoh: voting-pemuda-2025" required>
                                    <div class="invalid-feedback">URL Event wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-3 mb-3">
                                    <label for="tglStart" class="form-label">Tanggal Mulai <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="tgl_start_event" id="tglStart" class="form-control"
                                        required>
                                    <div class="invalid-feedback">Tanggal mulai wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-3 mb-3">
                                    <label for="tglEnd" class="form-label">Tanggal Selesai <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="tgl_end_event" id="tglEnd" class="form-control" required>
                                    <div class="invalid-feedback">Tanggal selesai wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="lokasiEvent" class="form-label">Lokasi Event</label>
                                    <input type="text" name="lokasi_event" id="lokasiEvent" class="form-control"
                                        placeholder="Masukkan lokasi event (jika ada)">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="hargaEvent" class="form-label">Harga Event</label>
                                    <input type="number" step="0.01" name="harga_event" id="hargaEvent"
                                        class="form-control" placeholder="0.00 atau kosong jika gratis">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="maxVote" class="form-label">Maksimal Vote</label>
                                    <input type="number" name="max_vote" id="maxVote" class="form-control"
                                        placeholder="Jumlah maksimal vote">
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="deskripsiEvent" class="form-label">Deskripsi Event</label>
                                    <textarea name="deskripsi_event" id="deskripsiEvent" rows="4" class="form-control"
                                        placeholder="Masukkan deskripsi event (jika ada)"></textarea>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="bennerEvent" class="form-label">Banner Event</label>

                                    <div class="card-body p-0">
                                        <div class="avatar-upload d-flex align-items-center">
                                            <div class="position-relative">

                                                {{-- Preview Banner --}}
                                                <div class="avatar-preview">
                                                    <div id="bannerPreview"
                                                        style="background-image: url('{{ asset('images/no-img-avatar.png') }}'); background-size: cover; background-position: center; width: 100px; height: 100px; border-radius: 10px;">
                                                    </div>
                                                </div>

                                                {{-- Input File --}}
                                                <div class="change-btn d-flex align-items-center flex-wrap mt-2">
                                                    <input type="file" class="form-control d-none" id="bennerEvent"
                                                        name="benner_event" accept="image/*"
                                                        onchange="previewBanner(event)">
                                                    <label for="bennerEvent" class="btn btn-primary ms-0">Pilih
                                                        Banner</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="invalid-feedback">Banner harus berupa gambar.</div>
                                </div>



                            </div>

                            <div class="d-flex flex-wrap justify-content-start gap-2 mt-4">
                                <a href="{{ url('/event-acara') }}" class="btn btn-danger px-4">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-warning text-white px-4">
                                    Simpan
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function previewBanner(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const bannerPreview = document.getElementById('bannerPreview');
                bannerPreview.style.backgroundImage = 'url(' + reader.result + ')'; // Set gambar yang dipilih
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection
