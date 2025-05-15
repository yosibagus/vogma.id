@extends('admin.template.template')
@section('content_admin')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Tambah Penyelenggara</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">

                        <form action="{{ route('penyelenggara.store') }}" method="POST" enctype="multipart/form-data"
                            class="needs-validation" novalidate>
                            @csrf
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="validationNama" class="form-label">Nama Penyelenggara <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nama_penyelenggara" id="validationNama" class="form-control"
                                        placeholder="Masukkan Nama Penyelenggara" required>
                                    <div class="invalid-feedback">Nama Penyelenggara wajib diisi.</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationAlamat" class="form-label">Alamat Penyelenggara <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="alamat_penyelenggara" id="validationAlamat"
                                        class="form-control" placeholder="Masukkan Alamat Penyelenggara" required>
                                    <div class="invalid-feedback">Alamat wajib diisi.</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationNoHp" class="form-label">No HP <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nohp_penyelenggara" id="validationNoHp" class="form-control"
                                        placeholder="Masukkan No HP Penyelenggara" required>
                                    <div class="invalid-feedback">No HP wajib diisi.</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationEmail" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email_penyelenggara" id="validationEmail"
                                        class="form-control" placeholder="Masukkan Email Penyelenggara" required>
                                    <div class="invalid-feedback">Email wajib diisi dengan format yang valid.</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationKTP" class="form-label">Dokumen KTP</label>
                                    <input type="file" name="dokumen_ktp" id="validationKTP" class="form-control"
                                        accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                    <div class="invalid-feedback">Masukkan file KTP yang sesuai.</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="validationNPWP" class="form-label">Dokumen NPWP</label>
                                    <input type="file" name="dokumen_npwp" id="validationNPWP" class="form-control"
                                        accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                    <div class="invalid-feedback">Masukkan file NPWP yang sesuai.</div>
                                </div>

                            </div>

                            <div class="mb-4">
                                <label class="form-label">Logo Penyelenggara</label>
                                <div class="d-flex align-items-center">
                                    <div class="position-relative me-3">
                                        <div id="logoPreview"
                                            style="background-image: url('{{ asset('images/no-img-avatar.png') }}'); background-size: cover; background-position: center; width: 100px; height: 100px; border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div>
                                        <input type="file" class="form-control d-none" id="logoUpload"
                                            name="logo_penyelenggara" accept=".png, .jpg, .jpeg"
                                            onchange="previewImage(event, 'logoPreview')">
                                        <label for="logoUpload" class="btn btn-primary">Pilih Logo</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-start gap-2 mt-4">
                                <a href="{{ url('/penyelenggara') }}" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
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
