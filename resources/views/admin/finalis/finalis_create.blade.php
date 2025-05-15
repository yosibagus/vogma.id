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
                        <form action="{{ route('finalis.update', $finalis->id_finalis) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row needs-validation" novalidate>

                                @if (Auth::user()->role === 'admin')
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
                                @else
                                    <input type="hidden" name="event_id" value="{{ $finalis->event_id }}">
                                @endif

                                <div class="form-group col-md-6 mb-3">
                                    <label for="noKandidat" class="form-label">Nomor Kandidat <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="no_kandidat" id="noKandidat" class="form-control"
                                        value="{{ old('no_kandidat', $finalis->no_kandidat) }}"
                                        placeholder="Masukkan Nomor Kandidat" required>
                                    <div class="invalid-feedback">Nomor Kandidat wajib diisi.</div>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="fotoKandidat" class="form-label">Foto Kandidat</label>
                                    <input type="file" name="foto_kandidat" id="fotoKandidat"
                                        class="form-control form-control-sm" accept="image/*" onchange="previewFoto(event)">
                                    <div class="invalid-feedback">Foto harus berupa gambar.</div>
                                    @if ($finalis->foto_kandidat)
                                        <img src="{{ asset('storage/' . $finalis->foto_kandidat) }}" alt="Preview"
                                            class="img-thumbnail mt-2" style="height: 100px;">
                                    @endif
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="deskripsiKandidat" class="form-label">Deskripsi Kandidat</label>
                                    <textarea name="deskripsi_kandidat" id="deskripsiKandidat" rows="3" class="form-control"
                                        placeholder="Masukkan deskripsi (jika ada)">{{ old('deskripsi_kandidat', $finalis->deskripsi_kandidat) }}</textarea>
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="biografiKandidat" class="form-label">Biografi Kandidat</label>
                                    <textarea name="biografi_kandidat" id="biografiKandidat" rows="4" class="form-control"
                                        placeholder="Masukkan biografi (jika ada)">{{ old('biografi_kandidat', $finalis->biografi_kandidat) }}</textarea>
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
