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
                        <form action="{{ route('event.update', $event->id_event) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row needs-validation" novalidate>

                                @if (Auth::user()->role === 'admin')
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="validationNama" class="form-label">Nama Penyelenggara <span
                                                class="text-danger">*</span></label>
                                        <select name="penyelenggara_id" id="validationNama" class="form-control" required>
                                            <option value="" disabled>Pilih Penyelenggara</option>
                                            @foreach ($penyelenggaras as $penyelenggara)
                                                <option value="{{ $penyelenggara->id_penyelenggara }}"
                                                    {{ $event->penyelenggara_id == $penyelenggara->id_penyelenggara ? 'selected' : '' }}>
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
                                        value="{{ old('nama_event', $event->nama_event) }}" required>
                                    <div class="invalid-feedback">Nama Event wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="validationUrl" class="form-label">URL Event <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="url_event" id="validationUrl" class="form-control"
                                        value="{{ old('url_event', $event->url_event) }}" required>
                                    <div class="invalid-feedback">URL Event wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-3 mb-3">
                                    <label for="tglStart" class="form-label">Tanggal Mulai <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="tgl_start_event" id="tglStart" class="form-control"
                                        value="{{ old('tgl_start_event', $event->tgl_start_event) }}" required>
                                    <div class="invalid-feedback">Tanggal mulai wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-3 mb-3">
                                    <label for="tglEnd" class="form-label">Tanggal Selesai <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="tgl_end_event" id="tglEnd" class="form-control"
                                        value="{{ old('tgl_end_event', $event->tgl_end_event) }}" required>
                                    <div class="invalid-feedback">Tanggal selesai wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="lokasiEvent" class="form-label">Lokasi Event</label>
                                    <input type="text" name="lokasi_event" id="lokasiEvent" class="form-control"
                                        value="{{ old('lokasi_event', $event->lokasi_event) }}">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="hargaEvent" class="form-label">Harga Event</label>
                                    <input type="number" step="0.01" name="harga_event" id="hargaEvent"
                                        class="form-control" value="{{ old('harga_event', $event->harga_event) }}">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="maxVote" class="form-label">Maksimal Vote</label>
                                    <input type="number" name="max_vote" id="maxVote" class="form-control"
                                        value="{{ old('max_vote', $event->max_vote) }}">
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="deskripsiEvent" class="form-label">Deskripsi Event</label>
                                    <textarea name="deskripsi_event" id="deskripsiEvent" rows="4" class="form-control"
                                        placeholder="Masukkan deskripsi event (jika ada)">{{ old('deskripsi_event', $event->deskripsi_event) }}</textarea>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="bennerEvent" class="form-label">Banner Event</label>
                                    <input type="file" name="benner_event" id="bennerEvent"
                                        class="form-control form-control-sm" accept="image/*"
                                        onchange="previewBanner(event)">
                                    <div class="invalid-feedback">Banner harus berupa gambar.</div>

                                    @if ($event->benner_event)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $event->benner_event) }}"
                                                alt="Banner Saat Ini" style="max-height: 200px;"
                                                class="img-fluid rounded shadow-sm">
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="d-flex flex-wrap justify-content-start gap-2 mt-4">
                                <a href="{{ url('/event-acara') }}" class="btn btn-danger px-4">Kembali</a>
                                <button type="submit" class="btn btn-warning text-white px-4">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function previewBanner(event) {
            const input = event.target;
            const preview = document.getElementById('bannerPreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
