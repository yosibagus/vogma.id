@extends('admin.template.template')
@section('content_admin')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Tambah Finalis</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('finalis.update', $finalis->id_kandidat) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row needs-validation" novalidate>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="event_id" class="form-label">Pilih Event <span
                                            class="text-danger">*</span></label>
                                    <select name="event_id" class="form-control" required>
                                        <option value="" disabled>Pilih Event</option>
                                        @foreach ($events as $event)
                                            <option value="{{ $event->id_event }}"
                                                {{ $finalis->event_id == $event->id_event ? 'selected' : '' }}>
                                                {{ $event->nama_event }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Event wajib dipilih.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="validationNamakandidat" class="form-label">Nama Kandidat <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nama_kandidat" id="validationNamakandidat"
                                        value="{{ old('nama_kandidat', $finalis->nama_kandidat) }}" class="form-control" placeholder="Masukkan Nama kandidat" required>
                                    <div class="invalid-feedback">Nama kandidat wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="noKandidat" class="form-label">Nomor Kandidat <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="no_kandidat" id="noKandidat" class="form-control"
                                        value="{{ old('no_kandidat', $finalis->no_kandidat) }}"
                                        placeholder="Masukkan Nomor Kandidat" required>
                                    <div class="invalid-feedback">Nomor Kandidat wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="deskripsiKandidat" class="form-label">Deskripsi Kandidat</label>
                                    <textarea name="deskripsi_kandidat" id="deskripsiKandidat" rows="3" class="form-control"
                                        placeholder="Masukkan deskripsi (jika ada)">{{ old('deskripsi_kandidat', $finalis->deskripsi_kandidat) }}</textarea>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="biografiKandidat" class="form-label">Biografi Kandidat</label>
                                    <textarea name="biografi_kandidat" id="biografiKandidat" rows="4" class="form-control"
                                        placeholder="Masukkan biografi (jika ada)">{{ old('biografi_kandidat', $finalis->biografi_kandidat) }}</textarea>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Foto Kandidat</label>
                                    <div class="card-body p-0">
                                        <div class="avatar-upload d-flex align-items-center">
                                            <div class="position-relative">
                                                <div class="avatar-preview">
                                                    <div id="imagePreview"
                                                        style="background-image: url('{{ $finalis->foto_kandidat ? asset($finalis->foto_kandidat) : asset('images/no-img-avatar.png') }}');
                        background-size: cover;
                        background-position: center;
                        width: 100px;
                        height: 100px;
                        border-radius: 10px;
                        border: 1px solid #ccc;">
                                                    </div>
                                                </div>
                                                <div class="change-btn d-flex align-items-center flex-wrap mt-2">
                                                    <input type="file" class="form-control d-none" id="imageUpload"
                                                        name="foto_kandidat" accept=".png, .jpg, .jpeg"
                                                        onchange="previewImageUpload(event)">
                                                    <label for="imageUpload" class="btn btn-primary ms-0">Update
                                                        Foto</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="d-flex flex-wrap justify-content-start gap-2 mt-4">
                                <a href="{{ url('/finalis') }}" class="btn btn-danger px-4">Kembali</a>
                                <button type="submit" class="btn btn-warning text-white px-4">
                                    Update
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function previewImageUpload(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview');
            output.style.backgroundImage = `url(${reader.result})`;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
