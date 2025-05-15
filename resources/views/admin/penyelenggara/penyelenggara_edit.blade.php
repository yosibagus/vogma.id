@extends('admin.template.template')
@section('content_admin')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Penyelenggara</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">

                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="nama">Nama Penyelenggara</label>
                                    <input value="{{ $data->nama_penyelenggara }}" name="nama_penyelenggara" type="text"
                                        class="form-control" placeholder="Masukkan Nama Penyelenggara" required>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="alamat">Alamat Penyelenggara</label>
                                    <input value="{{ $data->alamat_penyelenggara }}" name="alamat_penyelenggara"
                                        type="text" class="form-control" placeholder="Masukkan Alamat Penyelenggara"
                                        required>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="nohp">No HP</label>
                                    <input value="{{ $data->nohp_penyelenggara }}" name="nohp_penyelenggara" type="text"
                                        class="form-control" placeholder="Masukkan No HP Penyelenggara" required>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="email">Email</label>
                                    <input value="{{ $data->email_penyelenggara }}" name="email_penyelenggara"
                                        type="email" class="form-control" placeholder="Masukkan Email Penyelenggara"
                                        required>
                                </div>


                                <div class="form-group col-md-6 mb-3">
                                    <label for="formFileKTP" class="form-label">Dokumen KTP</label>
                                    <input name="dokumen_ktp" class="form-control form-control-sm" id="formFileKTP"
                                        type="file" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                    @if ($data->dokumen_ktp)
                                        <small class="text-muted">Dokumen lama:
                                            <a href="{{ route('penyelenggara.dokumen', ['id' => $data->id_penyelenggara, 'tipe' => 'ktp']) }}"
                                                target="_blank">Lihat
                                                KTP</a>
                                        </small>
                                    @endif
                                </div>


                                <div class="form-group col-md-6 mb-3">
                                    <label for="formFileNPWP" class="form-label">Dokumen NPWP</label>
                                    <input name="dokumen_npwp" class="form-control form-control-sm" id="formFileNPWP"
                                        type="file" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                    @if ($data->dokumen_npwp)
                                        <small class="text-muted">Dokumen lama:
                                            <a href="{{ route('penyelenggara.dokumen', ['id' => $data->id_penyelenggara, 'tipe' => 'npwp']) }}"
                                                target="_blank">Lihat
                                                NPWP</a>
                                        </small>
                                    @endif
                                </div>


                                <div class="form-group col-md-6 mb-3">
                                    <label for="logoUpload" class="form-label">Logo Penyelenggara</label>
                                    <div class="d-flex flex-column align-items-start">
                                        {{-- Preview Logo --}}
                                        <div id="logoPreview"
                                            style="background-image: url('{{ $data->logo_penyelenggara ? asset('upload/logo_penyelenggara/' . basename($data->logo_penyelenggara)) : asset('images/no-img-avatar.png') }}');
            width: 100px; height: 100px;
            border-radius: 10px;
            background-size: cover;
            background-position: center;
            border: 1px solid #ccc;">
                                        </div>


                                        {{-- Input File & Label --}}
                                        <div class="mt-2">
                                            <input type="file" class="form-control d-none" id="logoUpload"
                                                name="logo_penyelenggara" accept=".png, .jpg, .jpeg"
                                                onchange="previewImage(event, 'logoPreview')">
                                            <label for="logoUpload" class="btn btn-sm btn-primary mt-1">Pilih Logo</label>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="d-flex justify-content-start gap-2 mt-4">
                                <a href="{{ url('/penyelenggara') }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById(previewId);
            preview.style.backgroundImage = `url('${reader.result}')`;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
